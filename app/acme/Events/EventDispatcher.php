<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 3:04 PM
 */

namespace acme\Events;


use Illuminate\Events\Dispatcher;

class EventDispatcher {

    protected $event;

    function __construct(Dispatcher $event)
    {
        $this->event = $event;
    }


    public function dispatch(array $events) {
        foreach ($events as $event) {

            $eventName = $this->getEventName($event);
            $this->event->fire($eventName,$event);
        }


    }

    protected function getEventName($event) {
        return str_replace('\\', '.', get_class($event));
    }

}