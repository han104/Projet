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
     * @Route("/home", name="home")
     */
    public function PublicHomeActions()
    {

     return $this->render('@App/PagesUtilisateur/accueil.html.twig');

    }

}