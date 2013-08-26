<?php

namespace Aani\Entity;

/** 
 * @ORM\Entity
 * @ORM\Table(name="questions")
 */
class Question {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $title;
    
    /** @ORM\Column(type="string") */
    protected $question;
    
    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     */
    protected $answers;
    
    /** @ORM\Column(type="integer") */
    protected $threshold;
    
    public function exchangeArray($data)
    {
        $this->id        = (!empty($data['id'])) ? $data['id'] : null;
        $this->roomId    = (!empty($data['roomId'])) ? $data['roomId'] : null;
        $this->title     = (!empty($data['title'])) ? $data['title'] : null;
        $this->question  = (!empty($data['question'])) ? $data['question'] : null;
        $this->threshold = (!empty($data['threshold'])) ? $data['threshold'] : null;
    }
}
