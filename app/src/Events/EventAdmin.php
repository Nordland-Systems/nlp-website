<?php
namespace App\Events;

use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class EventAdmin extends ModelAdmin {

    private static $managed_models = array (
        Event::class,
    );

    private static $url_segment = "events";

    private static $menu_title = "Events";

    private static $menu_icon_class = "font-icon-p-event-alt";

    public function init() {
        parent::init();
    }

}
