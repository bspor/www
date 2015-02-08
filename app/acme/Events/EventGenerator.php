<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 1/19/2015
 * Time: 2:51 PM
 */

namespace acme\Events;


trait EventGenerator {

    protected $pendingEvents = [];

    /**
     * @param $event
     */
    public function raise($event) {
        $this->pendingEvents[] = $event;
    }

    /**
     * @return array
     */
    public function releaseEvents() {
        $events = $this->pendingEvents;
        $this->pendingEvents = [];

        return $events;
    }
}