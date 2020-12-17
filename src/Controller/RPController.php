<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\RP;
use App\Entity\Etudiant;
use App\Entity\RPActivite;
use App\Form\RPType;

class RPController extends AbstractController
{
    /**
     * @Route("/rp", name="rp")
     */
    public function consulterRpEtudiant($rp_id){
        $rp = $this->getDoctrine()->getRepository(RP::class)->find($rp_id);

        return $this->render('rp/consulter.html.twig', ['consulter' => $rp,]);
    }


    public function listerLesRPEtudiant(): Response
    {
        return $this->render('rp/lister.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }

    public function ListerLesRPaCommenter(): Response
    {
        return $this->render('rp/lister.html.twig', [
            'controller_name' => 'EnseignantController',
        ]);
    }


    public function ajouterRp(){

        $rp = new RP();
        $form = $this->createForm(RPType::class, $rp);
                return $this->render('rp/ajouter.html.twig', array(
                'form' => $form->createView(), ));
    }


    public function listerLesRP($idEtudiant){

            $etudiant = $this->getDoctrine()
            ->getRepository(Etudiant::class)
            ->find($idEtudiant);


            if (!$etudiant) {
                throw $this->createNotFoundException(
                'Aucun étudiant trouvé avec le numéro '.$idEtudiant
                );
            }


            return $this->render('rp/lister.html.twig', [ 'pEtudiant' => $etudiant,]);

    }
}
