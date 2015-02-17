<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 11/5/2014
 * Time: 3:58 PM
 */

namespace team;
use Jacopo\Authentication\Models\User;
use models\Player;

class Team extends  \Eloquent {
    protected $fillable = array('team_name', 'logo', 'wins', 'losses','points','team_id','div_id');

    // each team has many players
    public function players() {
        return $this->hasMany('models\User', 'team_id','team_id');
    }

    public function division() {
        return $this->belongsTo('team\Division', 'team_id', 'div_id');
    }

    public function getTeamName($id) {
        return $this->team_name;
    }
} 