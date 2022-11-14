<?php

namespace App\Docs;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use TractorCow\SliderField\SliderField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Events\Event
 *
 * @property string $Title
 * @property string $Type
 * @property string $Description
 * @property bool $VisibleToGuests
 * @property bool $VisibleToDreamteam
 * @property int $HeaderImageID
 * @property int $AreaID
 * @method \SilverStripe\Assets\Image HeaderImage()
 * @method \App\Docs\DocsArea Area()
 * @method \SilverStripe\ORM\ManyManyList|\App\Docs\DocsRestaurantFood[] RestaurantFoods()
 * @method \SilverStripe\ORM\ManyManyList|\App\Docs\DocsRestaurantDrink[] RestaurantDrinks()
 */
class DocsRestaurant extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Type" => "Enum('Stand, Imbiss, Restaurant, Dinnershow, Anderes', 'Stand')",
        "Description" => "HTMLText",
        "VisibleToGuests" => "Boolean",
        "VisibleToDreamteam" => "Boolean",
    ];

    private static $has_one = [
        "HeaderImage" => Image::class,
        "Area" => DocsArea::class,
    ];

    private static $many_many = [
        "RestaurantFoods" => DocsRestaurantFood::class,
        "RestaurantDrinks" => DocsRestaurantDrink::class,
    ];

    private static $owns = [
        "HeaderImage",
    ];

    private static $defaults = [
        "VisibleToGuests" => false,
        "VisibleToDreamteam" => true,
        "ThrillIntensity" => 5,
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
        "Type" => "Typ",
        "Description" => "Beschreibung",
        "Area" => "Themenbereich",
        "HeaderImage" => "Headerbild",
        "VisibleToGuests" => "Sichtbar für Gäste",
        "VisibleToDreamteam" => "Sichtbar für Dreamteam",
        "RestaurantFoods" => "Speisen",
        "RestaurantDrinks" => "Getränke",
    ];

    private static $summary_fields = [
        "CMSThumbnail" => "Bild",
        "Title" => "Titel",
        "Type" => "Typ",
        "Area.Title" => "Themenbereich",
        "VisibilitiesAsString" => "Sichtbar für",
    ];

    private static $searchable_fields = [
        "Title", "Type", "Description"
    ];

    private static $table_name = "Restaurant";

    private static $singular_name = "Restaurant";
    private static $plural_name = "Restaurants";

    public function Link()
    {
        $holder = DocsOverview::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("restaurant/") . $this->ID;
        }
    }

    // this function creates the thumbnail for the summary fields to use
    public function getCMSThumbnail()
    {
        if ($image = $this->HeaderImage()) {
            //return $image->CMSThumbnail();
            if ($image->exists()) {
                return $image->Fill(120, 80);
            } else {
                return "(kein Bild)";
            }
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("Locales");

        return $fields;
    }

    public function getFormattedName()
    {
        return str_replace(' ', '_', $this->Title);
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

    public function getTargetGroups()
    {
        return $this->AttractionTargetgroups();
    }

    public function getDrinks()
    {
        return $this->RestaurantDrinks();
    }

    public function getFoods()
    {
        return $this->RestaurantFoods();
    }
}
