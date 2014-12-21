<?php
class UserController extends Zend_Controller_Action{
    public function indexAction(){
		setcookie('login','', time() - 3600, "/");

        /*$muser = new Model_User;
        echo "<pre>";
        print_r($muser->listall());
        echo "</pre>";
        */
    }
}