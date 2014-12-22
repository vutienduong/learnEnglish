<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function _initAutoload(){
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array(
                                'module'     => 'error',
                                'controller' => 'error',
                                'action'     => 'error'
        )));
    }

    protected function _initDatabase(){
        $db = $this->getPluginResource('db')->getDbAdapter();
        Zend_Registry::set('db', $db);
        //test git
    }
} 