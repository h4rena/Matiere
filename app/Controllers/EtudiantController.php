<?php 

namespace App\Controllers;

class EtudiantController extends BaseController
{
   public function index(): string
   {
    $list=["etudiant1","etudiant2"];
    return view('etudiants',['lists'=>$list]);
   }

   public function form(): string
   {
      return view('note_form');
   }

}