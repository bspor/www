<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 11/5/2014
 * Time: 3:58 PM
 */

namespace team;


class Team extends eloquent {
    protected $fillable = array('team_name', 'logo', 'wins', 'losses','points','team_id','div_id');

    // each team has many players
    public function players() {
        return $this->hasMany('Player');
    }


} 