<?php
namespace App\Docs;

use Override;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class \App\Docs\DocsAdmin
 *
 */
class DocsAdmin extends ModelAdmin
{

    private static $managed_models =  [
        Docs::class,
        DocsCategory::class,
        DocsCharacter::class,
    ];

    private static $url_segment = "docs";

    private static $menu_title = "Docs Allgemein";

    private static $menu_icon = "app/client/icons/docs.svg";

    #[Override]
    public function init()
    {
        parent::init();
    }
}
