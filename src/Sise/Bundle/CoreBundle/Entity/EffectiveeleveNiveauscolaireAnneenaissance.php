<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveNiveauscolaireAnneenaissance
 *
 * @ORM\Table(name="effectiveeleve_niveauscolaire_anneenaissance")
 *@ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\EffectiveeleveNiveauscolaireAnneenaissanceRepository")
 */
class EffectiveeleveNiveauscolaireAnneenaissance
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeetab;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneScol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderece;

    /**
     * @var NomenclatureNiveauscolaire
     * @ORM\ManyToOne(targetEntity="NomenclatureNiveauscolaire")
     * @ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescol;

    /**
     * @var NomenclatureAnneenaissance
     * @ORM\ManyToOne(targetEntity="NomenclatureAnneenaissance")
     * @ORM\JoinColumn(name="CodeAnneNais", referencedColumnName="CodeAnneNais")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeannenais;


    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMasc", type="integer", nullable=true)
     */
    private $nombelevmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemi", type="integer", nullable=true)
     */
    private $nombelevfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElev", type="integer", nullable=true)
     */
    private $nombtotaelev;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setCodeetab($codeetab)
    {
        $this->codeetab = $codeetab;

        return $this;
    }

    /**
     * Get codeetab
     *
     * @return string 
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * Set codetypeetab
     *
     * @param string $codetypeetab
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setCodetypeetab($codetypeetab)
    {
        $this->codetypeetab = $codetypeetab;

        return $this;
    }

    /**
     * Get codetypeetab
     *
     * @return string 
     */
    public function getCodetypeetab()
    {
        return $this->codetypeetab;
    }

    /**
     * Set annescol
     *
     * @param integer $annescol
     * @return EffectiveeleveNiveauscolaireAnneenaissance
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
     * Set coderece
     *
     * @param string $coderece
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setCoderece($coderece)
    {
        $this->coderece = $coderece;

        return $this;
    }

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
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setNombelevmasc($nombelevmasc)
    {
        $this->nombelevmasc = $nombelevmasc;

        return $this;
    }

    /**
     * Get nombelevmasc
     *
     * @return integer 
     */
    public function getNombelevmasc()
    {
        return $this->nombelevmasc;
    }

    /**
     * Set nombelevfemi
     *
     * @param integer $nombelevfemi
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setNombelevfemi($nombelevfemi)
    {
        $this->nombelevfemi = $nombelevfemi;

        return $this;
    }

    /**
     * Get nombelevfemi
     *
     * @return integer 
     */
    public function getNombelevfemi()
    {
        return $this->nombelevfemi;
    }

    /**
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setNombtotaelev($nombtotaelev)
    {
        $this->nombtotaelev = $nombtotaelev;

        return $this;
    }

    /**
     * Get nombtotaelev
     *
     * @return integer 
     */
    public function getNombtotaelev()
    {
        return $this->nombtotaelev;
    }

    /**
     * Set codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setCodenivescol(\Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }

    /**
     * Set codeannenais
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance $codeannenais
     * @return EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function setCodeannenais(\Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance $codeannenais)
    {
        $this->codeannenais = $codeannenais;

        return $this;
    }

    /**
     * Get codeannenais
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance 
     */
    public function getCodeannenais()
    {
        return $this->codeannenais;
    }
}


