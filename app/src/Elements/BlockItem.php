<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use SilverStripe\Assets\Image;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

/**
 * Class \App\Elements\TimelineItem
 *
 * @property ?string $Title
 * @property ?string $Text
 * @property int $SortOrder
 * @property int $ParentID
 * @property int $ImageID
 * @property int $LinkID
 * @method \App\Elements\BlocksElement Parent()
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Link()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class BlockItem extends DataObject
{

    private static $db = [
        "Title" => "Varchar(255)",
        "Text" => "Varchar(255)",
        "SortOrder" => "Int",
    ];

    private static $has_one = [
        "Parent" => BlocksElement::class,
        "Image" => Image::class,
        "Link" => Link::class,
    ];

    private static $owns = [
        "Image",
        "Link"
    ];

    private static $field_labels = [
        "Title" => "Titel",
        "Text" => "Text",
        "Image" => "Bild"
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

    private static $table_name = 'BlockItem';
    private static $singular_name = "Block";
    private static $plural_name = "Blöcke";

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main", "ParentID");
        $fields->removeFieldFromTab("Root.Main", "SortOrder");
        $fields->removeByName("LinkID");
        $fields->insertAfter('Text', LinkField::create('Link'));
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
