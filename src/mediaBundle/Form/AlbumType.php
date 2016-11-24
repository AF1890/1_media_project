<?php

namespace mediaBundle\Form;

use Symfony\Component\DependencyInjection\Tests\Compiler\MultipleArguments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\ChoiceSubType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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

            'choices' => array(
                'Hip-hop' => "Hip-hop",
                'Soul' => "Soul",
                'Rock' => "Rock",
            ),
            // *this line is important*
            'choices_as_values' => true,
        ))
            ->add('support', ChoiceType::class, array(

                'choices' => array(
                    'Vynil' => "Vynil",
                    'CD' => "CD",
                    'Cassette' => "Cassette",
                ),
                // *this line is important*
                'choices_as_values' => true,
            ))        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'mediaBundle\Entity\Album'
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
