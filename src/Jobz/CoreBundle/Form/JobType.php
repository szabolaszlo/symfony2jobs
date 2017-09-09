<?php

namespace Jobz\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jobType', 'choice', array(
                'choices'  => array(
                    'Full-time' => 'Full-time',
                    'Part-time' => 'Part-time',
                    'Freelance' => 'Freelance',
                ),
            ))
            ->add('company')
            ->add('url')
            ->add('position')
            ->add('location')
            ->add('description')
            ->add('howToApply')
            ->add('email')
            ->add('category', 'entity', array(
                'label' => 'Category',
                'class' => 'Jobz\CoreBundle\Entity\Category',
                'choice_label' => 'name'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jobz\CoreBundle\Entity\Job'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jobz_corebundle_job';
    }


}
