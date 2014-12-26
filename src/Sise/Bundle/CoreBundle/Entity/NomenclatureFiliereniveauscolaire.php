<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureFiliereniveauscolaire
 *
 * @ORM\Table(name="nomenclature_filiereniveauscolaire", indexes={@ORM\Index(name="FK_Nomenclature_FiliereNiveauScolaire_Nomenclature_NiveauScola42", columns={"CodeNiveScol"})})
 * @ORM\Entity
 */
class NomenclatureFiliereniveauscolaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeFili", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefili;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescol;


    /**
     * Set codefili
     *
     * @param string $codefili
     * @return NomenclatureFiliereniveauscolaire
     */
    public function setCodefili($codefili)
    {
        $this->codefili = $codefili;

        return $this;
    }

    /**
     * Get codefili
     *
     * @return string
     */
    public function getCodefili()
    {
        return $this->codefili;
    }

    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return NomenclatureFiliereniveauscolaire
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
}
