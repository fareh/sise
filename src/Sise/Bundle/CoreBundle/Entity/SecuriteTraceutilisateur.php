<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteTraceutilisateur
 *
 * @ORM\Table(name="securite_traceutilisateur", indexes={@ORM\Index(name="FK_SECURITE_TRACEUTILISATEUR_S", columns={"CODEUTIL"}), @ORM\Index(name="FK_SECURITE_TRACEUTILISATEUR_SECURITE_TYPEOPERATIONTRACE", columns={"CODETYPEOPER"})})
 * @ORM\Entity
 */
class SecuriteTraceutilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="NUMETRAC", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numetrac;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBETRAC", type="string", length=1000, nullable=true)
     */
    private $libetrac;

    /**
     * @var string
     *
     * @ORM\Column(name="LINKTRAC", type="string", length=300, nullable=true)
     */
    private $linktrac;

    /**
     * @var string
     *
     * @ORM\Column(name="CODEUTIL", type="string", length=100, nullable=false)
     */
    private $codeutil;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATETRAC", type="datetime", nullable=false)
     */
    private $datetrac;

    /**
     * @var string
     *
     * @ORM\Column(name="CODETYPEOPER", type="string", length=100, nullable=false)
     */
    private $codetypeoper;

    /**
     * @var string
     *
     * @ORM\Column(name="CODEENTI", type="string", length=100, nullable=false)
     */
    private $codeenti;

    /**
     * @var string
     *
     * @ORM\Column(name="PKENTI", type="string", length=200, nullable=true)
     */
    private $pkenti;


    /**
     * Get numetrac
     *
     * @return integer
     */
    public function getNumetrac()
    {
        return $this->numetrac;
    }

    /**
     * Set libetrac
     *
     * @param string $libetrac
     * @return SecuriteTraceutilisateur
     */
    public function setLibetrac($libetrac)
    {
        $this->libetrac = $libetrac;

        return $this;
    }

    /**
     * Get libetrac
     *
     * @return string
     */
    public function getLibetrac()
    {
        return $this->libetrac;
    }

    /**
     * Set linktrac
     *
     * @param string $linktrac
     * @return SecuriteTraceutilisateur
     */
    public function setLinktrac($linktrac)
    {
        $this->linktrac = $linktrac;

        return $this;
    }

    /**
     * Get linktrac
     *
     * @return string
     */
    public function getLinktrac()
    {
        return $this->linktrac;
    }

    /**
     * Set codeutil
     *
     * @param string $codeutil
     * @return SecuriteTraceutilisateur
     */
    public function setCodeutil($codeutil)
    {
        $this->codeutil = $codeutil;

        return $this;
    }

    /**
     * Get codeutil
     *
     * @return string
     */
    public function getCodeutil()
    {
        return $this->codeutil;
    }

    /**
     * Set datetrac
     *
     * @param \DateTime $datetrac
     * @return SecuriteTraceutilisateur
     */
    public function setDatetrac($datetrac)
    {
        $this->datetrac = $datetrac;

        return $this;
    }

    /**
     * Get datetrac
     *
     * @return \DateTime
     */
    public function getDatetrac()
    {
        return $this->datetrac;
    }

    /**
     * Set codetypeoper
     *
     * @param string $codetypeoper
     * @return SecuriteTraceutilisateur
     */
    public function setCodetypeoper($codetypeoper)
    {
        $this->codetypeoper = $codetypeoper;

        return $this;
    }

    /**
     * Get codetypeoper
     *
     * @return string
     */
    public function getCodetypeoper()
    {
        return $this->codetypeoper;
    }

    /**
     * Set codeenti
     *
     * @param string $codeenti
     * @return SecuriteTraceutilisateur
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
     * Set pkenti
     *
     * @param string $pkenti
     * @return SecuriteTraceutilisateur
     */
    public function setPkenti($pkenti)
    {
        $this->pkenti = $pkenti;

        return $this;
    }

    /**
     * Get pkenti
     *
     * @return string
     */
    public function getPkenti()
    {
        return $this->pkenti;
    }
}
