<?php

namespace App\Docs;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\SnapshotAdmin\SnapshotHistoryExtension;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Status
 * @property string $Description
 * @property bool $VisibleToGuests
 * @property bool $VisibleToDreamteam
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\ORM\ManyManyList|\App\Docs\DocsCategory[] Categories()
 * @mixin \TractorCow\Fluent\Extension\FluentExtension
 */
class Docs extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Status" => "Enum('ToDo, InProgress, Review, Live, NeedsRefreshing, Archived', 'ToDo')",
        "Description" => "HTMLText",
        "VisibleToGuests" => "Boolean",
        "VisibleToDreamteam" => "Boolean",
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $defaults = [
        "VisibleToGuests" => false,
        "VisibleToDreamteam" => true,
    ];

    private static $many_many = [
        "Categories" => DocsCategory::class
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Inhalt",
        "VisibleToGuests" => "Sichtbar für Gäste",
        "VisibleToDreamteam" => "Sichtbar für Dreamteam",
        "Categories" => "Kategorien",
        "Status" => "Status",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
        "Visible" => "Sichtbar",
        "Category" => "Kategorien"
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Docs";

    private static $singular_name = "Doc";
    private static $plural_name = "Docs";

    private static $url_segment = "docs";

    public function populateDefaults()
    {
        parent::populateDefaults();
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

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
        $holder = DocsOverview::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->ID;
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("Categories");
        $category_map = [];
        if ($categories = DocsCategory::get()) {
            $category_map = $categories->map();
        }
        $fields->addFieldToTab("Root.Main", new CheckboxSetField("Categories", "Kategorien", $category_map));
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = DocsAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }

    public function getFirstCategory()
    {
        return $this->Categories->first();
    }

    public function getFormattedName()
    {
        $original = $this->Title;
        $formatted = str_replace(" ", "_", $original);
        $formatted = str_replace("ä", "%ae", $formatted);
        $formatted = str_replace("ö", "%oe", $formatted);
        $formatted = str_replace("ü", "%ue", $formatted);
        return $formatted;
    }

    // Can be used to link to pdf in templates etc
    public function PDFLink()
    {
        return 'docs/view/' . $this->getFormattedName() . '/pdf';
    }
}
