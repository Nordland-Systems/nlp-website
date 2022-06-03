<?php
namespace App\Docs;

use PageController;
use App\Attractions\Attraction;

/**
 * Class \App\Docs\DocsPageController
 *
 * @property \App\Docs\DocsOverview dataRecord
 * @method \App\Docs\DocsOverview data()
 * @mixin \App\Docs\DocsOverview dataRecord
 */
class DocsOverviewController extends PageController {

    private static $allowed_actions = [
        "view",
        "category",
    ];

    public function getDocs() {
        return Docs::get();
    }

    public function view() {
        $id = $this->getRequest()->param("ID");
        $article = Docs::get()->byId($id);
        return array(
            "Doc" => $article,
            "OtherDocs" => Docs::get()->exclude("ID", $id),
        );
    }

    public function category() {
        $id = $this->getRequest()->param("ID");
        $article = DocsCategory::get()->byId($id);
        return array(
            "DocCategory" => $article,
            "DocsInCategory" => Docs::get()->where("Categories", $article),
        );
    }
}
