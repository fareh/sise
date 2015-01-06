<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 06/01/2015
 * Time: 15:02
 */

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EffectiveenseignentListeenseignentheureautreetablissementType  extends AbstractType
{
    private $keyval ;

    function __construct($keyval){

        $this->keyval =$keyval;


    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nompren')
            ->add('idenuniqense')
            ->add('codegrad')
            ->add('codedele', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureDelegation',
                'property' => 'libedelear',
                'empty_value' => "-- اختيار --"
            ))
            ->add('codetypeetabautr')
            ->add('codeetabautr')
            ->add('nombheur');


        /* ->add('annescolautr')*/





    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EffectiveenseignentListeenseignentheureautreetablissement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->keyval;
    }
}
