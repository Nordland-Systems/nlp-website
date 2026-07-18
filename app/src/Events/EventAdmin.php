<?php
namespace App\Events;

use Override;
use App\News\News;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Events\EventAdmin
 *
 */
class EventAdmin extends ModelAdmin
{

    private static $managed_models =  [
        Event::class,
        News::class,
    ];

    private static $url_segment = "events";

    private static $menu_title = "Aktuelles";

    private static $menu_icon = "app/client/icons/aktuelles.svg";

    #[Override]
    public function init()
    {
        parent::init();
    }
}
