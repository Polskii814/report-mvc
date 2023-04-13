<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    #[Route('/', name : 'home')]
    public function number(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route("/about", name: "about")]
    public function home(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function about(): Response
    {
        return $this->render('report.html.twig');
    }

    #[Route("/report#kmom01")]
    public function kmom01(): Response
    {
        return $this->render('report.html.twig');
    }

    #[Route("/lucky", name: "lucky")] 
    public function lucky(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky.html.twig', [
            'number' => $number,
        ]);
    }


}

