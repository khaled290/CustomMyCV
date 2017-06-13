<?php

namespace ResumeBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use ResumeBundle\Entity\Resume;

class SkillType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categorie',TextType::class, array(
                'label' => 'Catégorie'
            ))
            ->add('libelle',TextType::class, array(
                'label' => 'Nom de la compétence :'
            ))
            ->add('niveau',TextType::class, array(
                'label' => 'Niveau :'
            ))
            ->add('resume', EntityType::class, array(
                    'label' => 'Attacher au CV : ',
                    'class' => Resume::class,

                )
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ResumeBundle\Entity\Skill'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'resumebundle_skill';
    }


}
