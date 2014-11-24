<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureBassinpedagogiqueetablissement
 *
 * @ORM\Table(name="nomenclature_bassinpedagogiqueetablissement", indexes={@ORM\Index(name="FK_Nomenclature_BassinPedagogiqueEtablissement_Nomenclature_Ba13", columns={"CodeBassPeda"})})
 * @ORM\Entity
 */
class NomenclatureBassinpedagogiqueetablissement
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
     * @var string
     *
     * @ORM\Column(name="CodeBassPeda", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codebasspeda;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return NomenclatureBassinpedagogiqueetablissement
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
     * @return NomenclatureBassinpedagogiqueetablissement
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
     * Set codebasspeda
     *
     * @param string $codebasspeda
     * @return NomenclatureBassinpedagogiqueetablissement
     */
    public function setCodebasspeda($codebasspeda)
    {
        $this->codebasspeda = $codebasspeda;

        return $this;
    }

    /**
     * Get codebasspeda
     *
     * @return string 
     */
    public function getCodebasspeda()
    {
        return $this->codebasspeda;
    }
}
