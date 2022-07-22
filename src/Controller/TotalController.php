<?php


namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Service\geometryCalculator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TotalController extends AbstractController {

    private EntityManagerInterface $entityManager;
    private geometryCalculator $geometryCalculator;

    public function __construct(EntityManagerInterface $entityManager,geometryCalculator $geometryCalculator){

        $this->entityManager = $entityManager;
        $this->geometryCalculator = $geometryCalculator;
    }
    #[Route('/calculate/{id}',name: 'calculate',methods: ['GET'])]
    public function calculate(Request $request,$id) {

        $circle = $this->entityManager->getRepository(Circle::class)->findOneBy(['id' => $id]);
        $triangle =  $this->entityManager->getRepository(Triangle::class)->findOneBy(['id' => $id]);
        $result   = $this->geometryCalculator->calculatearea($circle,$triangle);
       return $this->render('total/index.html.twig',[
           'result' => $result
           ]);

    }

    #[Route('/calculatediameter/{id}' ,name:'calculatediameter' )]
    public function calculatediameter($id) {

       $circle = $this->entityManager->getRepository(Circle::class)->findOneBy(['id' => $id]);
       $diameter = $this->geometryCalculator->calculatediameterofCircle($circle);
        return $this->render('total/index1.html.twig',[
            'diameter' => $diameter
        ]);
    }

}