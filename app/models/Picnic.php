<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/13/2015
 * Time: 2:44 PM
 */




class Picnic extends Eloquent {

    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these attributes able to be filled
    protected $fillable = array('name', 'taste_level');
    // DEFINE RELATIONSHIPS --------------------------------------------------
    // define a many to many relationship
    // also call the linking table
    public function bears() {
        return $this->belongsToMany('Bear', 'bears_picnics', 'picnic_id', 'bear_id');
    }
}