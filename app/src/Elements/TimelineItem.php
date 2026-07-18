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
 * @property ?string $Year
 * @property ?string $Headline
 * @property ?string $Text
 * @property int $SortOrder
 * @property int $ParentID
 * @method \App\Elements\TimelineElement Parent()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class TimelineItem extends DataObject
{

    private static $db = [
        "Year" => "Varchar(50)",
        "Headline" => "Varchar(255)",
        "Text" => "HTMLText",
        "SortOrder" => "Int",
    ];

    private static $has_one = [
        "Parent" => TimelineElement::class
    ];

    private static $field_labels = [
        "Year" => "Jahr",
        "Headline" => "Überschrift",
        "Text" => "Text"
    ];

    private static $default_sort = 'SortOrder ASC, ID ASC';

    private static $summary_fields = [
        'ID' => 'ID',
        'Year' => 'Jahr',
        'Headline' => 'Überschrift'
    ];

    private static $searchable_fields = [
        "Year",
        "Headline"
    ];

    private static $table_name = 'TimelineItem';
    private static $singular_name = "Zeitleisten-Eintrag";
    private static $plural_name = "Zeitleisten-Einträge";

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
