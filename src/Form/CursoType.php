<?php

namespace App\Form;

use App\Entity\Curso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CursoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('apellidos')
            ->add('nombre')
            ->add('curso', ChoiceType::class, [
                    'choices'=> [
                        'Álgebra conmutativa - 4.5 hrs/sem' => 'Álgebra conmutativa - 4.5 hrs/sem',
                        'Álgebra moderna - 4.5 hrs/sem' => 'Álgebra moderna - 4.5 hrs/sem',
                        'Análisis complejo - 4.5 hrs/sem' => 'Análisis complejo - 4.5 hrs/sem',
                        'Análisis funcional - 4.5 hrs/sem' => 'Análisis funcional - 4.5 hrs/sem',
                        'Análisis numérico - 4.5 hrs/sem' => 'Análisis numérico - 4.5 hrs/sem',
                        'Análisis real - 4.5 hrs/sem' => 'Análisis real - 4.5 hrs/sem',
                        'Análisis asintótico - 4.5 hrs/sem' => 'Análisis asintótico - 4.5 hrs/sem',
                        'Ecuaciones diferenciales ordinarias - 4.5 hrs/sem' => 'Ecuaciones diferenciales ordinarias - 4.5 hrs/sem',
                        'Ecuaciones diferenciales parciales - 4.5 hrs/sem' => 'Ecuaciones diferenciales parciales - 4.5 hrs/sem',
                        'Geometría algebraica - 4.5 hrs/sem' => 'Geometría algebraica - 4.5 hrs/sem',
                        'Geometría diferencial - 4.5 hrs/sem' => 'Geometría diferencial - 4.5 hrs/sem',
                        'Inferencia Bayesiana - 3 hrs/sem' => 'Inferencia Bayesiana - 3 hrs/sem',
                        'Inferencia estadística - 3 hrs/sem' => 'Inferencia estadística - 3 hrs/sem',
                        'Introducción a la mecánica analítica - 4.5 hrs/sem' => 'Introducción a la mecánica analítica - 4.5 hrs/sem',
                        'Introducción a los medios continuos - 4.5 hrs/sem' => 'Introducción a los medios continuos - 4.5 hrs/sem',
                        'Modelación matemática de sistemas continuos - 4.5 hrs/sem' => 'Modelación matemática de sistemas continuos - 4.5 hrs/sem',
                        'Modelos lineales - 3 hrs/sem' => 'Modelos lineales - 3 hrs/sem',
                        'Probabilidad I - 4.5 hrs/sem' => 'Probabilidad I - 4.5 hrs/sem',
                        'Probabilidad II - 4.5 hrs/sem' => 'Probabilidad II - 4.5 hrs/sem',
                        'Procesos estocásticos - 3 hrs/sem' => 'Procesos estocásticos - 3 hrs/sem',
                        'Procesos estocásticos - 4.5 hrs/sem' => 'Procesos estocásticos - 4.5 hrs/sem',
                        'Solución numérica de ecuaciones diferenciales ordinarias - 4.5 hrs/sem' => 'Solución numérica de ecuaciones diferenciales ordinarias - 4.5 hrs/sem',
                        'Solución numérica de ecuaciones diferenciales parciales - 4.5 hrs/sem' => 'Solución numérica de ecuaciones diferenciales parciales - 4.5 hrs/sem',
                        'Teoría de las gráficas - 4.5 hrs/sem' => 'Teoría de las gráficas - 4.5 hrs/sem',
                        'Teoría de matroides - 4.5 hrs/sem' => 'Teoría de matroides - 4.5 hrs/sem',
                        'Topología algebraica - 4.5 hrs/sem' => 'Topología algebraica - 4.5 hrs/sem',
                        'Topología diferencial - 4.5 hrs/sem' => 'Topología diferencial - 4.5 hrs/sem',
                        'Topología general - 4.5 hrs/sem' => 'Topología general - 4.5 hrs/sem',
                        'Temas selectos de álgebra II - 3 hrs/sem' => 'Temas selectos de álgebra II - 3 hrs/sem',
                        'Temas selectos de álgebra I - 4.5 hrs/sem' => 'Temas selectos de álgebra I - 4.5 hrs/sem',
                        'Temas selectos de análisis II - 3 hrs/sem' => 'Temas selectos de análisis II - 3 hrs/sem',
                        'Temas selectos de análisis I - 4.5 hrs/sem' => 'Temas selectos de análisis I - 4.5 hrs/sem',
                        'Temas selectos de análisis numérico y computación científica II - 3 hrs/sem' => 'Temas selectos de análisis numérico y computación científica II - 3 hrs/sem',
                        'Temas selectos de análisis numérico y computación científica I - 4.5 hrs/sem' => 'Temas selectos de análisis numérico y computación científica I - 4.5 hrs/sem',
                        'Temas selectos de ecuaciones diferenciales ordinarias y parciales II - 3 hrs/sem' => 'Temas selectos de ecuaciones diferenciales ordinarias y parciales II - 3 hrs/sem',
                        'Temas selectos de ecuaciones diferenciales ordinarias y parciales I - 4.5 hrs/sem' => 'Temas selectos de ecuaciones diferenciales ordinarias y parciales I - 4.5 hrs/sem',
                        'Temas selectos de estadística II - 3 hrs/sem' => 'Temas selectos de estadística II - 3 hrs/sem',
                        'Temas selectos de estadística I - 4.5 hrs/sem' => 'Temas selectos de estadística I - 4.5 hrs/sem',
                        'Temas selectos de geometría II - 3 hrs/sem' => 'Temas selectos de geometría II - 3 hrs/sem',
                        'Temas selectos de geometría I - 4.5 hrs/sem' => 'Temas selectos de geometría I - 4.5 hrs/sem',
                        'Temas selectos de matemáticas discretas II - 3 hrs/sem' => 'Temas selectos de matemáticas discretas II - 3 hrs/sem',
                        'Temas selectos de matemáticas discretas I - 4.5 hrs/sem' => 'Temas selectos de matemáticas discretas I - 4.5 hrs/sem',
                        'Temas selectos de probabilidad II - 3 hrs/sem' => 'Temas selectos de probabilidad II - 3 hrs/sem',
                        'Temas selectos de probabilidad I - 4.5 hrs/sem' => 'Temas selectos de probabilidad I - 4.5 hrs/sem',
                        'Temas selectos de sistemas continuos II - 3 hrs/sem' => 'Temas selectos de sistemas continuos II - 3 hrs/sem',
                        'Temas selectos de sistemas continuos I - 4.5 hrs/sem' => 'Temas selectos de sistemas continuos I - 4.5 hrs/sem',
                        'Temas selectos de topología II - 3 hrs/sem' => 'Temas selectos de topología II - 3 hrs/sem',
                        'Temas selectos de topología I - 4.5 hrs/sem' => 'Temas selectos de topología I - 4.5 hrs/sem',
                        'Seminario de álgebra - 2.5 hrs/sem' => 'Seminario de álgebra - 2.5 hrs/sem',
                        'Seminario de análisis - 2.5 hrs/sem' => 'Seminario de análisis - 2.5 hrs/sem',
                        'Seminario de análisis numérico y computación científica - 2.5 hrs/sem' => 'Seminario de análisis numérico y computación científica - 2.5 hrs/sem',
                        'Seminario de ecuaciones diferenciales ordinarias y parciales - 2.5 hrs/sem' => 'Seminario de ecuaciones diferenciales ordinarias y parciales - 2.5 hrs/sem',
                        'Seminario de estadística - 2.5 hrs/sem' => 'Seminario de estadística - 2.5 hrs/sem',
                        'Seminario de geometría - 2.5 hrs/sem' => 'Seminario de geometría - 2.5 hrs/sem',
                        'Seminario de matemáticas discretas - 2.5 hrs/sem' => 'Seminario de matemáticas discretas - 2.5 hrs/sem',
                        'Seminario de probabilidad - 2.5 hrs/sem' => 'Seminario de probabilidad - 2.5 hrs/sem',
                        'Seminario de sistemas continuos - 2.5 hrs/sem' => 'Seminario de sistemas continuos - 2.5 hrs/sem',
                        'Seminario de topología - 2.5 hrs/sem' => 'Seminario de topología - 2.5 hrs/sem'
                    ],
                    'required'    => true,
                    'placeholder' => 'Seleccione un curso',
                    'empty_data'  => null ]
            )
            ->add('tema')
        ->add('objetivo')
        ->add('temario')
        ->add('bibliografia')
        ->add('requisitos')
        ->add('comentarios')
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Curso::class,
        ]);
    }
}
