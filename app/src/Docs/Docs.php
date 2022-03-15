<?php

namespace App\Docs;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Security\Permission;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Description
 * @property boolean $Visible
 * @method \SilverStripe\ORM\ManyManyList|\App\Docs\DocsCategory[] Categories()
 */
class Docs extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
        "Visible" => "Boolean"
    ];

    private static $defaults = [
        "Visible" => true,
    ];

    private static $many_many = [
        "Categories" => DocsCategory::class
    ];

    private static $default_sort = "Title DESC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Kurzbeschreibung",
        "Visible" => "Sichtbar für Gäste",
        "Category" => "Kategorie"
    ];

    private static $summary_fields = [
        "Title" => "Titel",
        "Visible" => "Sichtbar"
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Docs";

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
    public function CanArchive($member=null) {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function Link()
    {
        $holder = DocsHolder::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->ID;
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("Categories");
        $category_map = [];
        if($categories = DocsCategory::get())
            $category_map = $categories->map();
        $fields->addFieldToTab("Root.Main", new CheckboxSetField("Categories", "Kategorien", $category_map));
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = DocsAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }
}
