<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 04/12/2018
 * Time: 10:18
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class PublicHomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function PublicHomeActions()
    {

        return $this->render('@App/PagesPublic/accueil.html.twig');

    }



// 5) CONNEXION UTILISATEUR (AVEC NOM A L'AFFICHE)


    /**
     * @Route("/profil", name="connexion")
     */
    public function ProfilUtilisateurActions()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();


        return $this->render('@App/PagesPublic/profil_utilisateur.html.twig',

            [
                'user'=> $user
            ]

        );

    }

}