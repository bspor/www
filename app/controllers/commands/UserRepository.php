<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/20/2015
 * Time: 12:58 PM
 */

namespace controllers\commands;






use models\User;
use Sentry;


class UserRepository {
    /**
     * Get a list of all users
     * @param int $howMany
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($howMany=25) {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * @param $username
     * @return mixed
     */
    public function findByUserName($username) {

        //$test = Sentry::findUserByUsername($username);
        $user = User::whereUsername($username)->first();
        return $user;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function findById($id) {

        //$test = Sentry::findUserByUsername($username);
        $user = Sentry::findUserById($id);
        return $user;
    }

    /**
     * Follow a Larabook user.
     *
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->followedUsers()->attach($userIdToFollow);
    }
    /**
     * Unfollow a Larabook user.
     *
     * @param $userIdToUnfollow
     * @param User $user
     * @return mixed
     */
    public function unfollow($userIdToUnfollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }
}