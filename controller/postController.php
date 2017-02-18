<?php


/**
 * Class postController
 * Provide functions which required by post view
 */
class postController
{

    public function __construct()
    {

        echo 'postController loaded !<br/>';

    }

    public function listAll(){

        echo 'listAll function in postController called !<br/>';

    }

    public function listById($id){

        echo 'This is article n°'.$id;

    }

}