<?php

namespace App\Docs;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\View\Parsers\URLSegmentFilter;

/**
 * Class \App\Elements\FaceItem
 *
 * @property string $Title
 * @property string $Content
 * @property int $SortOrder
 * @property bool $Vegan
 * @property bool $Vegetarian
 * @property bool $GlutenFree
 * @property bool $LactoseFree
 * @property bool $NutFree
 * @property bool $Halal
 * @property string $LinkTitle
 * @property int $HeaderImageID
 * @method \SilverStripe\Assets\Image HeaderImage()
 * @method \SilverStripe\ORM\ManyManyList|\App\Docs\DocsRestaurant[] Restaurants()
 */
class DocsRestaurantFood extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Content" => "HTMLText",
        "SortOrder" => "Int",
        "Vegan" => "Boolean",
        "Vegetarian" => "Boolean",
        "GlutenFree" => "Boolean",
        "LactoseFree" => "Boolean",
        "NutFree" => "Boolean",
        "Halal" => "Boolean",
        "LinkTitle" => "Varchar(255)",
    ];

    private static $has_one = [
        "HeaderImage" => Image::class,
    ];

    private static $owns = [
        "HeaderImage",
    ];

    private static $belongs_many_many = [
        "Restaurants" => DocsRestaurant::class
    ];

    private static $field_labels = [
        "Title" => "Titel",
        "Content" => "Beschreibung",
        "Vegan" => "Vegan",
        "Vegetarian" => "Vegetarisch",
        "GlutenFree" => "Glutenfrei",
        "LactoseFree" => "Laktosefrei",
        "NutFree" => "Nussfrei",
        "Halal" => "Halal",
        "Kosher" => "Koscher",
    ];

    private static $default_sort = 'SortOrder ASC, ID ASC';

    private static $summary_fields = [
        'CMSThumbnail' => 'Bild',
        'Title' => 'Titel',
        "FoodTags" => "Tags",
    ];

    private static $searchable_fields = [
        "Title",
        "Content",
    ];

    private static $table_name = "RestaurantFood";

    private static $singular_name = "Gericht";
    private static $plural_name = "Gerichte";


    // tidy up the CMS by not showing these fields
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main", "ParentID");
        $fields->removeFieldFromTab("Root.Main", "SortOrder");
        return $fields;
    }

    public function onBeforeWrite()
    {
        if ($this->LinkTitle == "") {
            $filter = URLSegmentFilter::create();
            $filteredTitle = $filter->filter($this->Title);
            $this->LinkTitle = $filteredTitle;
        }
        parent::onBeforeWrite();
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

    public function getFoodTags()
    {
        $tags = [];
        if ($this->Vegan) {
            $tags[] = "A";
        }
        if ($this->Vegetarian) {
            $tags[] = "V";
        }
        if ($this->GlutenFree) {
            $tags[] = "G";
        }
        if ($this->LactoseFree) {
            $tags[] = "L";
        }
        if ($this->NutFree) {
            $tags[] = "N";
        }
        if ($this->Halal) {
            $tags[] = "H";
        }
        if ($this->Kosher) {
            $tags[] = "K";
        }
        return implode(", ", $tags);
    }
}
