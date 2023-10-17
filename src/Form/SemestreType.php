<?php

namespace App\Form;

use App\Entity\Semestre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class SemestreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('semestre')
            ->add('vigencia',DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('convocatoriaFile', VichFileType::class, [
                'required' => false,
                'label'=>'Convocatoria',
                'delete_label' => 'Eliminar archivo',
                'download_label' => 'Ver archivo',

            ])
            ->add('calendarioFile', VichFileType::class, [
                'required' => false,
                'label'=>'Calendario',
                'delete_label' => 'Eliminar archivo',
                'download_label' => 'Ver archivo',
            ])
            ->add('rcalendarioFile', VichFileType::class, [
                'required' => false,
                'label'=>'Calendario reingreso',
                'delete_label' => 'Eliminar archivo',
                'download_label' => 'Ver archivo',
            ])
            ->add('instructivoFile', VichFileType::class, [
                'required' => false,
                'label'=>'Instructivo',
                'delete_label' => 'Eliminar archivo',
                'download_label' => 'Ver archivo',
            ])
            ->add('reconvocatoriamFile', VichFileType::class, [
                'required' => false,
                'label'=>'Convocatoria reingreso maestría',
                'delete_label' => 'Eliminar archivo',
                'download_label' => 'Ver archivo',
            ])
            ->add('reconvocatoriadFile', VichFileType::class, [
                'required' => false,
                'label'=>'Convocatoria reingreso doctorado',
                'delete_label' => 'Eliminar archivo',
                'download_label' => 'Ver archivo',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Semestre::class,
        ]);
    }
}
