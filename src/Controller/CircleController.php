<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Service\geometryCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CircleController extends AbstractController {

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

    #[Route('/circle/{radius}', name: 'app_circle', methods: ["GET"])]
    public function circle($radius, Request $request, geometryCalculator $totalarea): JsonResponse {

        $circle = new Circle();
        $circle->getType();
        $circle->setRadius($radius);
        $circle->setCircumference($totalarea->calculatecircumference($circle));
        $circle->setSurface($totalarea->calculatesurface($circle));
         $this->entityManager->persist($circle);
         $this->entityManager->flush();
        return $this->json([
             $circle
        ]);

    }

}
