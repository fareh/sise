<?php
namespace Sise\Bundle\CoreBundle\Twig\Extension;
use Symfony\Component\DependencyInjection\ContainerInterface;
class SiseExtension extends \Twig_Extension
{

    private $container;

    public function __construct(ContainerInterface $container = null )
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
            new \Twig_SimpleFilter('routeExists', array($this, 'routeExists')),
        );
    }

    public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = '$' . $price;

        return $price;
    }

    public function routeExists($name)
    {
        // I assume that you have a link to the container in your twig extension class
        $router = $this->container->get('router');
        $res = (null === $router->getRouteCollection()->get($name)) ? 0 : 1;
        return $res ;

    }

    public function getName()
    {
        return 'acme_extension';
    }

}
