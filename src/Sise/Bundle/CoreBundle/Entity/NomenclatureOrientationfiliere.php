<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureOrientationfiliere
 *
 * @ORM\Table(name="nomenclature_orientationfiliere")
 * @ORM\Entity
 */
class NomenclatureOrientationfiliere
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeFili", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefili;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeFiliSuiv", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefilisuiv;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScolSuiv", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescolsuiv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Etat", type="boolean", nullable=true)
     */
    private $etat;



    /**
     * Set codefili
     *
     * @param string $codefili
     * @return NomenclatureOrientationfiliere
     */
    public function setCodefili($codefili)
    {
        $this->codefili = $codefili;

        return $this;
    }

    /**
     * Get codefili
     *
     * @return string 
     */
    public function getCodefili()
    {
        return $this->codefili;
    }

    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return NomenclatureOrientationfiliere
     */
    public function setCodenivescol($codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return string 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }

    /**
     * Set codefilisuiv
     *
     * @param string $codefilisuiv
     * @return NomenclatureOrientationfiliere
     */
    public function setCodefilisuiv($codefilisuiv)
    {
        $this->codefilisuiv = $codefilisuiv;

        return $this;
    }

    /**
     * Get codefilisuiv
     *
     * @return string 
     */
    public function getCodefilisuiv()
    {
        return $this->codefilisuiv;
    }

    /**
     * Set codenivescolsuiv
     *
     * @param string $codenivescolsuiv
     * @return NomenclatureOrientationfiliere
     */
    public function setCodenivescolsuiv($codenivescolsuiv)
    {
        $this->codenivescolsuiv = $codenivescolsuiv;

        return $this;
    }

    /**
     * Get codenivescolsuiv
     *
     * @return string 
     */
    public function getCodenivescolsuiv()
    {
        return $this->codenivescolsuiv;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     * @return NomenclatureOrientationfiliere
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean 
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
