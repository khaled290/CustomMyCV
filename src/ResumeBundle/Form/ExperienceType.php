<?php

namespace ResumeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use ResumeBundle\Entity\Resume;

class ExperienceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomPoste', TextType::class,  array(
                'label' => 'Intitulé du poste :'
            ))
            ->add('dateDebut',DateType::class, array(
                'label' => 'Date de prise de poste :'
            ))
            ->add('dateFin',DateType::class, array(
                'label' => 'Date de fin :'
            ))
            ->add('lieu',TextType::class, array(
                'label' => 'Lieu :'
            ))
            ->add('entreprise',TextType::class, array(
                'label' => 'Nom Entreprise :'
            ))
            ->add('missions',TextareaType::class, array(
                'label' => 'Missions attribués :'
            ))
            ->add('resume',EntityType::class, array(
                    'class' => 'ResumeBundle:Experience',
                    'label' => 'Attacher au CV : ',
                )
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ResumeBundle\Entity\Experience'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'resumebundle_experience';
    }


}
