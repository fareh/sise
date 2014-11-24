<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteProfilcycleenseignement
 *
 * @ORM\Table(name="securite_profilcycleenseignement", indexes={@ORM\Index(name="FK_Securite_ProfilCycleEnseignement_Nomenclature_CycleEnseigne3", columns={"CodeCyclEnse"})})
 * @ORM\Entity
 */
class SecuriteProfilcycleenseignement
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
     * @ORM\Column(name="CODEGROUUTIL", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codegrouutil;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCyclEnse", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codecyclense;



    /**
     * Set codeprof
     *
     * @param string $codeprof
     * @return SecuriteProfilcycleenseignement
     */
    public function setCodeprof($codeprof)
    {
        $this->codeprof = $codeprof;

        return $this;
    }

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
     * Set codegrouutil
     *
     * @param string $codegrouutil
     * @return SecuriteProfilcycleenseignement
     */
    public function setCodegrouutil($codegrouutil)
    {
        $this->codegrouutil = $codegrouutil;

        return $this;
    }

    /**
     * Get codegrouutil
     *
     * @return string 
     */
    public function getCodegrouutil()
    {
        return $this->codegrouutil;
    }

    /**
     * Set codecyclense
     *
     * @param string $codecyclense
     * @return SecuriteProfilcycleenseignement
     */
    public function setCodecyclense($codecyclense)
    {
        $this->codecyclense = $codecyclense;

        return $this;
    }

    /**
     * Get codecyclense
     *
     * @return string 
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }
}
