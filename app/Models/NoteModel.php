<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'id_etudiant',
        'id_matiere',
        'total_credit',
    ];

    /**
     * Récupérer toutes les notes avec détails étudiant/matière/semestre
     * 
     * @return array
     */
    public function getAllWithDetails()
    {
        return $this->select('e.nom, e.prenoms, e.etu, m.nom as matiere, m.code, p.nom as periode, n.total_credit as note, m.credit, n.id as note_id')
            ->from('notes n')
            ->join('etudiants e', 'n.id_etudiant = e.id')
            ->join('matieres m', 'n.id_matiere = m.id')
            ->join('periode p', 'm.id_periode = p.id')
            ->orderBy('e.nom', 'ASC')
            ->orderBy('m.nom', 'ASC')
            ->findAll();
    }

    /**
     * Créer une nouvelle note avec validation
     * 
     * @param int $id_etudiant
     * @param int $id_matiere
     * @param float $note
     * @return bool|int
     */
    public function createNote($id_etudiant, $id_matiere, $note)
    {
        // Insérer la note
        return $this->insert([
            'id_etudiant' => $id_etudiant,
            'id_matiere' => $id_matiere,
            'total_credit' => $note,
        ]);
    }

    /**
     * Supprimer une note
     * 
     * @param int $id
     * @return bool
     */
    public function deleteNote($id)
    {
        return $this->delete($id);
    }

    /**
     * Mettre à jour une note
     * 
     * @param int $id
     * @param float $note
     * @return bool
     */
    public function updateNote($id, $note)
    {
        return $this->update($id, ['note' => $note]);
    }
}
