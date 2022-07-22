<?php


namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;
use Doctrine\ORM\EntityManagerInterface;

class geometryCalculator {

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {

        $this->entityManager = $entityManager;
    }

    # Calculate the area of both of both circle and triangle
    public function calculatearea(Circle $circle,Triangle $triangle) {

         $calarea =$this->calculatesurface($circle) + $this->calculatetrianglesurface($triangle);
         return $calarea;
    }

    # Calculate the diameter of cricle
    public function calculatediameterofCircle(Circle $circle) {

         $diameter = 2.0 * $circle->getRadius();
         return $diameter;
    }

     # Calculate the surface of circle
    public function calculatesurface(Circle $circle) {

        $surface = Circle::PI * $circle->getRadius() * $circle->getRadius();
        return  $surface;
    }

    #Calculate the circumference of circle
    public function calculatecircumference(Circle $circle) {

        $circumference = 2 * Circle::PI * $circle->getRadius();
        return $circumference;
    }

    #Calculate the circumference alias perimeter of triangle
    public function calculateperimeter(Triangle $triangle) {

        $perimeter = $triangle->getSideA() + $triangle->getSideB() + $triangle->getSideC();
        return $perimeter;
    }

    # Calculate the surface of triangle
    public function calculatetrianglesurface(Triangle $triangle) {

        $area = (0.5) * $triangle->getSideA() * $triangle->getSideB();
        return $area;
    }

}