<?php
namespace App\Attractions;

use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class AttractionAdmin extends ModelAdmin {

    private static $managed_models = array (
        Attraction::class,
    );

    private static $url_segment = "attractions";

    private static $menu_title = "Attractions";

    private static $menu_icon = "app/icons/coaster.svg";

    public function init() {
        parent::init();
    }

}
