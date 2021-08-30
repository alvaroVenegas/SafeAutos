<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vehicle;
use App\Entity\User;
use App\Form\VehicleType;
use DateTime;

class VehiclesController extends AbstractController
{
    //vamos a recoger datos de la bd y pintarla en el front 
    /**
     * @Route("/db")
     */
    public function dbtest(EntityManagerInterface $em){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $user= $this->getUser();
        $repo = $em->getRepository(Vehicle::class);
        $vehicles = $repo->findAll();
        return $this->render("pages/principalPage.html.twig",["vehiclesTwig"=>$vehicles,"userTwig"=>$user]);
    }

    /**
     * @Route("/vehicles", methods={"GET"}, name="getVehicles")
     */
    public function getVehiclesById()
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user= $this->getUser();
        $vehicles= $user->getVehicles();
        return $this->render("pages/principalPage.html.twig",["vehiclesTwig"=>$vehicles,"userTwig"=>$user]);
    }
    
    /**
     * @Route("/vehicles/new", name="newVehicle2")
     */
    public function createVehicle (Request $request, EntityManagerInterface $em)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $flag =true;
        $form = $this->createForm(VehicleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $vehicle = $form->getData();
            $user = $this->getUser();
            //dump($user);
            $vehicle->setUser($user); 
            $em->persist($vehicle);
            $em->flush();
            return $this->redirectToRoute("getVehicles");
        }
        return $this->render("forms/formNewVehicle.html.twig",
        ['vehicleForm'=>$form->createView(), 'flag'=>$flag]);
    }

    /**  
     * @Route("/vehicles/details/{id}", name="editDetailVehiclePage", requirements={"id"="\d+"}) 
     */
    public function postVehicleDetails(Vehicle $vehicle, EntityManagerInterface $em,  Request $req){
        $this->denyAccessUnlessGranted('ROLE_USER');
        $flag =false;
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid())
        {
            $vehicle = $form->getData();
            $user = $this->getUser();
            $vehicle->setUser($user); 
            $em->persist($vehicle);
            $em->flush();
            return $this->redirectToRoute("getVehicles");
        }
        return $this->render("forms/formNewVehicle.html.twig",
        ['vehicleForm'=>$form->createView(), 'flag'=>$flag, 'vehicle'=>$vehicle]);
    }

     /**
     * @Route ("/vehicles/delete/{id}", name = "deleteVehicle")
     */
    public function deleteVehicle(EntityManagerInterface $doctrine, $id)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $repo = $doctrine->getRepository(Vehicle::class);
        $vehicle = $repo->find($id);
        $doctrine->remove($vehicle);
        $doctrine->flush();
        return $this->redirectToRoute("getVehicles");
    }
}