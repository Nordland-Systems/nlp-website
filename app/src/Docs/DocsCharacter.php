<?php

namespace App\Docs;

use SilverStripe\Security\Permission;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Description
 * @property bool $VisibleToGuests
 * @property bool $VisibleToDreamteam
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class DocsCharacter extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
        "VisibleToGuests" => "Boolean",
        "VisibleToDreamteam" => "Boolean"
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $defaults = [
        "VisibleToGuests" => true,
        "VisibleToDreamteam" => true,
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Kurzbeschreibung",
        "VisibleToGuests" => "Sichtbar für Gäste",
        "VisibleToDreamteam" => "Sichtbar für Dreamteam",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
        "Visible" => "Sichtbar"
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "DocsCharacter";

    private static $singular_name = "Charakter";
    private static $plural_name = "Charaktere";

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
            return $holder->Link("character/") . $this->FormattedName;
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = DocsAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }

    public function getFormattedName()
    {
        return str_replace(' ', '_', $this->Title);
    }
}
