<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
    #[Route('/car/{id}', name: 'app_car_index')]
    public function index(int $id, CarRepository $repository): Response
    {

        $car = $repository->find($id);

        if(!$car) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render('car/index.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/car/{id}/delete', name: 'app_car_delete')]
    public function deleteCar(int $id, CarRepository $repository, EntityManagerInterface $entityManager): Response
    {
        $car = $repository->find($id);

        if(!$car) {
            return $this->redirectToRoute('app_home');
        }

        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }

    #[Route('/add', name: 'app_car_add')]
    public function addCar(EntityManagerInterface $entityManager, Request $request): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('app_car_add');
        }

        return $this->render('car/add.html.twig', [
            'form' => $form,
        ]);
    }
}
