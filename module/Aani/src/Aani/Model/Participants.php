<?php
namespace Aani\Model;

class Participants {
    public $roomId;
    public $clientId;
    
    public function exchangeArray($data)
    {
        $this->roomId   = (!empty($data['roomId'])) ? $data['roomId'] : null;
        $this->clientId = (!empty($data['clientId'])) ? $data['clientId'] : null;
    }
    
}

