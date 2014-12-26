<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03/12/2014
 * Time: 15:44
 */

namespace Sise\Bundle\UserBundle\Entity;


use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_group")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    public function __toString()
    {


        return ($this->name) ? $this->getName() : "";
    }
}
