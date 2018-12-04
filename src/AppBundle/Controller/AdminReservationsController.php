<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 03/12/2018
 * Time: 18:52
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Reservations;
use AppBundle\Form\ReservationsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminReservationsController extends Controller
{

        // 1) CREATE

        // METHODE QUI VA PERMETTRE DE CREER UNE RESERVATION

        /**
         * @Route("/admin/Reservations/create", name="admin_Reservations_create")
         */

        public function AddUsersAction(Request $request) {
            // Creation d'un formulaire d'ajout pour notre entité Reservations
            $form = $this->createForm(ReservationsType::class, new Reservations());

            $form->handleRequest($request);
            // Verirication du formulaire
            if ($form->isSubmitted() && $form->isValid()) {

                $reservation = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($reservation);
                $entityManager->flush();
                // On reaffiche la meme page si notre formulaire respecte les asserts.
                return $this->redirectToRoute('Admin_Reservations_list');
            }
            //Notre controlleur retourne cette page.
            return $this->render('@App/pages/Reservations/Admin_Create_Reservations.html.twig',

                [

                    'form' => $form->createView()

                ]
            );
        }


    //....................................................................

    // 2) READ

    // METHODE QUI VA PERMETTRE D'AFFICHER LA LISTE DES RESERVATIONS

    /**
     * @Route("/admin/Reservations/list", name="Admin_Reservations_list")
     */
    public function ReadUsersAction() {

        $repository = $this->getDoctrine()->getRepository(Reservations::class);

        $reservations = $repository->findAll();

        return $this->render('@App/pages/Reservations/Admin_Read_Reservations.html.twig',

            [
                'reservations' => $reservations
            ]

        );

    }


    //........................................................................

    // 3) UPDATE

    // METHODE QUI VA PERMETTRE DE MODIFIER UNE RESERVATION

    /**
     * @Route("/admin/Reservations/update/{id}", name="admin_Reservations_update")
     */
    public function UpdateUsersAction(Request $request, $id){

        $reservation = $this->getDoctrine()->getRepository(Reservations::class)->find($id);


        $form = $this->createForm(ReservationsType::class, $reservation);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reservation = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('Admin_Reservations_list');
        }

        return $this->render('@App/pages/Reservations/Admin_Update_Reservations.html.twig',

            [
// create view contient ts nos formulaires

                'form'=> $form->createView()

            ]

        );

    }

//...........................................................................

// 4) DELETE

    // METHODE QUI VA PERMETTRE DE SUPPRIMER UNE RESERVATION

    /**
     * @Route("/admin/Reservations/delete/{id}", name="admin_Reservations_delete")
     */
    public function DeleteUsersActions($id){

        $repository = $this->getDoctrine()->getRepository(Reservations::class);
        $entityManager = $this->getDoctrine()->getManager();

        $reservations = $repository->find($id);

        $entityManager->remove($reservations);
        $entityManager->flush();


        return $this->redirectToRoute('Admin_Reservations_list');
    }




















}