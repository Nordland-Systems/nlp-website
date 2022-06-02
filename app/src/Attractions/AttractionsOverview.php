<?php

namespace App\Attractions;
use Page;

use SilverStripe\Assets\Image;
use SilverStripe\Security\Permission;
use SilverStripe\AssetAdmin\Forms\UploadField;

/**
 * Class \App\Docs\DocsHolder
 *
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class AttractionsOverview extends Page
{
    private static $table_name = 'AttractionsOverview';

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $icon = "app/client/icons/coaster.svg";


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", new UploadField("Image", "Headerbild"));
        return $fields;
    }

    public function canView($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }
}
