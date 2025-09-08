<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CarController extends AbstractController
{
    #[Route('/car/{id}', name: 'app_car')]
    public function index(int $id, CarRepository $repository): Response
    {
        $car = $repository->find($id);

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'car' => $car,
        ]);
    }
}
