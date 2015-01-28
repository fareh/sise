<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureValueexogeneType extends AbstractType
{


    private $tablnamefk;
    private $compteur;

    function __construct($tablnamefk = null, $compteur = null)
    {
        $this->tablnamefk = $tablnamefk;
        $this->compteur = $compteur;

    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if ($this->tablnamefk) {
            $builder->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {
                    $form = $event->getForm();
                    $data = $event->getData();
                    $tbk = $data->getTablnamefk();
                    if ($tbk !== null) {
                        $form->add('tablnamefk', 'entity', array(
                            'class' => 'SiseCoreBundle:' . $this->tablnamefk,
                            'data' => $tbk,
                            'empty_value' => "-- اختيار --"
                        ));

                    } else {
                        $form->add('tablnamefk', 'entity', array(
                            'class' => 'SiseCoreBundle:' . $this->tablnamefk,
                            'empty_value' => "-- اختيار --"
                        ));
                    }
                }
            );
        } else {
            $builder
                ->add('tablnamefk', 'hidden');
        }
        $builder
            ->add('valeindi')
            ->add('codeparaexog');


    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureValueexogene'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->compteur;
    }
}
