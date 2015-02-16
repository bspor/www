<?php namespace models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Laracasts\Presenter\PresentableTrait;

class User extends \Jacopo\Authentication\Models\User {

	use UserTrait, RemindableTrait;
    use PresentableTrait;
    protected $presenter = 'Laracasts\Presenter\UserPresenter';

    protected static $username = 'username';
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * @param User $user
     * @return bool
     */
    public function is($user) {

        if(is_null($user)) return false;
        return  $this->username == $user->username;
    }

    /**
     * Get the list of users that the current user follows.
     *
     * @return mixed
     */
    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }
    /**
     * Get the list of users who follow the current user.
     *
     * @return mixed
     */
    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }
    /**
     * Determine if current user follows another user.
     *
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');
        return in_array($this->id, $idsWhoOtherUserFollows);
    }

    public function statuses() {
        return $this->hasMany('controllers\commands\Status');

    }

    public function user() {
        return $this->belongsTo('controllers\commands\Status');
    }


    public function findUserByUsername($username)
    {
        return static::$username;
    }

    public function team () {
        return $this->belongsTo('team\Team', 'team_id', 'team_id');
    }


}
