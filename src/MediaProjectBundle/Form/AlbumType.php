<?php

namespace MediaProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AlbumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder->add('titreAlbum')->add('artiste')->add('genre')->add('support')->add('commentaires')        ;
        $builder->add('titreAlbum')
                ->add('artiste')
                ->add('genre', ChoiceType::class, [
                    'choices' => [
                        'HipHop' => "HipHop",
                        'Soul' => "Soul",
                        'Rock' => "Rock",
                    ],
                    'choices_as_values' => true,
                ])
            ->add('support', ChoiceType::class, [
                'choices' => [
                    'Vinyl' => "Vinyl",
                    'CD' => "CD",
                    'K7' => "K7",
                ],
                'choices_as_values' => true,
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediaProjectBundle\Entity\Album'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mediaprojectbundle_album';
    }


}
