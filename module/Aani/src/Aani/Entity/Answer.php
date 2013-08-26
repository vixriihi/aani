<?php

namespace Aani\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="answers")
 */
class Answer {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
    
    /** @ORM\Column(type="integer") */
    protected $chosenBy;
    
    /** @ORM\Column(type="string") */
    protected $answer;
    
    /** @ORM\Column(type="boolean") */
    protected $correct;
    
    public function exchangeArray($data)
    {
        $this->id         = (!empty($data['id'])) ? $data['id'] : null;
        $this->questionId = (!empty($data['questionId'])) ? $data['questionId'] : null;
        $this->chosenBy   = (!empty($data['chosenBy'])) ? $data['chosenBy'] : null;
        $this->answer     = (!empty($data['answer'])) ? $data['answer'] : null;
        $this->correct    = (!empty($data['correct'])) ? $data['correct'] : null;
    }
}
