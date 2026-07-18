<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Elements\TimelineItem
 *
 * @property ?string $Title
 * @property ?string $Text
 * @property int $SortOrder
 * @property int $ParentID
 * @method \App\Elements\FAQElement Parent()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class FAQItem extends DataObject
{

    private static $db = [
        "Title" => "Varchar(255)",
        "Text" => "HTMLText",
        "SortOrder" => "Int",
    ];

    private static $has_one = [
        "Parent" => FAQElement::class
    ];

    private static $field_labels = [
        "Title" => "Titel",
        "Text" => "Text"
    ];

    private static $translate = [
        'Title',
        'Text'
    ];

    private static $default_sort = 'SortOrder ASC, ID ASC';

    private static $summary_fields = [
        'Title' => 'Titel'
    ];

    private static $searchable_fields = [
        "Title",
        "Text"
    ];

    private static $table_name = 'FAQItem';
    private static $singular_name = "FAQ-Eintrag";
    private static $plural_name = "FAQ-Einträge";

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main", "ParentID");
        $fields->removeFieldFromTab("Root.Main", "SortOrder");
        return $fields;
    }

    #[Override]
    public function canView($member = null)
    {
        return true;
    }

    #[Override]
    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    #[Override]
    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    #[Override]
    public function canCreate($member = null, $context = [])
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }
}
