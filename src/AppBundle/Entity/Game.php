<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="min_pc", type="bigint")
     */
    private $minPc;

    /**
     * @var int
     *
     * @ORM\Column(name="rec_pc", type="bigint")
     */
    private $recPc;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Game
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set minPc
     *
     * @param integer $minPc
     * @return Game
     */
    public function setMinPc($minPc)
    {
        $this->minPc = $minPc;

        return $this;
    }

    /**
     * Get minPc
     *
     * @return integer 
     */
    public function getMinPc()
    {
        return $this->minPc;
    }

    /**
     * Set recPc
     *
     * @param integer $recPc
     * @return Game
     */
    public function setRecPc($recPc)
    {
        $this->recPc = $recPc;

        return $this;
    }

    /**
     * Get recPc
     *
     * @return integer 
     */
    public function getRecPc()
    {
        return $this->recPc;
    }
}