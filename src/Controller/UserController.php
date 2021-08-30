<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    //vamos a recoger datos de la bd y pintarla en el front 
    /**
     * @Route("/user/db")
     */
    public function dbtest(EntityManagerInterface $em){
        $repo = $em->getRepository(User::class);
        $users = $repo->findAll();
        return $this->render("testDB/testDB.html.twig",["usersTwig"=>$users]);

    }

    /**
     * @Route("/user/delete/{id}", methods={"GET"}, name="getDeleteUser")  
     */
    public function getDeleteUser(EntityManagerInterface $em, $id, Request $req)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render("pages/userDeletePage.html.twig");

    }


    /**
     * @Route("/user/delete/{id}", methods={"POST"}, name="deleteUser")  
     */
    public function deleteUser(EntityManagerInterface $em, $id, Request $req)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        
        $userLog = $this->getUser();
        $aliasInput = $req->request->get('inputAlias');

        if($aliasInput == $userLog->getAlias()){ 
            $repo = $em->getRepository(User::class);
            $userBd = $repo->find($id);
            $em->remove($userBd);
            $em->flush();

            return $this->redirectToRoute("create_user");
        }
        return $this->redirectToRoute("getDeleteUser",['id'=>$id]);
        



    }



}