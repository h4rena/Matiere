[]Base de donnees(MYSQL)
    []Tables
        []users(id,nom,email,mdp,id_role)
        []role(id,nom)
        []responsable(id,nom)
        []Parcours(id ,nom,id_responsable,total_credit)
        []Matieres(id,nom,code,coefficient,credit,id_parcours,id_periode)
        []Etudiants(id,nom,prenoms,etu,id_option)
        []notes(id,id_etudiant,id_matiers,total_credit)
        []pirode(id,nom,id_anne_univ,id_option)
        []option(id,nom)
        []anne_univ(id,nom)
        []resultat(id,id_etudiant,total_note,moyenne_general,total_credit,mention,situation)
    []A faire
        []Login(moins important)
         []afficher list etudiant
         []recherche etudiant par ETU
        []Formulaire pour ajouter un note
            []input
                -input ETU
                -dropdown matiere
                -drop down semestre
                -dropdown option(sans option dev bddreseau web)
                -note
            []boutton entrer
        []list des notes
                