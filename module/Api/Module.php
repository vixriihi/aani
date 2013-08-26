<?php

namespace Api;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onDispatchError($e) {
        $error = $e->getError();
//        if (!$error) {
//            return;
//        }
//
//        $request = $e->getRequest();
//        $headers = $request->getHeaders();
//        if (!$headers->has('Accept')) {
//            return;
//        }
//
//        $accept = $headers->get('Accept');
//        if (!$accept->match('application/json')) {
//            return;
//        }

        $model = new JsonModel();
        
        $e->setResult($model);
        $e->stopPropagation();
        return $model;
    }

}
