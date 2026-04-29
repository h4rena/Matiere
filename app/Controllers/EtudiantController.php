<?php 

namespace App\Controllers;

use App\Models\MatiereModel;
use App\Models\PeriodeModel;
use App\Models\OptionModel;
use App\Models\EtudiantModel;
use App\Models\NoteModel;

class EtudiantController extends BaseController
{
   protected $matiereModel;
   protected $periodeModel;
   protected $optionModel;
   protected $etudiantModel;
   protected $noteModel;

   public function __construct()
   {
      $this->matiereModel = new MatiereModel();
      $this->periodeModel = new PeriodeModel();
      $this->optionModel = new OptionModel();
      $this->etudiantModel = new EtudiantModel();
      $this->noteModel = new NoteModel();
   }

   public function index(): string
   {
      $list = ["etudiant1", "etudiant2"];
      return view('etudiants', ['lists' => $list]);
   }

   public function form(): string
   {
      // Récupérer les données via les Models
      $matieres = $this->matiereModel->getAllWithDetails();
      $semestres = $this->periodeModel->getAll();
      $options = $this->optionModel->getAll();

      return view('note_form', [
         'matieres' => $matieres,
         'semestres' => $semestres,
         'options' => $options
      ]);
   }

   public function notes(): string
   {
      // Récupérer les notes via le Model
      $notes = $this->noteModel->getAllWithDetails();

      return view('notes_list', ['notes' => $notes]);
   }

   public function saveNote()
   {
      if ($this->request->getMethod() !== 'post') {
         return redirect()->to('/list');
      }

      // Vérifier que l'utilisateur est admin
      if (session()->get('user_role') !== 'Admin') {
         return redirect()->to('/list')->with('error', 'Vous n\'avez pas la permission d\'ajouter une note');
      }

      $validation = \Config\Services::validation();

      // Valider les données
      $rules = [
         'etu' => 'required|string|min_length[1]|max_length[50]',
         'id_matiere' => 'required|integer',
         'id_periode' => 'required|integer',
         'id_option' => 'required|integer',
         'note' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[20]',
      ];

      if (!$validation->setRules($rules)->run($this->request->getPost())) {
         return redirect()->back()->withInput()->with('errors', $validation->getErrors());
      }

      // Récupérer l'étudiant via le Model
      $etudiant = $this->etudiantModel->findByEtu($this->request->getPost('etu'));

      if (!$etudiant) {
         return redirect()->back()->withInput()->with('error', 'Étudiant introuvable');
      }

      $matiere = $this->matiereModel->find((int) $this->request->getPost('id_matiere'));

      if (!$matiere) {
         return redirect()->back()->withInput()->with('error', 'Matière introuvable');
      }

      if ((int) $matiere['id_periode'] !== (int) $this->request->getPost('id_periode')) {
         return redirect()->back()->withInput()->with('error', 'La matière ne correspond pas à la période sélectionnée');
      }

      if ((int) $etudiant['id_option'] !== (int) $this->request->getPost('id_option')) {
         return redirect()->back()->withInput()->with('error', 'L\'option ne correspond pas à celle de l\'étudiant');
      }

      // Créer la note via le Model
      $noteCreated = $this->noteModel->createNote(
         $etudiant['id'],
         $this->request->getPost('id_matiere'),
         $this->request->getPost('note')
      );

      if ($noteCreated) {
         return redirect()->to('/list')->with('success', 'Note ajoutée avec succès');
      } else {
         return redirect()->back()->withInput()->with('error', 'Erreur lors de l\'ajout de la note');
      }
   }
}