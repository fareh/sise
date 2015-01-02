<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 02/01/2015
 * Time: 11:59
 */

namespace Sise\Bundle\CoreBundle\EventListener;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddfieldToDisabledInEditViewSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Tells the dispatcher that you want to listen on the form.pre_set_data
        // event and that the preSetData method should be called.
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        // check if the object is "new"
        // If you didn't pass any data to the form, the data is "null".
        // This should be considered a new object
        if (!$data || !$data->getCodeetabsour()) {
            $form->add('codeetabsour', 'choice', array(
                'empty_value' => "-- اختيار --"
            ))
                ->add('codetypeetabsour', 'hidden');
        }
        else
        {
            $form->add('codeetabsour', 'hidden')
                ->add('codetypeetabsour', 'hidden');
        }
    }
}