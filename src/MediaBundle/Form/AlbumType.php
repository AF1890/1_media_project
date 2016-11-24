<?php

namespace MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AlbumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreAlbum')
            ->add('artiste')
            ->add('genre', ChoiceType::class, array(
                'choices'  => array(
                    'Hiphop' =>  'Hiphop',
                    'Soul' => 'Soul',
                    'Rock' => 'Rock'),
                'empty_value' => '- Choisissez une option -',
                'empty_data' => null
                ))
            ->add('support', ChoiceType::class, array(
                'choices'  => array(
                    'empty_value' => '- Choisissez une option -',
                    'Vinyl' =>  'Vinyl',
                    'CD' => 'CD',
                    'Cassette' => 'Cassette'),
                'empty_value' => '- Choisissez une option -',
                'empty_data' => null
                ))
            ->add('couverture', FileType::class, array('data_class' => null))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediaBundle\Entity\Album'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mediabundle_album';
    }


}
