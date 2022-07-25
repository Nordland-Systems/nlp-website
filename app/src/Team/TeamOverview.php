<?php

namespace App\Team;

use Page;
use SilverStripe\Assets\Image;

use SilverStripe\AssetAdmin\Forms\UploadField;

/**
 * Class \App\Team\TeamOverview
 *
 * @property int $HeaderImageID
 * @method \SilverStripe\Assets\Image HeaderImage()
 */
class TeamOverview extends Page
{
    private static $table_name = 'TeamOverview';

    private static $has_one = [
        "HeaderImage" => Image::class,
    ];

    private static $owns = [
        "HeaderImage"
    ];

    private static $icon = "app/client/icons/team.svg";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", new UploadField("HeaderImage", "Headerbild"));
        return $fields;
    }
}
