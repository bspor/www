<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 11/5/2014
 * Time: 4:17 PM
 */

namespace team;


class Group extends eloquent{
    protected $fillable = array('group_id','group_name','group_id','div_id');
    //
    public function  group() {
        return $this->hasMany('Groupteams');
    }
} 