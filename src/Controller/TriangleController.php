<?php

namespace App\Controller;

use App\Entity\Triangle;
use App\Service\geometryCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TriangleController extends AbstractController {

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

    #[Route('/triangle/{sideA}/{sideB}/{sideC}', name: 'app_triangle',methods: ['GET'])]
    public function triangle($sideA, $sideB, $sideC, geometryCalculator $totalarea): JsonResponse {

        $triangle = new Triangle();
        $triangle->getType();
        $triangle->setSideA($sideA);
        $triangle->setSideB($sideB);
        $triangle->setSideC($sideC);
        $triangle->setCircumference($totalarea->calculateperimeter($triangle));
        $triangle->setSurface($totalarea->calculatetrianglesurface($triangle));
        $this->entityManager->persist($triangle);
        $this->entityManager->flush();
        return $this->json([
            $triangle
        ]);

    }

}
