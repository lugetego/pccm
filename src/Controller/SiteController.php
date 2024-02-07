<?php

namespace App\Controller;

use App\Entity\Semestre;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SemestreRepository;
use App\Entity\Curso;
use App\Form\CursoType;
use App\Repository\CursoRepository;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(SemestreRepository $semestreRepository): Response
    {
        $ultimoSemestre = $semestreRepository->findLastSemestre();

        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
            'ultimoSemestre' => $ultimoSemestre,
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
    public function admision(SemestreRepository $semestreRepository): Response
    {
        $ultimoSemestre = $semestreRepository->findLastSemestre();

        return $this->render('site/admision.html.twig', [
            'controller_name' => 'SiteController',
            'ultimoSemestre' => $ultimoSemestre,
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
    public function cursos(CursoRepository $cursoRepository, ManagerRegistry $doctrine): Response
    {
        $twigglobals = $this->container->get("twig")->getGlobals();
        $nombre_semestre = $twigglobals["semestre"];
        $semestre = $doctrine->getRepository(Semestre::class)->findOneBy(['semestre'=>$nombre_semestre]);
        $cursos = $semestre->getCursos();

        return $this->render('site/cursos.html.twig', [
            'controller_name' => 'SiteController',
            'cursos' => $cursos,
            ]);
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

    /**
     * @Route("/dm", name="app_dm")
     */
    public function dm(): Response
    {
        return $this->render('site/dm.html.twig', ['controller_name' => 'SiteController',]);
    }
}
