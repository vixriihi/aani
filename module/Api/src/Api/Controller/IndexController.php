<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        return new JsonModel(
                array('Muro' => 'paketti')
        );
    }

    public function registerAction() {
        return new JsonModel(
                array('key' => uniqid())
        );
    }

}
