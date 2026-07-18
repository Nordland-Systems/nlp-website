<?php
namespace App\News;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use Page;
use SilverStripe\Forms\TextField;

/**
 * Class \App\Docs\DocsPage
 *
 * @property ?string $YoutubeLink
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class NewsPage extends Page
{
    private static $db = [
        "YoutubeLink" => "Varchar(255)"
    ];

    private static $table_name = "App_News_NewsPage";

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Seiteneinstellungen", new TextField("YoutubeLink", "Youtube-Link (nur ID!)"));
        return $fields;
    }
}
