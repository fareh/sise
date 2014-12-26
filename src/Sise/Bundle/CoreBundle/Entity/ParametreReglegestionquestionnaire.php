<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreReglegestionquestionnaire
 *
 * @ORM\Table(name="parametre_reglegestionquestionnaire", indexes={@ORM\Index(name="FK_Parametre_RegleGestionQuestionnaire_Nomenclature_Questionna81", columns={"CodeQues"})})
 * @ORM\Entity
 */
class ParametreReglegestionquestionnaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeReglGest", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codereglgest;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeQues", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeques;

    /**
     * @var integer
     *
     * @ORM\Column(name="Nume", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nume;

    /**
     * @var string
     *
     * @ORM\Column(name="DescRegl", type="string", length=250, nullable=true)
     */
    private $descregl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;

    /**
     * @var float
     *
     * @ORM\Column(name="ValeurComparaison", type="float", precision=10, scale=0, nullable=true)
     */
    private $valeurcomparaison;

    /**
     * @var string
     *
     * @ORM\Column(name="SqlComparaison", type="text", nullable=false)
     */
    private $sqlcomparaison;

    /**
     * @var string
     *
     * @ORM\Column(name="MessageErreur", type="text", nullable=true)
     */
    private $messageerreur;


    /**
     * Set codereglgest
     *
     * @param string $codereglgest
     * @return ParametreReglegestionquestionnaire
     */
    public function setCodereglgest($codereglgest)
    {
        $this->codereglgest = $codereglgest;

        return $this;
    }

    /**
     * Get codereglgest
     *
     * @return string
     */
    public function getCodereglgest()
    {
        return $this->codereglgest;
    }

    /**
     * Set codeques
     *
     * @param string $codeques
     * @return ParametreReglegestionquestionnaire
     */
    public function setCodeques($codeques)
    {
        $this->codeques = $codeques;

        return $this;
    }

    /**
     * Get codeques
     *
     * @return string
     */
    public function getCodeques()
    {
        return $this->codeques;
    }

    /**
     * Set nume
     *
     * @param integer $nume
     * @return ParametreReglegestionquestionnaire
     */
    public function setNume($nume)
    {
        $this->nume = $nume;

        return $this;
    }

    /**
     * Get nume
     *
     * @return integer
     */
    public function getNume()
    {
        return $this->nume;
    }

    /**
     * Set descregl
     *
     * @param string $descregl
     * @return ParametreReglegestionquestionnaire
     */
    public function setDescregl($descregl)
    {
        $this->descregl = $descregl;

        return $this;
    }

    /**
     * Get descregl
     *
     * @return string
     */
    public function getDescregl()
    {
        return $this->descregl;
    }

    /**
     * Set acti
     *
     * @param boolean $acti
     * @return ParametreReglegestionquestionnaire
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

    /**
     * Set valeurcomparaison
     *
     * @param float $valeurcomparaison
     * @return ParametreReglegestionquestionnaire
     */
    public function setValeurcomparaison($valeurcomparaison)
    {
        $this->valeurcomparaison = $valeurcomparaison;

        return $this;
    }

    /**
     * Get valeurcomparaison
     *
     * @return float
     */
    public function getValeurcomparaison()
    {
        return $this->valeurcomparaison;
    }

    /**
     * Set sqlcomparaison
     *
     * @param string $sqlcomparaison
     * @return ParametreReglegestionquestionnaire
     */
    public function setSqlcomparaison($sqlcomparaison)
    {
        $this->sqlcomparaison = $sqlcomparaison;

        return $this;
    }

    /**
     * Get sqlcomparaison
     *
     * @return string
     */
    public function getSqlcomparaison()
    {
        return $this->sqlcomparaison;
    }

    /**
     * Set messageerreur
     *
     * @param string $messageerreur
     * @return ParametreReglegestionquestionnaire
     */
    public function setMessageerreur($messageerreur)
    {
        $this->messageerreur = $messageerreur;

        return $this;
    }

    /**
     * Get messageerreur
     *
     * @return string
     */
    public function getMessageerreur()
    {
        return $this->messageerreur;
    }
}
