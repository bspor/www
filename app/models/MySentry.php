<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 2/9/2015
 * Time: 11:00 AM
 */

namespace models;


use Cartalyst\Sentry\Sentry;

class MySentry extends Sentry {
    /**
     * Finds a user by the login value.
     *
     * @param  string  $login
     * @return \Cartalyst\Sentry\Users\UserInterface
     * @throws \Cartalyst\Sentry\Users\UserNotFoundException
     */
    public function findUserByUsername($login)
    {
        return $this->userProvider->findByUsername($login);
    }
}