<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 11/5/2014
 * Time: 4:13 PM
 */

namespace team;


class Division extends \Eloquent {
    protected $table = 'division';
    protected $fillable = array('div_id','name');

    public function teams() {
        return $this->hasMany('models\Team', 'team_id', 'div_id');
    }
} 