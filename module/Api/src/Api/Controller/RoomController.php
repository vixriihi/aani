<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class RoomController extends AbstractActionController {

    public function indexAction() {
        $view = new JsonModel();
        if (!$this->getRequest()->isPost()) {
             $view->result = 'fail';
             $view->message = 'Request wasn\'t post';
             return $view;
        }
        $view->name = 'Logiikka 1';
        $view->result = 'success';
        return $view;
    }
    
    public function answerAction() {
        $view = new JsonModel();
        if (!$this->getRequest()->isPost()) {
             $view->result = 'fail';
             $view->message = 'Request wasn\'t post';
             return $view;
        }
        $view->result = 'success';
        return $view;
    }
    
    public function questionAction() {
        $question = array(
            'id' => 2,
            'title' => 'Question title',
            'question' => 'question is here and should be containin all that',
            'answers' => array(
                array(
                    'id' => 1,
                    'answer' => 'Vastaus vaihtoehto 1',
                ),
                array(
                    'id' => 2,
                    'answer' => 'Vastaus vaihtoehto 2',
                ),
                array(
                    'id' => 3,
                    'answer' => 'Vastaus vaihtoehto 3',
                )
            )   
        );
        return new JsonModel($question);
    }

}
