<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use AppBundle\Form\UsersType;
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
        $form = $this->createForm(UsersType::class, new Users());

        $form->handleRequest($request);
        // Verirication du formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // On reaffiche la meme page si notre formulaire respecte les asserts.
            return $this->redirectToRoute('admin_Users_create');
        }
        //Notre controlleur retourne cette page.
        return $this->render('@App/pages/Users/Admin_Create_Users.html.twig',

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

      $repository = $this->getDoctrine()->getRepository(Users::class);

      $Users = $repository->findAll();

      return $this->render('@App/pages/Users/Admin_Read_Users.html.twig',

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

        $user = $this->getDoctrine()->getRepository(Users::class)->find($id);


        $form = $this->createForm(UsersType::class, $user);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('Admin_Users_list');
        }

        return $this->render('@App/pages/Users/Admin_Update_Users.html.twig',

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

        $repository = $this->getDoctrine()->getRepository(Users::class);
        $entityManager = $this->getDoctrine()->getManager();

        $user = $repository->find($id);

        $entityManager->remove($user);
        $entityManager->flush();


        return $this->redirectToRoute('Admin_Users_list');
    }

}






















