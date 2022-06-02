<?php
namespace App\News;

use SilverStripe\Admin\ModelAdmin;
/**
 * Class \App\Docs\DocsAdmin
 *
 */
class NewsAdmin extends ModelAdmin {

    private static $managed_models = array (
        News::class,
    );

    private static $url_segment = "news";

    private static $menu_title = "Neuigkeiten";

    private static $menu_icon_class = "font-icon-p-news-item";

    public function init() {
        parent::init();
    }

}
