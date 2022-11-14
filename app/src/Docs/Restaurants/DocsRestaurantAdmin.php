<?php
namespace App\Docs;

use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Docs\DocsAdmin
 *
 */
class DocsRestaurantAdmin extends ModelAdmin
{

    private static $managed_models = array (
        DocsRestaurant::class,
        DocsRestaurantFood::class,
        DocsRestaurantDrink::class,
    );

    private static $url_segment = "restaurantdocs";

    private static $menu_title = "Docs Restaurants";

    private static $menu_icon = "app/client/icons/docsrestaurants.svg";

    public function init()
    {
        parent::init();
    }
}
