<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveNouveauhuitiemetechnique
 *
 * @ORM\Table(name="effectifeleve_nouveauhuitiemetechnique", indexes={@ORM\Index(name="FK_EffectifEleve_NouveauHuitiemeTechnique_Nomenclature_Recense40", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectifeleveNouveauhuitiemetechnique
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
     * @var integer
     *
     * @ORM\Column(name="NombElevMascVenaSept", type="integer", nullable=false)
     */
    private $nombelevmascvenasept;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiVenaSept", type="integer", nullable=true)
     */
    private $nombelevfemivenasept;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevVenaSept", type="integer", nullable=true)
     */
    private $nombtotaelevvenasept;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMascVenaHuit", type="integer", nullable=true)
     */
    private $nombelevmascvenahuit;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiVenaHuit", type="integer", nullable=true)
     */
    private $nombelevfemivenahuit;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevVenaHuit", type="integer", nullable=true)
     */
    private $nombtotaelevvenahuit;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectifeleveNouveauhuitiemetechnique
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
     * @return EffectifeleveNouveauhuitiemetechnique
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
     * @return EffectifeleveNouveauhuitiemetechnique
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
     * @return EffectifeleveNouveauhuitiemetechnique
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
     * Set nombelevmascvenasept
     *
     * @param integer $nombelevmascvenasept
     * @return EffectifeleveNouveauhuitiemetechnique
     */
    public function setNombelevmascvenasept($nombelevmascvenasept)
    {
        $this->nombelevmascvenasept = $nombelevmascvenasept;

        return $this;
    }

    /**
     * Get nombelevmascvenasept
     *
     * @return integer 
     */
    public function getNombelevmascvenasept()
    {
        return $this->nombelevmascvenasept;
    }

    /**
     * Set nombelevfemivenasept
     *
     * @param integer $nombelevfemivenasept
     * @return EffectifeleveNouveauhuitiemetechnique
     */
    public function setNombelevfemivenasept($nombelevfemivenasept)
    {
        $this->nombelevfemivenasept = $nombelevfemivenasept;

        return $this;
    }

    /**
     * Get nombelevfemivenasept
     *
     * @return integer 
     */
    public function getNombelevfemivenasept()
    {
        return $this->nombelevfemivenasept;
    }

    /**
     * Set nombtotaelevvenasept
     *
     * @param integer $nombtotaelevvenasept
     * @return EffectifeleveNouveauhuitiemetechnique
     */
    public function setNombtotaelevvenasept($nombtotaelevvenasept)
    {
        $this->nombtotaelevvenasept = $nombtotaelevvenasept;

        return $this;
    }

    /**
     * Get nombtotaelevvenasept
     *
     * @return integer 
     */
    public function getNombtotaelevvenasept()
    {
        return $this->nombtotaelevvenasept;
    }

    /**
     * Set nombelevmascvenahuit
     *
     * @param integer $nombelevmascvenahuit
     * @return EffectifeleveNouveauhuitiemetechnique
     */
    public function setNombelevmascvenahuit($nombelevmascvenahuit)
    {
        $this->nombelevmascvenahuit = $nombelevmascvenahuit;

        return $this;
    }



    /**
     * Get nombelevmascvenahuit
     *
     * @return integer 
     */
    public function getNombelevmascvenahuit()
    {
        return $this->nombelevmascvenahuit;
    }

    /**
     * Set nombelevfemivenahuit
     *
     * @param integer $nombelevfemivenahuit
     * @return EffectifeleveNouveauhuitiemetechnique
     */
    public function setNombelevfemivenahuit($nombelevfemivenahuit)
    {
        $this->nombelevfemivenahuit = $nombelevfemivenahuit;

        return $this;
    }

    /**
     * Get nombelevfemivenahuit
     *
     * @return integer 
     */
    public function getNombelevfemivenahuit()
    {
        return $this->nombelevfemivenahuit;
    }

    /**
     * Set nombtotaelevvenahuit
     *
     * @param integer $nombtotaelevvenahuit
     * @return EffectifeleveNouveauhuitiemetechnique
     */
    public function setNombtotaelevvenahuit($nombtotaelevvenahuit)
    {
        $this->nombtotaelevvenahuit = $nombtotaelevvenahuit;

        return $this;
    }

    /**
     * Get nombtotaelevvenahuit
     *
     * @return integer 
     */
    public function getNombtotaelevvenahuit()
    {
        return $this->nombtotaelevvenahuit;
    }
}
