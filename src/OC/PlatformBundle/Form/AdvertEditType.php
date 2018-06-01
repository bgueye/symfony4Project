<?php

namespace OC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AdvertEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('date');
        // On ajoute une fonction qui va écouter un évènement
        $builder->addEventListener(
          FormEvents::PRE_SET_DATA,    // 1er argument : L'évènement qui nous intéresse : ici, PRE_SET_DATA
          function(FormEvent $event) { // 2e argument : La fonction à exécuter lorsque l'évènement est déclenché
            // On récupère notre objet Advert sous-jacent
            $advert = $event->getData();

            // Cette condition est importante, on en reparle plus loin
            if (null === $advert) {
              return; // On sort de la fonction sans rien faire lorsque $advert vaut null
            }

            // Si l'annonce n'est pas publiée, ou si elle n'existe pas encore en base (id est null)
            if (!$advert->getPublished() || null === $advert->getId()) {
              // Alors on ajoute le champ published
              $event->getForm()->add('published', CheckboxType::class, array('required' => false));
            } else {
              // Sinon, on le supprime
              $event->getForm()->remove('published');
            }
          }
        );
    }
    

    public function getParent()
    {
        return AdvertType::class;
    }


}
