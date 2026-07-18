<?php

namespace App\Docs;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use Page;
use SilverStripe\Forms\CheckboxField;

/**
 * Class \App\Docs\DocsHolder
 *
 * @property bool $VisibleToGuests
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class DocsOverview extends Page
{
    private static $table_name = 'DocsOverview';

    private static $db = [
        "VisibleToGuests" => "Boolean"
    ];

    private static $cms_icon = "app/client/icons/docsgray.svg";

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", new CheckboxField("VisibleToGuests", "Sichtbar für Gäste"));
        return $fields;
    }
}
