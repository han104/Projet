<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminUsersController extends Controller
{
    // 1) CREATE

    // METHODE QUI VA PERMETTRE DE CREER UN USER

    /**
     * @Route("/admin/Users/create", name="admin_Users_create")
     */

    public function AddUsersAction(Request $request) {
        // Creation d'un formulaire d'ajout pour notre entité Users.
        $form = $this->createForm(UserType::class, new User());

        $form->handleRequest($request);
        // Verirication du formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // On reaffiche la meme page si notre formulaire respecte les asserts.
            return $this->redirectToRoute('Admin_Users_list');
        }
        //Notre controlleur retourne cette page.
        return $this->render('@App/PagesAdmin/Users/Admin_Create_Users.html.twig',

            [

                'form' => $form->createView()

            ]
        );
    }

    //....................................................................

    // 2) READ

    // METHODE QUI VA PERMETTRE D'AFFICHER LA LISTE DES USERS

    /**
     * @Route("/admin/Users/list", name="Admin_Users_list")
     */
    public function ReadUsersAction() {

      $repository = $this->getDoctrine()->getRepository(User::class);

      $Users = $repository->findAll();

      return $this->render('@App/PagesAdmin/Users/Admin_Read_Users.html.twig',

          [
              'Users' => $Users
          ]

      );

    }


    //........................................................................

    // 3) UPDATE

    // METHODE QUI VA PERMETTRE DE MODIFIER LE USER

    /**
     * @Route("/admin/Users/update/{id}", name="admin_Users_update")
     */
    public function UpdateUsersAction(Request $request, $id){

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);


        $form = $this->createForm(UserType::class, $user);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('Admin_Users_list');
        }

        return $this->render('@App/PagesAdmin/Users/Admin_Update_Users.html.twig',

            [
// create view contient ts nos formulaires

                'form'=> $form->createView()

            ]

        );

    }

//...........................................................................

// 4) DELETE

    // METHODE QUI VA PERMETTRE DE SUPPRIMER LE USER

    /**
     * @Route("/admin/Users/delete/{id}", name="admin_Users_delete")
     */
    public function DeleteUsersActions($id){

        $repository = $this->getDoctrine()->getRepository(User::class);
        $entityManager = $this->getDoctrine()->getManager();

        $user = $repository->find($id);

        $entityManager->remove($user);
        $entityManager->flush();


        return $this->redirectToRoute('Admin_Users_list');
    }

}
























