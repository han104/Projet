<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 02/12/2018
 * Time: 19:56
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminHomeContoller extends Controller
{

    /**
     * @Route("admin/", name="Home")
     */
    public function AdminHomeActions() {


        return $this->render('@App/pages/home.html.twig');
    }

}