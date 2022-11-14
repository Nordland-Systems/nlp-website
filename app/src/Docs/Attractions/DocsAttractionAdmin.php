<?php
namespace App\Docs;

use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Docs\DocsAdmin
 *
 */
class DocsAttractionAdmin extends ModelAdmin
{

    private static $managed_models = array (
        DocsAttraction::class,
        DocsArea::class,
        DocsTargetgroup::class,
    );

    private static $url_segment = "attractiondocs";

    private static $menu_title = "Docs Attraktionen";

    private static $menu_icon = "app/client/icons/docsattractions.svg";

    public function init()
    {
        parent::init();
    }
}
