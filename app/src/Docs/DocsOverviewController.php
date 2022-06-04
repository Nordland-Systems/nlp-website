<?php
namespace App\Docs;

use PageController;

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
        "attraction",
    ];

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
            "Category" => $article,
        );
    }

    public function attraction() {
        $id = $this->getRequest()->param("ID");
        $article = DocsAttraction::get()->byId($id);
        return array(
            "Attraction" => $article,
        );
    }

    public function getDocsCategories()
    {
        return DocsCategory::get()->sort('Title', 'ASC');
    }

    public function getAttractions() {
        return DocsAttraction::get();
    }

    public function getDocs() {
        return Docs::get();
    }

    public function getCategory() {
        $id = $this->getRequest()->param("ID");
        $article = DocsCategory::get()->byId($id);
        return array(
            "DocCategory" => $article,
            "DocsInCategory" => Docs::get()->where("Categories", $article),
        );
    }
}
