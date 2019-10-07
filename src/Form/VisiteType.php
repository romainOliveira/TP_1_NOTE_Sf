<?php

namespace App\Form;

use App\Entity\Visite;
use App\Entity\Bien;
use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_bien', EntityType::class, array('class'=>Bien::class,'choice_label' => 'id'))
            ->add('id_visiteur', EntityType::class, array('class'=> Visiteur::class,'choice_label' => 'id'))
            ->add('id_date')
            ->add('suivi')
            ->add('valider',SubmitType::class, array('label' => 'Valider', 'attr' =>array('class' => 'btn btn-primary btn-block')))
            ->add('annuler',ResetType::class, array('label' => 'Quitter', 'attr' =>array('class' => 'btn btn-primary btn-block')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}
