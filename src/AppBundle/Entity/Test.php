<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestRepository")
 */
class Test
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
     * @var int
     *
     * @ORM\Column(name="game", type="bigint")
     */
    private $game;

    /**
     * @var int
     *
     * @ORM\Column(name="pc", type="bigint")
     */
    private $pc;

    /**
     * @var int
     *
     * @ORM\Column(name="min_fps", type="integer")
     */
    private $minFps;

    /**
     * @var int
     *
     * @ORM\Column(name="avg_fps", type="integer")
     */
    private $avgFps;

    /**
     * @var int
     *
     * @ORM\Column(name="max_fps", type="integer")
     */
    private $maxFps;

    /**
     * @var string
     *
     * @ORM\Column(name="settings", type="string", length=255)
     */
    private $settings;


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
     * Set game
     *
     * @param integer $game
     * @return Test
     */
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return integer 
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set pc
     *
     * @param integer $pc
     * @return Test
     */
    public function setPc($pc)
    {
        $this->pc = $pc;

        return $this;
    }

    /**
     * Get pc
     *
     * @return integer 
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * Set minFps
     *
     * @param integer $minFps
     * @return Test
     */
    public function setMinFps($minFps)
    {
        $this->minFps = $minFps;

        return $this;
    }

    /**
     * Get minFps
     *
     * @return integer 
     */
    public function getMinFps()
    {
        return $this->minFps;
    }

    /**
     * Set avgFps
     *
     * @param integer $avgFps
     * @return Test
     */
    public function setAvgFps($avgFps)
    {
        $this->avgFps = $avgFps;

        return $this;
    }

    /**
     * Get avgFps
     *
     * @return integer 
     */
    public function getAvgFps()
    {
        return $this->avgFps;
    }

    /**
     * Set maxFps
     *
     * @param integer $maxFps
     * @return Test
     */
    public function setMaxFps($maxFps)
    {
        $this->maxFps = $maxFps;

        return $this;
    }

    /**
     * Get maxFps
     *
     * @return integer 
     */
    public function getMaxFps()
    {
        return $this->maxFps;
    }

    /**
     * Set settings
     *
     * @param string $settings
     * @return Test
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get settings
     *
     * @return string 
     */
    public function getSettings()
    {
        return $this->settings;
    }
}
