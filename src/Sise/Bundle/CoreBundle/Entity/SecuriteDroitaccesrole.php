<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteDroitaccesrole
 *
 * @ORM\Table(name="securite_droitaccesrole", indexes={@ORM\Index(name="FK_SECURITE_DroitAccesRole_SECURITE_ENTITE", columns={"CODEENTI"})})
 * @ORM\Entity
 */
class SecuriteDroitaccesrole
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRole", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderole;

    /**
     * @var string
     *
     * @ORM\Column(name="CODEENTI", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeenti;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROISELE", type="smallint", nullable=false)
     */
    private $droisele;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIINSE", type="smallint", nullable=false)
     */
    private $droiinse;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIUPDA", type="smallint", nullable=false)
     */
    private $droiupda;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIDELE", type="smallint", nullable=false)
     */
    private $droidele;



    /**
     * Set coderole
     *
     * @param string $coderole
     * @return SecuriteDroitaccesrole
     */
    public function setCoderole($coderole)
    {
        $this->coderole = $coderole;

        return $this;
    }

    /**
     * Get coderole
     *
     * @return string 
     */
    public function getCoderole()
    {
        return $this->coderole;
    }

    /**
     * Set codeenti
     *
     * @param string $codeenti
     * @return SecuriteDroitaccesrole
     */
    public function setCodeenti($codeenti)
    {
        $this->codeenti = $codeenti;

        return $this;
    }

    /**
     * Get codeenti
     *
     * @return string 
     */
    public function getCodeenti()
    {
        return $this->codeenti;
    }

    /**
     * Set droisele
     *
     * @param integer $droisele
     * @return SecuriteDroitaccesrole
     */
    public function setDroisele($droisele)
    {
        $this->droisele = $droisele;

        return $this;
    }

    /**
     * Get droisele
     *
     * @return integer 
     */
    public function getDroisele()
    {
        return $this->droisele;
    }

    /**
     * Set droiinse
     *
     * @param integer $droiinse
     * @return SecuriteDroitaccesrole
     */
    public function setDroiinse($droiinse)
    {
        $this->droiinse = $droiinse;

        return $this;
    }

    /**
     * Get droiinse
     *
     * @return integer 
     */
    public function getDroiinse()
    {
        return $this->droiinse;
    }

    /**
     * Set droiupda
     *
     * @param integer $droiupda
     * @return SecuriteDroitaccesrole
     */
    public function setDroiupda($droiupda)
    {
        $this->droiupda = $droiupda;

        return $this;
    }

    /**
     * Get droiupda
     *
     * @return integer 
     */
    public function getDroiupda()
    {
        return $this->droiupda;
    }

    /**
     * Set droidele
     *
     * @param integer $droidele
     * @return SecuriteDroitaccesrole
     */
    public function setDroidele($droidele)
    {
        $this->droidele = $droidele;

        return $this;
    }

    /**
     * Get droidele
     *
     * @return integer 
     */
    public function getDroidele()
    {
        return $this->droidele;
    }
}
