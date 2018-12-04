<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 03/12/2018
 * Time: 22:21
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Menu;
use AppBundle\Form\MenuType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminMenuController extends Controller
{
    // 1) CREATE

    // METHODE QUI VA PERMETTRE DE CREER UN MENU

    /**
     * @Route("/admin/Menu/create", name="admin_Menu_create")
     */

    public function AddMenuAction(Request $request) {
        // Creation d'un formulaire d'ajout pour notre entité Users.
        $form = $this->createForm(MenuType::class, new Menu());

        $form->handleRequest($request);
        // Verirication du formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            $menu = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($menu);
            $entityManager->flush();
            // On reaffiche la meme page si notre formulaire respecte les asserts.
            return $this->redirectToRoute('Admin_Menu_list');
        }
        //Notre controlleur retourne cette page.
        return $this->render('@App/pages/Users/Admin_Create_Menu.html.twig',

            [

                'form' => $form->createView()

            ]
        );
    }

    //....................................................................

    // 2) READ

    // METHODE QUI VA PERMETTRE D'AFFICHER LE MENU

    /**
     * @Route("/admin/Menu/list", name="Admin_Menu_list")
     */
    public function ReadMenuAction() {

        $repository = $this->getDoctrine()->getRepository(Menu::class);

        $Menu = $repository->findAll();

        return $this->render('@App/pages/Users/Admin_Read_Menu.html.twig',

            [
                'Menu' => $Menu
            ]

        );

    }


    //........................................................................

    // 3) UPDATE

    // METHODE QUI VA PERMETTRE DE MODIFIER UN MENU

    /**
     * @Route("/admin/Menu/update/{id}", name="admin_Menu_update")
     */
    public function UpdateMenuAction(Request $request, $id){

        $menu = $this->getDoctrine()->getRepository(Menu::class)->find($id);


        $form = $this->createForm(MenuType::class, $menu);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $menu = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($menu);
            $entityManager->flush();

            return $this->redirectToRoute('Admin_Menu_list');
        }

        return $this->render('@App/pages/Users/Admin_Update_Menu.html.twig',

            [
// create view contient ts nos formulaires

                'form'=> $form->createView()

            ]

        );

    }

//...........................................................................

// 4) DELETE

    // METHODE QUI VA PERMETTRE DE SUPPRIMER UN MENU

    /**
     * @Route("/admin/Menu/delete/{id}", name="admin_Menu_delete")
     */
    public function DeleteMenuActions($id){

        $repository = $this->getDoctrine()->getRepository(Menu::class);
        $entityManager = $this->getDoctrine()->getManager();

        $menu = $repository->find($id);

        $entityManager->remove($menu);
        $entityManager->flush();


        return $this->redirectToRoute('Admin_Menu_list');
    }


}