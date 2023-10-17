<?php

namespace App\Form;

use App\Entity\Tutor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TutorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo',ChoiceType::class, [
                'choices'=> [
                    'Dr.'=>'Dr.',
                    'Dra.'=>'Dra.'],

                    'required'    => true,
                    'placeholder' => 'Seleccionar',
                    'empty_data'  => null ]
            )
            ->add('nombre')
            ->add('apellido')
            ->add('adscripcion')
            ->add('email')
            ->add('area')
            ->add('url')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tutor::class,
        ]);
    }
}
