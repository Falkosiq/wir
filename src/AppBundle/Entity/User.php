<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Pc;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="Pc")
     * @ORM\JoinColumn(name="pc_id", referencedColumnName="id")
     */
    private $pc;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    function getPc() {
        return $this->pc;
    }

    function setPc(Pc $pc) {
        $this->pc = $pc;
        return $this;
    }


}