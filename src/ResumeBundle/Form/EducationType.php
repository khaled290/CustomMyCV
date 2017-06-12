<?php

namespace ResumeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use ResumeBundle\Entity\Resume;


class EducationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('intitule',TextType::class, array(
                'label' => 'Intitulé de la formation : '
            ))
            ->add('dateDebut',DateType::class, array(
                'label' => 'Date de Début :'
            ))
            ->add('dateFin',DateType::class, array(
                'label' => 'Date de Fin'
            ))
            ->add('nomEtablissement',TextType::class, array(
                'label' => 'Nom de l\'établissement :'
            ))
            ->add('description',TextareaType::class, array(
                'label' => 'Description'
            ));

        ## ->add('resume'); #}



    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ResumeBundle\Entity\Education'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'resumebundle_education';
    }

    public function getName()
    {
        return 'education';
    }



}
