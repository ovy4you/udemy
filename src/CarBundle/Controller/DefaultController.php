<?php

namespace CarBundle\Controller;

use CarBundle\Entity\Cars;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="car_index")
     */
    public function indexAction(Request $request)
    {
        $carsRepository = $this->getDoctrine()->getRepository('CarBundle:Cars');
        $cars = $carsRepository->findCars();

        $form = $this->createFormBuilder()
            ->add('search', TextType::class)
            ->add('submit',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted()){
            dump('11');
        }
        return $this->render('@Car/Default/index.html.twig', ['cars' => $cars, 'form' => $form->createView()]);
    }


    /**
     * @param Car $car
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/show/{id}", name="car_show")
     */
    public function showAction(Cars $car)
    {
        return $this->render('@Car/Default/show.html.twig', ['car' => $car]);
    }
}
