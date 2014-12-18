<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureSituationfamiliale
 *
 * @ORM\Table(name="nomenclature_situationfamiliale")
 * @ORM\Entity
 */
class NomenclatureSituationfamiliale
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeSituFami", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codesitufami;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituFamiAr", type="string", length=50, nullable=true)
     */
    private $libesitufamiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituFamiFr", type="string", length=50, nullable=true)
     */
    private $libesitufamifr;

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
     * Get codesitufami
     *
     * @return string 
     */
    public function getCodesitufami()
    {
        return $this->codesitufami;
    }

    /**
     * Set libesitufamiar
     *
     * @param string $libesitufamiar
     * @return NomenclatureSituationfamiliale
     */
    public function setLibesitufamiar($libesitufamiar)
    {
        $this->libesitufamiar = $libesitufamiar;

        return $this;
    }

    /**
     * Get libesitufamiar
     *
     * @return string 
     */
    public function getLibesitufamiar()
    {
        return $this->libesitufamiar;
    }

    /**
     * Set libesitufamifr
     *
     * @param string $libesitufamifr
     * @return NomenclatureSituationfamiliale
     */
    public function setLibesitufamifr($libesitufamifr)
    {
        $this->libesitufamifr = $libesitufamifr;

        return $this;
    }

    /**
     * Get libesitufamifr
     *
     * @return string 
     */
    public function getLibesitufamifr()
    {
        return $this->libesitufamifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureSituationfamiliale
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
     * @return NomenclatureSituationfamiliale
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
        return $this->codesitufami;
    }
}
