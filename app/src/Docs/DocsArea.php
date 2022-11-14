<?php

namespace App\Docs;

use App\Docs\DocsAttraction;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

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
class DocsArea extends DataObject
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
        "VisibleToGuests" => false,
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
        "CMSThumbnail" => "Bild",
        "Title" => "Titel",
        "VisibilitiesAsString" => "Sichtbar für",
        "AttractionCount" => "Attraktionen",
        "RestaurantCount" => "Restaurants",
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "DocsArea";

    private static $singular_name = "Themenbereich";
    private static $plural_name = "Themenbereiche";

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

    public function VisibilitiesAsString()
    {
        $visibilities = [];
        if ($this->VisibleToGuests) {
            $visibilities[] = "Gäste";
        }
        if ($this->VisibleToDreamteam) {
            $visibilities[] = "Dreamteam";
        }
        return implode(", ", $visibilities);
    }

    public function AttractionCount()
    {
        return DocsAttraction::get()->filter("AreaID", $this->ID)->count();
    }

    public function RestaurantCount()
    {
        return DocsRestaurant::get()->filter("AreaID", $this->ID)->count();
    }

    public function Link()
    {
        $holder = DocsOverview::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("area/") . $this->FormattedName;
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }

    // this function creates the thumbnail for the summary fields to use
    public function getCMSThumbnail()
    {
        if ($image = $this->Image()) {
            //return $image->CMSThumbnail();
            if ($image->exists()) {
                return $image->Fill(120, 80);
            } else {
                return "(kein Bild)";
            }
        }
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

    public function getAllAttractions()
    {
        return DocsAttraction::get()->filter(["AreaID" => $this->ID]);
    }

    public function getAllRestaurants()
    {
        return DocsRestaurant::get()->filter(["AreaID" => $this->ID]);
    }
}
