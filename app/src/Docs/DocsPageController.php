<?php
namespace App\Docs;

use PageController;

/**
 * Class \App\Docs\DocsPageController
 *
 * @property \App\Docs\DocsPage dataRecord
 * @method \App\Docs\DocsPage data()
 * @mixin \App\Docs\DocsPage dataRecord
 */
class DocsPageController extends PageController {

    private static $allowed_actions = array (
        "view"
    );

    public function getNews() {
        return Docs::get();
    }

    public function view() {
        $id = $this->getRequest()->param("ID");
        $article = Docs::get()->byId($id);
        return array(
            "Docs" => $article,
        );
    }
}
