<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 09/12/2018
 * Time: 21:49
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PublicContactController extends Controller
{


    /**
     * @Route("/contact", name="contact")
     */
    public function ContactAction(Request $request){


// On passe a la fonction createForm les arguments ContactType et new Contact
        $form = $this->createForm(ContactType::class, new Contact());
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            $contact= $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Message bien envoyé.');

            return $this->redirectToRoute('contact');
        }

        return $this->render("@App/PagesPublic/contact.html.twig",

            [
                'form' => $form->createView()
            ]

        );



    }



}