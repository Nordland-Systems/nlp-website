<?php

namespace App\Team;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use Page;
use SilverStripe\Assets\Image;

use SilverStripe\AssetAdmin\Forms\UploadField;

/**
 * Class \App\Team\TeamOverview
 *
 * @property int $HeaderImageID
 * @method \SilverStripe\Assets\Image HeaderImage()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
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

    private static $cms_icon = "app/client/icons/teamgray.svg";

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", new UploadField("HeaderImage", "Headerbild"));
        return $fields;
    }
}
