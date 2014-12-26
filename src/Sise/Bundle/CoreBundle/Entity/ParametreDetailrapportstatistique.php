<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreDetailrapportstatistique
 *
 * @ORM\Table(name="parametre_detailrapportstatistique")
 * @ORM\Entity
 */
class ParametreDetailrapportstatistique
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRappStat", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderappstat;

    /**
     * @var integer
     *
     * @ORM\Column(name="NumeFiel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numefiel;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldName", type="string", length=50, nullable=true)
     */
    private $fieldname;

    /**
     * @var string
     *
     * @ORM\Column(name="CaptionAr", type="string", length=50, nullable=true)
     */
    private $captionar;

    /**
     * @var string
     *
     * @ORM\Column(name="CaptionFr", type="string", length=50, nullable=true)
     */
    private $captionfr;

    /**
     * @var string
     *
     * @ORM\Column(name="CssClass", type="string", length=50, nullable=true)
     */
    private $cssclass;

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemWidth", type="integer", nullable=true)
     */
    private $itemwidth;

    /**
     * @var string
     *
     * @ORM\Column(name="ColumnFromDB", type="text", nullable=true)
     */
    private $columnfromdb;


    /**
     * Set coderappstat
     *
     * @param string $coderappstat
     * @return ParametreDetailrapportstatistique
     */
    public function setCoderappstat($coderappstat)
    {
        $this->coderappstat = $coderappstat;

        return $this;
    }

    /**
     * Get coderappstat
     *
     * @return string
     */
    public function getCoderappstat()
    {
        return $this->coderappstat;
    }

    /**
     * Set numefiel
     *
     * @param integer $numefiel
     * @return ParametreDetailrapportstatistique
     */
    public function setNumefiel($numefiel)
    {
        $this->numefiel = $numefiel;

        return $this;
    }

    /**
     * Get numefiel
     *
     * @return integer
     */
    public function getNumefiel()
    {
        return $this->numefiel;
    }

    /**
     * Set fieldname
     *
     * @param string $fieldname
     * @return ParametreDetailrapportstatistique
     */
    public function setFieldname($fieldname)
    {
        $this->fieldname = $fieldname;

        return $this;
    }

    /**
     * Get fieldname
     *
     * @return string
     */
    public function getFieldname()
    {
        return $this->fieldname;
    }

    /**
     * Set captionar
     *
     * @param string $captionar
     * @return ParametreDetailrapportstatistique
     */
    public function setCaptionar($captionar)
    {
        $this->captionar = $captionar;

        return $this;
    }

    /**
     * Get captionar
     *
     * @return string
     */
    public function getCaptionar()
    {
        return $this->captionar;
    }

    /**
     * Set captionfr
     *
     * @param string $captionfr
     * @return ParametreDetailrapportstatistique
     */
    public function setCaptionfr($captionfr)
    {
        $this->captionfr = $captionfr;

        return $this;
    }

    /**
     * Get captionfr
     *
     * @return string
     */
    public function getCaptionfr()
    {
        return $this->captionfr;
    }

    /**
     * Set cssclass
     *
     * @param string $cssclass
     * @return ParametreDetailrapportstatistique
     */
    public function setCssclass($cssclass)
    {
        $this->cssclass = $cssclass;

        return $this;
    }

    /**
     * Get cssclass
     *
     * @return string
     */
    public function getCssclass()
    {
        return $this->cssclass;
    }

    /**
     * Set itemwidth
     *
     * @param integer $itemwidth
     * @return ParametreDetailrapportstatistique
     */
    public function setItemwidth($itemwidth)
    {
        $this->itemwidth = $itemwidth;

        return $this;
    }

    /**
     * Get itemwidth
     *
     * @return integer
     */
    public function getItemwidth()
    {
        return $this->itemwidth;
    }

    /**
     * Set columnfromdb
     *
     * @param string $columnfromdb
     * @return ParametreDetailrapportstatistique
     */
    public function setColumnfromdb($columnfromdb)
    {
        $this->columnfromdb = $columnfromdb;

        return $this;
    }

    /**
     * Get columnfromdb
     *
     * @return string
     */
    public function getColumnfromdb()
    {
        return $this->columnfromdb;
    }
}
