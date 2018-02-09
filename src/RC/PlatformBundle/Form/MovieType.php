<?php

namespace RC\PlatformBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('year', NumberType::class)
            ->add('releaseDate', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'required' => false,
            ))
            ->add('duration', NumberType::class, array(
                'required' =>false,
            ))
            ->add('country', CountryType::class, array(
                'placeholder' => '',
            ))
            ->add('countryTwo', CountryType::class, array(
                'placeholder' => '',
                'required' => false,
            ))
            ->add('countryThree', CountryType::class, array(
                'placeholder' => '',
                'required' => false,
            ))
            ->add('synopsis', SynopsisType::class, array(
                'required' => false,
            ))
            ->add('categories', EntityType::class, array(
                'class'        => 'RCPlatformBundle:Category',
                'choice_label' => 'name',
                'multiple'     => true,
                'required' => true,
            ))
            ->add('poster', PosterType::class)
            ->add('banner', BannerType::class, array(
                'required' => false,
            ))
            ->add('save',SubmitType::class, [
                'label' => "Envoyer"
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RC\PlatformBundle\Entity\Movie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rc_platformbundle_movie';
    }


}
