<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureRecensement
 *
 * @ORM\Table(name="nomenclature_recensement", indexes={@ORM\Index(name="FK_Nomenclature_Recenssement_Nomenclature_EtatRecenssement", columns={"CodeEtatRece"})})
 * @ORM\Entity
 */
class NomenclatureRecensement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coderece;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeReceAr", type="string", length=50, nullable=false)
     */
    private $liberecear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeReceFr", type="string", length=50, nullable=false)
     */
    private $liberecefr;

    /**
     * @var \ParametreAnneescolaire
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ParametreAnneescolaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="AnneScol", referencedColumnName="CodeAnneScol"),
     * })
     */
    private $annescol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateOuve", type="datetime", nullable=false)
     */
    private $dateouve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateClot", type="datetime", nullable=true)
     */
    private $dateclot;

    /**
     * @var \NomenclatureEtatrecensement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NomenclatureEtatrecensement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtatRece", referencedColumnName="CodeEtatRece"),
     * })
     */
    private $codeetatrece;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePeriSuivBudg", type="string", length=50, nullable=true)
     */
    private $codeperisuivbudg;

    /**
     * @var boolean
     *
     * @ORM\Column(name="InitQues", type="boolean", nullable=false)
     */
    private $initques;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="text", nullable=true)
     */
    private $obse;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePeri", type="string", length=50, nullable=true)
     */
    private $codeperi;

    /**
     * @var integer
     *
     * @ORM\Column(name="DurePeri", type="integer", nullable=true)
     */
    private $dureperi;



    /**
     * Get coderece
     *
     * @return string
     */
    public function getCoderece()
    {
        return $this->coderece;
    }

    /**
     * Set liberecear
     *
     * @param string $liberecear
     * @return NomenclatureRecensement
     */
    public function setLiberecear($liberecear)
    {
        $this->liberecear = $liberecear;

        return $this;
    }

    /**
     * Get liberecear
     *
     * @return string
     */
    public function getLiberecear()
    {
        return $this->liberecear;
    }

    /**
     * Set liberecefr
     *
     * @param string $liberecefr
     * @return NomenclatureRecensement
     */
    public function setLiberecefr($liberecefr)
    {
        $this->liberecefr = $liberecefr;

        return $this;
    }

    /**
     * Get liberecefr
     *
     * @return string
     */
    public function getLiberecefr()
    {
        return $this->liberecefr;
    }

    /**
     * Set annescol
     *
     * @param integer $annescol
     * @return NomenclatureRecensement
     */
    public function setAnnescol($annescol)
    {
        $this->annescol = $annescol;

        return $this;
    }

    /**
     * Get annescol
     *
     * @return integer
     */
    public function getAnnescol()
    {
        return $this->annescol;
    }

    /**
     * Set dateouve
     *
     * @param \DateTime $dateouve
     * @return NomenclatureRecensement
     */
    public function setDateouve($dateouve)
    {
        $this->dateouve = $dateouve;

        return $this;
    }

    /**
     * Get dateouve
     *
     * @return \DateTime
     */
    public function getDateouve()
    {
        return $this->dateouve;
    }

    /**
     * Set dateclot
     *
     * @param \DateTime $dateclot
     * @return NomenclatureRecensement
     */
    public function setDateclot($dateclot)
    {
        $this->dateclot = $dateclot;

        return $this;
    }

    /**
     * Get dateclot
     *
     * @return \DateTime
     */
    public function getDateclot()
    {
        return $this->dateclot;
    }

    /**
     * Set codeetatrece
     *
     * @param string $codeetatrece
     * @return NomenclatureRecensement
     */
    public function setCodeetatrece($codeetatrece)
    {
        $this->codeetatrece = $codeetatrece;

        return $this;
    }

    /**
     * Get codeetatrece
     *
     * @return string
     */
    public function getCodeetatrece()
    {
        return $this->codeetatrece;
    }

    /**
     * Set codeperisuivbudg
     *
     * @param string $codeperisuivbudg
     * @return NomenclatureRecensement
     */
    public function setCodeperisuivbudg($codeperisuivbudg)
    {
        $this->codeperisuivbudg = $codeperisuivbudg;

        return $this;
    }

    /**
     * Get codeperisuivbudg
     *
     * @return string
     */
    public function getCodeperisuivbudg()
    {
        return $this->codeperisuivbudg;
    }

    /**
     * Set initques
     *
     * @param boolean $initques
     * @return NomenclatureRecensement
     */
    public function setInitques($initques)
    {
        $this->initques = $initques;

        return $this;
    }

    /**
     * Get initques
     *
     * @return boolean
     */
    public function getInitques()
    {
        return $this->initques;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return NomenclatureRecensement
     */
    public function setObse($obse)
    {
        $this->obse = $obse;

        return $this;
    }

    /**
     * Get obse
     *
     * @return string
     */
    public function getObse()
    {
        return $this->obse;
    }

    /**
     * Set codeperi
     *
     * @param string $codeperi
     * @return NomenclatureRecensement
     */
    public function setCodeperi($codeperi)
    {
        $this->codeperi = $codeperi;

        return $this;
    }

    /**
     * Get codeperi
     *
     * @return string
     */
    public function getCodeperi()
    {
        return $this->codeperi;
    }

    /**
     * Set dureperi
     *
     * @param integer $dureperi
     * @return NomenclatureRecensement
     */
    public function setDureperi($dureperi)
    {
        $this->dureperi = $dureperi;

        return $this;
    }

    /**
     * Get dureperi
     *
     * @return integer
     */
    public function getDureperi()
    {
        return $this->dureperi;
    }
}
