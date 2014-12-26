<?php

namespace Test\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\DataEvent;

use Test\TestBundle\Entity\Country;
use Test\TestBundle\Entity\State;
use Test\TestBundle\Entity\City;


class CityType extends AbstractType
{


    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');

        $factory = $builder->getFormFactory();

        $refreshStates = function ($form, $country) use ($factory) {
            $form->add($factory->createNamed('entity', 'state', null, array(
                'class' => 'Test\TestBundle\Entity\State',
                'property' => 'name',
                'empty_value' => '-- Select a state --',
                'query_builder' => function (EntityRepository $repository) use ($country) {
                    $qb = $repository->createQueryBuilder('state')
                        ->innerJoin('state.country', 'country');

                    if ($country instanceof Country) {
                        $qb->where('state.country = :country')
                            ->setParameter('country', $country);
                    } elseif (is_numeric($country)) {
                        $qb->where('country.id = :country')
                            ->setParameter('country', $country);
                    } else {
                        $qb->where('country.name = :country')
                            ->setParameter('country', null);
                    }
                    return $qb;
                }
            )));
        };

        $setCountry = function ($form, $country) use ($factory) {
            $form->add($factory->createNamed('entity', 'country', null, array(
                'class' => 'TestBundle:Country',
                'property' => 'name',
                'property_path' => false,
                'empty_value' => '-- Select a country --',
                'data' => $country,
            )));
        };

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (DataEvent $event) use ($refreshStates, $setCountry) {
            $form = $event->getForm();
            $data = $event->getData();

            if ($data == null)
                return;

            if ($data instanceof City) {
                $country = ($data->getId()) ? $data->getState()->getCountry() : null;
                $refreshStates($form, $country);
                $setCountry($form, $country);
            }
        });
        //http://stackoverflow.com/questions/10186185/symfony2-chained-selectors

        $builder->addEventListener(FormEvents::PRE_BIND, function (DataEvent $event) use ($refreshStates) {
            $form = $event->getForm();
            $data = $event->getData();

            if (array_key_exists('country', $data)) {
                $refreshStates($form, $data['country']);
            }
        });
    }

    public function getName()
    {
        return 'city';
    }


    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'onPreSetData',
            FormEvents::PRE_SUBMIT => 'onPreSubmit',
        );
    }

    public function onPreSetData(FormEvent $event)
    {
        $user = $event->getData();
        $form = $event->getForm();

        // Check whether the user from the initial data has chosen to
        // display his email or not.
        if (true === $user->isShowEmail()) {
            $form->add('email', 'email');
        }
    }


    public function onPreSubmit(FormEvent $event)
    {
        $user = $event->getData();
        $form = $event->getForm();
        var_dump($user);
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Test\TestBundle\Entity\City');
    }
}