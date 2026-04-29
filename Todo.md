[]Base de donnees(MYSQL)
    []Tables
        []responsable(id,nom)
        []Parcours(id ,nom,id_responsable,total_credit)
        []Matieres(id,nom,code,coefficient,credit,id_parcours,id_periode)
        []Etudiants(id,nom,prenoms,etu,option)
        []notes(id,id_etudiant,id_matiers,total_credit)
        []pirode(id,nom)