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
     * @var integer
     *
     * @ORM\Column(name="CodeParam", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeparam;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeQues", type="string", length=50, nullable=false)
     */
    private $codeques;


    /**
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;


    /**
     * @var float
     *
     * @ORM\Column(name="ValeurMin", type="float", precision=10, scale=0, nullable=true)
     */
    private $valeurmin;

    /**
     * @var float
     *
     * @ORM\Column(name="ValeurMax", type="float", precision=10, scale=0, nullable=true)
     */
    private $valeurmax;


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
     * @var string
     *
     * @ORM\Column(name="MessageErreurFr", type="text", nullable=true)
     */
    private $messageerreurfr;

    /**
     * @var string
     *
     * @ORM\Column(name="DescRegl", type="string", length=250, nullable=true)
     */
    private $descregl;

    /**
     * Get codeparam
     *
     * @return integer 
     */
    public function getCodeparam()
    {
        return $this->codeparam;
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
     * Set valeurmin
     *
     * @param float $valeurmin
     * @return ParametreReglegestionquestionnaire
     */
    public function setValeurmin($valeurmin)
    {
        $this->valeurmin = $valeurmin;

        return $this;
    }

    /**
     * Get valeurmin
     *
     * @return float 
     */
    public function getValeurmin()
    {
        return $this->valeurmin;
    }

    /**
     * Set valeurmax
     *
     * @param float $valeurmax
     * @return ParametreReglegestionquestionnaire
     */
    public function setValeurmax($valeurmax)
    {
        $this->valeurmax = $valeurmax;

        return $this;
    }

    /**
     * Get valeurmax
     *
     * @return float 
     */
    public function getValeurmax()
    {
        return $this->valeurmax;
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

    /**
     * Set messageerreurfr
     *
     * @param string $messageerreurfr
     * @return ParametreReglegestionquestionnaire
     */
    public function setMessageerreurfr($messageerreurfr)
    {
        $this->messageerreurfr = $messageerreurfr;

        return $this;
    }

    /**
     * Get messageerreurfr
     *
     * @return string 
     */
    public function getMessageerreurfr()
    {
        return $this->messageerreurfr;
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
}
