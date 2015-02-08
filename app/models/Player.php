<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 11/5/2014
 * Time: 4:05 PM
 */

namespace models;


class Player extends eloquent {
    protected $fillable = array('user_id','team_id','game_id');

    //one player belongs to
    public function  teams() {
        return $this->belongsToMany('Team','User','team_id','user_id');
    }

} 