<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/nosotros", name="app_nosotros")
     */
    public function nosotros(): Response
    {
        return $this->render('site/nosotros.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/maestria", name="app_maestria")
     */
    public function maestria(): Response
    {
        return $this->render('site/maestria.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/doctorado", name="app_doctorado")
     */
    public function doctorado(): Response
    {
        return $this->render('site/doctorado.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/admision", name="app_admision")
     */
    public function admision(): Response
    {
        return $this->render('site/admision.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/basicos", name="app_basicos")
     */
    public function basicos(): Response
    {
        return $this->render('site/basicos.html.twig', ['controller_name' => 'SiteController',]);
    }

    /**
     * @Route("/cursos", name="app_cursos")
     */
    public function cursos(): Response
    {
        return $this->render('site/cursos.html.twig', ['controller_name' => 'SiteController',]);
    }

    /**
     * @Route("/generales", name="app_generales")
     */
    public function generales(): Response
    {
        return $this->render('site/generales.html.twig', ['controller_name' => 'SiteController',]);
    }

    /**
     * @Route("/tutores", name="app_tutores")
     */
    public function tutores(): Response
    {
        return $this->render('site/tutores.html.twig', ['controller_name' => 'SiteController',]);
    }

    /**
     * @Route("/contacto", name="app_contacto")
     */
    public function contacto(): Response
    {
        return $this->render('site/contacto.html.twig', ['controller_name' => 'SiteController',]);
    }
}
