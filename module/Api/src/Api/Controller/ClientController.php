<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class ClientController extends AbstractActionController {

    public function registerAction() {
        return new JsonModel(
                array('key' => uniqid())
        );
    }

}
