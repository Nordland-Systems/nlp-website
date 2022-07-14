<?php
namespace App\Events;

use PageController;

/**
 * Class \App\Events\EventPageController
 *
 * @property \App\Events\EventPage dataRecord
 * @method \App\Events\EventPage data()
 * @mixin \App\Events\EventPage dataRecord
 */
class EventPageController extends PageController
{

    private static $allowed_actions = array (
        "view"
    );

    public function getEvents()
    {
        $today = date("Y-m-d");
        $events = Event::get()
            ->filter(array("StartDate:GreaterThanOrEqual" => $today))
            ->sort('StartDate ASC, StartTime ASC');
        return $events;
    }

    public function view()
    {
        $id = $this->getRequest()->param("ID");
        $article = Event::get()->byId($id);
        return array(
            "Event" => $article,
        );
    }
}
