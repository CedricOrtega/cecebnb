<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    
    /**
     * Permet d'avoir la configuration de base d'un champ
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder)
    {
        return ['label' => $label,
                'attr' => ['placeholder' => $placeholder
        ]
        ];
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->getConfiguration("Titre","Saisir le titre de l'annonce"))
            ->add('slug', TextType::class, $this->getConfiguration("Adresse web","Saisir l'adresse web (Automatique) "))
            ->add('coverImage', UrlType::class, $this->getConfiguration("Url de l'image principale","Saisir l'url de l'image principale'"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction","Saisir l'introduction de l'annonce"))
            ->add('content', TextareaType::class, $this->getConfiguration("Description détaillée","Saisir la description de l'annonce"))
            ->add('rooms', IntegerType::class, $this->getConfiguration("Nombre de chambres","Saisir le nombre de chambre de l'annonce"))
            ->add('price', MoneyType::class, $this->getConfiguration("Prix de la nuit","Saisir le prix de la nuit"))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
