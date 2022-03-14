<?php
namespace App\Docs;

use SilverStripe\Admin\ModelAdmin;
/**
 * Class \App\Docs\DocsAdmin
 *
 */
class DocsCategoryAdmin extends ModelAdmin {

    private static $managed_models = array (
        DocsCategory::class,
    );

    private static $url_segment = "docs-category";

    private static $menu_title = "Docs Kategorien";

    private static $menu_icon_class = "font-icon-p-news-item";

    public function init() {
        parent::init();
    }

}
