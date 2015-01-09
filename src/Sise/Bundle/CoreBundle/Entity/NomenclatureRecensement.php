<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;
/**
 * NomenclatureRecensement
 *
 * @ORM\Table(name="nomenclature_recensement")
 * @ORM\Entity
 */
class NomenclatureRecensement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
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
     * @ORM\Column(name="LibeReceFr", type="string", length=50, nullable=true)
     */
    private $liberecefr;

    /**
     * @var ParametreAnneescolaire
     *
     * @ORM\ManyToOne(targetEntity="ParametreAnneescolaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="AnneScol", referencedColumnName="CodeAnneScol")
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
     * @var NomenclatureEtatrecensement
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureEtatrecensement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtatRece", referencedColumnName="CodeEtatRece")
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
     * @ORM\Column(name="InitQues", type="boolean", nullable=true)
     */
    private $initques;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="text", nullable=true)
     */
    private $obse;

    /**
     * @var ParametrePeriodicite
     *
     * @ORM\ManyToOne(targetEntity="ParametrePeriodicite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodePeri", referencedColumnName="CodePeri")
     * })
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
     * @param string $coderece
     */
    public function setCoderece($coderece)
    {
        $this->coderece = $coderece;
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
    public function __toString()
    {
        return $this->coderece;
    }


    /**
     * Set annescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\ParametreAnneescolaire $annescol
     * @return NomenclatureRecensement
     */
    public function setAnnescol(\Sise\Bundle\CoreBundle\Entity\ParametreAnneescolaire $annescol = null)
    {
        $this->annescol = $annescol;

        return $this;
    }

    /**
     * Get annescol
     *
     * @return \Sise\Bundle\CoreBundle\Entity\ParametreAnneescolaire 
     */
    public function getAnnescol()
    {
        return $this->annescol;
    }

    /**
     * Set codeetatrece
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEtatrecensement $codeetatrece
     * @return NomenclatureRecensement
     */
    public function setCodeetatrece(\Sise\Bundle\CoreBundle\Entity\NomenclatureEtatrecensement $codeetatrece = null)
    {
        $this->codeetatrece = $codeetatrece;

        return $this;
    }

    /**
     * Get codeetatrece
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureEtatrecensement 
     */
    public function getCodeetatrece()
    {
        return $this->codeetatrece;
    }

    /**
     * Set codeperi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\ParametrePeriodicite $codeperi
     * @return NomenclatureRecensement
     */
    public function setCodeperi(\Sise\Bundle\CoreBundle\Entity\ParametrePeriodicite $codeperi = null)
    {
        $this->codeperi = $codeperi;

        return $this;
    }

    /**
     * Get codeperi
     *
     * @return \Sise\Bundle\CoreBundle\Entity\ParametrePeriodicite 
     */
    public function getCodeperi()
    {
        return $this->codeperi;
    }
}
