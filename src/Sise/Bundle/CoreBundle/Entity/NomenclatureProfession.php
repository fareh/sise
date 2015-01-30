<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureProfessionType;
/**
 * NomenclatureProfession
 *
 * @ORM\Table(name="nomenclature_profession")
 * @ORM\Entity
 */
class NomenclatureProfession
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeProf", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeprof;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeProfAr", type="string", length=50, nullable=true)
     */
    private $libeprofar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeProfFr", type="string", length=50, nullable=true)
     */
    private $libeproffr;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrAffi", type="integer", nullable=true)
     */
    private $ordraffi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;


    /**
     * Get codeprof
     *
     * @return string
     */
    public function getCodeprof()
    {
        return $this->codeprof;
    }

    /**
     * Set libeprofar
     *
     * @param string $libeprofar
     * @return NomenclatureProfession
     */
    public function setLibeprofar($libeprofar)
    {
        $this->libeprofar = $libeprofar;

        return $this;
    }

    /**
     * Get libeprofar
     *
     * @return string
     */
    public function getLibeprofar()
    {
        return $this->libeprofar;
    }

    /**
     * Set libeproffr
     *
     * @param string $libeproffr
     * @return NomenclatureProfession
     */
    public function setLibeproffr($libeproffr)
    {
        $this->libeproffr = $libeproffr;

        return $this;
    }

    /**
     * Get libeproffr
     *
     * @return string
     */
    public function getLibeproffr()
    {
        return $this->libeproffr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureProfession
     */
    public function setOrdraffi($ordraffi)
    {
        $this->ordraffi = $ordraffi;

        return $this;
    }

    /**
     * Get ordraffi
     *
     * @return integer
     */
    public function getOrdraffi()
    {
        return $this->ordraffi;
    }

    /**
     * Set acti
     *
     * @param boolean $acti
     * @return NomenclatureProfession
     */
    public function setActi($acti)
    {
        $this->acti = $acti;

        return $this;
    }

    /**
     * Get acti
     *
     * @return boolean
     */
    public function getActi()
    {
        return $this->acti;
    }

    public function __toString()
    {
        return $this->codeprof;
    }
    public function iterateVisible() {
        //   echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            $indice[]=$key;
        }
        return $indice;
    }
    public function getinstanceType() {
        //   echo "MyClass::iterateVisible:\n";
        $instancetype=new NomenclatureProfessionType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codeprof;
    }
}
