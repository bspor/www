<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/13/2015
 * Time: 2:28 PM
 */


class Fish extends \Eloquent {

    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('weight', 'bear_id');

    // LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
    // since the plural of fish isnt what we named our database table we have to define it
    protected $table = 'fish';

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function bear() {
        return $this->belongsTo('Bear');
    }

}