<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 2/9/2015
 * Time: 8:35 AM
 */

namespace models\interfaces;


interface UserInterface extends \Cartalyst\Sentry\Users\UserInterface{
    public  function statuses();

    public  function user();

    public function findUserByUsername($username);

    public  function present();
}