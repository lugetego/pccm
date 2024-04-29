<?php

namespace App\Controller;

use App\Entity\Curso;
use App\Entity\Semestre ;
use App\Form\CursoType;
use App\Repository\CursoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @Route("/curso")
 */
class CursoController extends AbstractController
{
    /**
     * @Route("/", name="app_curso_index", methods={"GET"})
     */
    public function index(CursoRepository $cursoRepository, ManagerRegistry $doctrine): Response
    {
        $twigglobals = $this->container->get("twig")->getGlobals();
        $nombre_semestre = $twigglobals["semestre"];
        $semestre = $doctrine->getRepository(Semestre::class)->findOneBy(['semestre'=>$nombre_semestre]);
        $cursos = $semestre->getCursos();

        return $this->render('curso/index.html.twig', [
           // 'cursos' => $cursoRepository->findBy(['semestre_id'=>$semestre]),
             'cursos' => $cursos,
        ]);
    }

    /**
     * @Route("/consulta/{semestre}", name="app_curso_consulta", methods={"GET"})
     */
    public function consulta(CursoRepository $cursoRepository,$semestre, ManagerRegistry $doctrine): Response
    {
        $semestre = $doctrine->getRepository(Semestre::class)->findOneBy(['semestre'=>$semestre]);
        $cursos = $semestre->getCursos();

        return $this->render('curso/index.html.twig', [
            'cursos' => $cursos,
        ]);
    }

    /**
     * @Route("/new", name="app_curso_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CursoRepository $cursoRepository, ManagerRegistry $doctrine): Response
    {
        $curso = new Curso();
        $form = $this->createForm(CursoType::class, $curso);
        $form->handleRequest($request);

        $twigglobals = $this->container->get("twig")->getGlobals();
        $nombre_semestre = $twigglobals["semestre"];
        $semestre = $doctrine->getRepository(Semestre::class)->findOneBy(['slug'=>$nombre_semestre]);


        if ($form->isSubmitted() && $form->isValid()) {

            $curso->setSemestre($semestre);
            $cursoRepository->add($curso, true);

           // return $this->redirectToRoute('app_curso_index', [], Response::HTTP_SEE_OTHER);
            return $this->redirectToRoute('app_cursos', [], Response::HTTP_SEE_OTHER);

        }

        return $this->renderForm('curso/new.html.twig', [
            'curso' => $curso,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{slug}", name="app_curso_show", methods={"GET"})
     */
    public function show(Curso $curso): Response
    {
        return $this->render('curso/show.html.twig', [
            'curso' => $curso,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="app_curso_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Curso $curso, CursoRepository $cursoRepository): Response
    {
        $form = $this->createForm(CursoType::class, $curso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cursoRepository->add($curso, true);

            return $this->redirectToRoute('app_curso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('curso/edit.html.twig', [
            'curso' => $curso,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_curso_delete", methods={"POST"})
     */
    public function delete(Request $request, Curso $curso, CursoRepository $cursoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$curso->getId(), $request->request->get('_token'))) {
            $cursoRepository->remove($curso, true);
        }

        return $this->redirectToRoute('app_curso_index', [], Response::HTTP_SEE_OTHER);
    }
}
