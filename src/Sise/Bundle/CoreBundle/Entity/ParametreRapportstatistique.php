<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreRapportstatistique
 *
 * @ORM\Table(name="parametre_rapportstatistique")
 * @ORM\Entity
 */
class ParametreRapportstatistique
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRappStat", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coderappstat;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRappStatAr", type="string", length=250, nullable=true)
     */
    private $liberappstatar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRappStatFr", type="string", length=250, nullable=true)
     */
    private $liberappstatfr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCyclEnse", type="string", length=50, nullable=true)
     */
    private $codecyclense;

    /**
     * @var string
     *
     * @ORM\Column(name="SqlQuery", type="text", nullable=true)
     */
    private $sqlquery;

    /**
     * @var string
     *
     * @ORM\Column(name="TypeSQL", type="string", length=10, nullable=true)
     */
    private $typesql;

    /**
     * @var string
     *
     * @ORM\Column(name="XmlFile", type="string", length=250, nullable=true)
     */
    private $xmlfile;



    /**
     * Get coderappstat
     *
     * @return string 
     */
    public function getCoderappstat()
    {
        return $this->coderappstat;
    }

    /**
     * Set liberappstatar
     *
     * @param string $liberappstatar
     * @return ParametreRapportstatistique
     */
    public function setLiberappstatar($liberappstatar)
    {
        $this->liberappstatar = $liberappstatar;

        return $this;
    }

    /**
     * Get liberappstatar
     *
     * @return string 
     */
    public function getLiberappstatar()
    {
        return $this->liberappstatar;
    }

    /**
     * Set liberappstatfr
     *
     * @param string $liberappstatfr
     * @return ParametreRapportstatistique
     */
    public function setLiberappstatfr($liberappstatfr)
    {
        $this->liberappstatfr = $liberappstatfr;

        return $this;
    }

    /**
     * Get liberappstatfr
     *
     * @return string 
     */
    public function getLiberappstatfr()
    {
        return $this->liberappstatfr;
    }

    /**
     * Set codecyclense
     *
     * @param string $codecyclense
     * @return ParametreRapportstatistique
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

    /**
     * Set sqlquery
     *
     * @param string $sqlquery
     * @return ParametreRapportstatistique
     */
    public function setSqlquery($sqlquery)
    {
        $this->sqlquery = $sqlquery;

        return $this;
    }

    /**
     * Get sqlquery
     *
     * @return string 
     */
    public function getSqlquery()
    {
        return $this->sqlquery;
    }

    /**
     * Set typesql
     *
     * @param string $typesql
     * @return ParametreRapportstatistique
     */
    public function setTypesql($typesql)
    {
        $this->typesql = $typesql;

        return $this;
    }

    /**
     * Get typesql
     *
     * @return string 
     */
    public function getTypesql()
    {
        return $this->typesql;
    }

    /**
     * Set xmlfile
     *
     * @param string $xmlfile
     * @return ParametreRapportstatistique
     */
    public function setXmlfile($xmlfile)
    {
        $this->xmlfile = $xmlfile;

        return $this;
    }

    /**
     * Get xmlfile
     *
     * @return string 
     */
    public function getXmlfile()
    {
        return $this->xmlfile;
    }
}
