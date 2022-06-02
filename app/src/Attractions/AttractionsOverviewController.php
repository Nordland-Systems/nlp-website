<?php
namespace App\Attractions;

use PageController;

/**
 * Class \App\Docs\DocsPageController
 *
 * @property \App\Attractions\AttractionsOverview dataRecord
 * @method \App\Attractions\AttractionsOverview data()
 * @mixin \App\Attractions\AttractionsOverview
 */
class AttractionsOverviewController extends PageController {

    private static $allowed_actions = [
        "view",
    ];

    public function getAttractions() {
        return Attraction::get();
    }

    public function view() {
        $id = $this->getRequest()->param("ID");
        $article = Attraction::get()->byId($id);
        return array(
            "Attraction" => $article,
        );
    }
}
