<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Entity\Stage;
use App\Controller\StageController;
use App\Entity\TacheSemaine;
use App\Entity\RPActivite;
use App\Entity\Enseignant;
use App\Entity\Promotion;

class StageController extends AbstractController
{
    /**
     * @Route("/stage", name="stage")
     */
     public function consulterStage($stage_id)
     {

         $stage = $this->getDoctrine()
         ->getRepository(Stage::class)
         ->find($stage_id);


         return $this->render('stage/consulter.html.twig', ['pStage' => $stage]);
     }

    public function ListerStagesAffect($enseignant_id){

        $stages = $this->getDoctrine()
        ->getRepository(Stage::class)
        ->findByEnseignant($enseignant_id);

        return $this->render('stage/lister.html.twig', [
            'pStages' => $stages,]);

    }

    public function ListerStagesEtudiant($etu_id){

        $etudiant = $this->getDoctrine()
        ->getRepository(Etudiant::class)
        ->findOneById($etu_id);

        $stages = $this->getDoctrine()
        ->getRepository(Stage::class)
        ->findByEtudiant($etudiant);



        return $this->render('stage/lister.html.twig', [
            'pStages' => $stages,]);
    }

    public function ListerStagesPromo($promotion_id){

        $promotion = $this->getDoctrine()
        ->getRepository(Promotion::class)
        ->findOneById($promotion_id);

        $etudiants = $this->getDoctrine()
        ->getRepository(Etudiant::class)
        ->findByPromotion($promotion);

        $stages = $this->getDoctrine()
        ->getRepository(Stage::class)
        ->findByEtudiant($etudiants);



        return $this->render('stage/listerPromo.html.twig', [
            'pStages' => $stages,]);
    }

    public function gettachesemainepardomaine($domaine_id){
      $repository = $this -> gettache_semaine()
      $listetaches = $repository->findAll();
      foreach ($listetaches as $taches) {
        if ($domaine_id = 1) {
          
        }
      }

    }


}
