<?php

namespace App\News;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use TractorCow\Fluent\Extension\FluentExtension;
use App\News\NewsPage;
use App\Events\EventAdmin;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\View\Parsers\URLSegmentFilter;

/**
 * Class \App\Docs\Docs
 *
 * @property ?string $Title
 * @property ?string $Date
 * @property ?string $Summary
 * @property ?string $Description
 * @property ?string $ImageDescription
 * @property bool $Visible
 * @property ?string $LinkTitle
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 * @mixin \TractorCow\Fluent\Extension\FluentExtension
 */
class News extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Date" => "Datetime",
        "Summary" => "Varchar(255)",
        "Description" => "HTMLText",
        "ImageDescription" => "Varchar(255)",
        "Visible" => "Boolean",
        "LinkTitle" => "Varchar(255)"
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $defaults = [
        "Visible" => true,
    ];

    private static $default_sort = "Date DESC";

    private static $field_labels = [
        "Title" => "Titel",
        "Date" => "Datum",
        "Summary" => "Vorschautext",
        "Description" => "Inhalt",
        "Visible" => "Sichtbar",
        "Category" => "Kategorie"
    ];

    private static $summary_fields = [
        "ID" => "ID",
        "Title" => "Titel",
        "Summary" => "Kurzfassung",
        "Date" => "Datum",
        "Visible" => "Sichtbar"
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "News";

    private static $singular_name = "News";
    private static $plural_name = "News";

    private static $url_segment = "news";

    #[Override]
    public function populateDefaults()
    {
        $this->Date = date('Y-m-d H:00:00');
        parent::populateDefaults();
    }

    public function FormattedDate()
    {
        $date = $this->dbObject('Date');
        if ($date) {
            return $date->Format("dd.MM.yyyy");
        }
    }

    #[Override]
    public function onBeforeWrite()
    {
        if ($this->LinkTitle == "") {
            $date = $this->dbObject('Date');
            if ($date) {
                $date = $date->Format("dd-MM-yyyy");
            }

            $filter = URLSegmentFilter::create();
            $filteredTitle = $filter->filter($this->Title);

            $this->LinkTitle = $date . "-" . $filteredTitle;
        }
        parent::onBeforeWrite();
    }

    #[Override]
    protected function onAfterWrite()
    {
        parent::onAfterWrite();
        $image = $this->Image();
        if ($image->exists()) {
            $image->publishRecursive();
        }
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

    //Needed to use ElementalArea in template
    public function CanArchive($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function Link()
    {
        $holder = NewsPage::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->ID;
        }
    }

    // this function creates the thumnail for the summary fields to use
    public function getCMSThumbnail()
    {
        if ($image = $this->Image()) {
            return $image->CMSThumbnail();
        }
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    #[Override]
    public function CMSEditLink()
    {
        $admin = EventAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }
}
