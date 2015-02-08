<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/16/2015
 * Time: 1:43 PM
 */
namespace controllers\commands;
use Laracasts\Commander\Events\EventGenerator;
use StatusWasPublished;

class Status extends \Eloquent {

    use EventGenerator;
    protected $fillable = ['body'];


    public function user()
    {
        //This is where our user resides at all times.
        //return $this->belongsTo('Cartalyst\Sentry\Users\Eloquent\User');
        return $this->belongsTo('models\User');
    }

    public static function publish($body)
    {
        $status = new static(compact('body'));
        $status->raise(new StatusWasPublished($body));
        return $status;
    }

}