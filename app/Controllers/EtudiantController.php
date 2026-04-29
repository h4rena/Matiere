<?php 

namespace App\Controllers;

use CodeIgniter\Database\BaseBuilder;

class EtudiantController extends BaseController
{
   public function index(): string
   {
    $list=["etudiant1","etudiant2"];
    return view('etudiants',['lists'=>$list]);
   }

   public function form(): string
   {
      $db = db_connect();
      
      // Récupérer les matières
      $matieres = $db->table('matieres')
         ->select('id, nom, code, credit')
         ->orderBy('nom')
         ->get()
         ->getResultArray();
      
      // Récupérer les semestres (pirode)
      $semestres = $db->table('pirode')
         ->select('id, nom')
         ->orderBy('id')
         ->get()
         ->getResultArray();
      
      // Récupérer les options
      $options = $db->table('option')
         ->select('id, nom')
         ->orderBy('nom')
         ->get()
         ->getResultArray();

      return view('note_form', [
         'matieres' => $matieres,
         'semestres' => $semestres,
         'options' => $options
      ]);
   }

   public function notes(): string
   {
      $db = db_connect();
      
      // Récupérer toutes les notes avec les détails
      $notes = $db->table('notes')
         ->select('e.nom, e.prenoms, e.etu, m.nom as matiere, p.nom as periode, n.note, m.credit')
         ->join('etudiants e', 'n.id_etudiant = e.id')
         ->join('matieres m', 'n.id_matiers = m.id')
         ->join('pirode p', 'm.id_periode = p.id')
         ->get()
         ->getResultArray();

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

      $db = db_connect();
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

      // Récupérer l'ID de l'étudiant basé sur l'ETU
      $etudiant = $db->table('etudiants')
         ->select('id')
         ->where('etu', $this->request->getPost('etu'))
         ->get()
         ->getFirstRow();

      if (!$etudiant) {
         return redirect()->back()->withInput()->with('error', 'Étudiant introuvable');
      }

      // Insérer la note
      $db->table('notes')->insert([
         'id_etudiant' => $etudiant->id,
         'id_matiers' => $this->request->getPost('id_matiere'),
         'note' => $this->request->getPost('note'),
         'total_credit' => 0, // À calculer si nécessaire
      ]);

      return redirect()->to('/list')->with('success', 'Note ajoutée avec succès');
   }
}