<?php
namespace App\Attractions;

use PageController;

/**
 * Class \App\Events\EventPageController
 *
 * @property \App\Attractions\AttractionPage dataRecord
 * @method \App\Attractions\AttractionPage data()
 * @mixin \App\Attractions\AttractionPage dataRecord
 */
class AttractionPageController extends PageController {

    private static $allowed_actions = array (
        "view"
    );

    public function getEvents() {
        $today = date("Y-m-d");
        $attractions = Attraction::get()
            ->filter(array("StartDate:GreaterThanOrEqual" => $today))
            ->sort('StartDate ASC, StartTime ASC');
        return $attractions;
    }

    public function view() {
        $id = $this->getRequest()->param("ID");
        $article = Attraction::get()->byId($id);
        return array(
            "Attraction" => $article,
        );
    }
}
