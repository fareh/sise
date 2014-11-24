<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureDisciplineniveauscolaire
 *
 * @ORM\Table(name="nomenclature_disciplineniveauscolaire", indexes={@ORM\Index(name="FK_Nomenclature_DisciplineNiveauScolaire_Nomenclature_Discipline", columns={"CodeDisci"})})
 * @ORM\Entity
 */
class NomenclatureDisciplineniveauscolaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeDisci", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codedisci;



    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return NomenclatureDisciplineniveauscolaire
     */
    public function setCodenivescol($codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return string 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }

    /**
     * Set codedisci
     *
     * @param string $codedisci
     * @return NomenclatureDisciplineniveauscolaire
     */
    public function setCodedisci($codedisci)
    {
        $this->codedisci = $codedisci;

        return $this;
    }

    /**
     * Get codedisci
     *
     * @return string 
     */
    public function getCodedisci()
    {
        return $this->codedisci;
    }
}
