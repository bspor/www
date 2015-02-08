<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 11/5/2014
 * Time: 4:15 PM
 */

namespace team;


class Groupteams extends eloquent{
    protected $fillable = array('group_id','team_id');


    //
    public function  group() {
        return $this->belongsTo('Division');
    }
} 