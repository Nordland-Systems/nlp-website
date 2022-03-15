<?php
namespace App\Docs;

use SilverStripe\Admin\ModelAdmin;
/**
 * Class \App\Docs\DocsAdmin
 *
 */
class DocAdmin extends ModelAdmin {

    private static $managed_models = array (
        Docs::class,
    );

    private static $url_segment = "docs";

    private static $menu_title = "Docs";

    private static $menu_icon_class = "font-icon-p-news-item";

    public function init() {
        parent::init();
    }

}
