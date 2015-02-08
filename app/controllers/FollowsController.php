<?php


use controllers\commands\FollowUserCommand;
use controllers\commands\UnfollowUserCommand;


class FollowsController extends \BaseController {

    /**
     * Follow a user.
     *
     * @return Response
     */
    public function store()
    {
        $input = array_add(Input::get(), 'userId', Sentry::getUser()->getId());
        $this->execute(FollowUserCommand::class, $input);
        Flash::success('You are now following this user.');
        return Redirect::back();
    }
    /**
     * Unfollow a user.
     *
     * @param $userIdToUnfollow
     * @internal param int $id
     * @return Response
     */
    public function destroy($userIdToUnfollow)
    {
        $input = array_add(Input::get(), 'userId', Sentry::getUser()->getId());
        $this->execute(UnfollowUserCommand::class, $input);
        Flash::success('You have now unfollowed this user.');
        return Redirect::back();
    }


}
