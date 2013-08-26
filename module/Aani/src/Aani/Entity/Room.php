<?php

namespace Aani\Entity;

/** 
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 */
class Room {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;
    
    /** @ORM\Column(type="string") */
    public $key;
    
    /** @ORM\Column(type="string") */
    public $user;
    
    /** @ORM\Column(type="string") */
    public $name;
    
    public function exchangeArray($data)
    {
        $this->id    = (!empty($data['id'])) ? $data['id'] : null;
        $this->key   = (!empty($data['key'])) ? $data['key'] : null;
        $this->user  = (!empty($data['user'])) ? $data['user'] : null;
        $this->name  = (!empty($data['name'])) ? $data['name'] : null;
    }
}
