<?php
namespace App\Docs;

use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Docs\DocsAdmin
 *
 */
class DocsFoodAdmin extends ModelAdmin
{

    private static $managed_models = array (
        DocsRestaurant::class,
        DocsRestaurantFood::class,
        DocsRestaurantDrink::class,
    );

    private static $url_segment = "docsfood";

    private static $menu_title = "Docs Restaurants";

    private static $menu_icon = "app/client/icons/docs.svg";

    public function init()
    {
        parent::init();
    }
}
