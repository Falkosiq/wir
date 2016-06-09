<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Cpu;

/**
 * Pc
 *
 * @ORM\Table(name="pc")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PcRepository")
 */
class Pc
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
     * @ORM\ManyToOne(targetEntity="Cpu")
     * @ORM\JoinColumn(name="cpu_id", referencedColumnName="id")
     */
    private $cpu;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Gpu")
     */
    private $gpu;

    /**
     * @var int
     *
     * @ORM\Column(name="ram", type="integer")
     * @ORM\JoinColumn(name="gpu_id", referencedColumnName="id")
     */
    private $ram;

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
     * Set cpu
     *
     * @param integer $cpu
     * @return Pc
     */
    public function setCpu(Cpu $cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return integer 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set gpu
     *
     * @param integer $gpu
     * @return Pc
     */
    public function setGpu($gpu)
    {
        $this->gpu = $gpu;

        return $this;
    }

    /**
     * Get gpu
     *
     * @return integer 
     */
    public function getGpu()
    {
        return $this->gpu;
    }

    /**
     * Set ram
     *
     * @param integer $ram
     * @return Pc
     */
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get ram
     *
     * @return integer 
     */
    public function getRam()
    {
        return $this->ram;
    }
}
