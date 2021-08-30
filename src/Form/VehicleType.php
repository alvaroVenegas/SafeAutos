<?php

namespace App\Form;
use App\Entity\Vehicle;
use App\Form\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('mark');
        $builder->add('model');
        $builder->add('identification');
        $builder->add('kms');
        //$builder->add('dateITV', DateType::class);
        $builder->add('image');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Vehicle::class
        ]);
    }
}
