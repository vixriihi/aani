<?php

namespace Aani\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VoiceController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
