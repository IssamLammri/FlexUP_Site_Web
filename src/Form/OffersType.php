<?php

namespace App\Form;

use App\Entity\Offers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unit')
            ->add('currency')
            ->add('targetPrice')
            ->add('minimumPrice')
            ->add('transportFixed')
            ->add('typeLiv')
            ->add('dateOffers')
            ->add('idGroup')
            ->add('idService')
            ->add('idZones')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offers::class,
        ]);
    }
}
