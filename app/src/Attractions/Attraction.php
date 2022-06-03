<?php

namespace App\Attractions;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Events\Event
 *
 * @property string $AttractionID
 * @property string $Title
 * @property string $Type
 * @property string $Description
 * @property string $Area
 * @property string $Price
 * @property string $Capacity
 * @property int $HeaderImageID
 * @property int $SvgIconID
 * @method \SilverStripe\Assets\Image HeaderImage()
 * @method \SilverStripe\Assets\File SvgIcon()
 * @method \SilverStripe\ORM\DataList|\App\Attractions\AttractionImage[] GalleryImages()
 * @method \SilverStripe\ORM\DataList|\App\Attractions\AttractionInfo[] AttractionInfos()
 */
class Attraction extends DataObject
{
    private static $db = [
        "AttractionID" => "Varchar(10)",
        "Title" => "Varchar(255)",
        "Type" => "Varchar(255)",
        "Description" => "HTMLText",
        "Area" => "Varchar(255)",
        "Price" => "Varchar(255)",
        "Capacity" => "Varchar(255)"
    ];

    private static $has_one = [
        "HeaderImage" => Image::class,
        "SvgIcon" => File::class,
    ];

    private static $has_many = [
        "GalleryImages" => AttractionImage::class,
        "AttractionInfos" => AttractionInfo::class
    ];

    private static $owns = [
        "HeaderImage",
        "SvgIcon",
        "GalleryImages",
        "AttractionInfos"
    ];

    private static $default_sort = "Title DESC";

    private static $field_labels = [
        "AttractionID" => "Attraktions-ID",
        "Title" => "Titel",
        "Type" => "Typ",
        "Description" => "Kurzbeschreibung",
        "Area" => "Themenbereich",
        "HeaderImage" => "Headerbild",
        "GalleryImages" => "Galeriebilder",
        "AttractionInfos" => "Infos",
        "Price" => "Vorraussichtliche Kosten",
        "Capacity" => "Kapazität pro Stunde"
    ];

    private static $summary_fields = [
        "CMSThumbnail" => "Bild",
        "AttractionID" => "Attraktions-ID",
        "Title" => "Titel",
        "Type" => "Typ",
        "Area" => "Themenbereich",
    ];

    private static $searchable_fields = [
        "AttractionID", "Title", "Type", "Description", "Area"
    ];

    private static $table_name = "Attraction";

    private static $singular_name = "Attraktion";
    private static $plural_name = "Attraktionen";

    public function Link()
    {
        $holder = AttractionsOverview::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->ID;
        }
    }

    // this function creates the thumbnail for the summary fields to use
    public function getCMSThumbnail()
    {
        if ($image = $this->HeaderImage())
            return $image->CMSThumbnail();
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("GalleryImages");
        $fields->removeByName("AttractionInfos");

        $gridFieldConfig = GridFieldConfig_RecordEditor::create(200);
        $sorter = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig->addComponent($sorter);
        $gridfield = new GridField("GalleryImages", "Bilder", $this->GalleryImages(), $gridFieldConfig);
        $fields->addFieldToTab('Root.Galerie', $gridfield);

        $gridFieldConfig2 = GridFieldConfig_RecordEditor::create(200);
        $sorter2 = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig2->addComponent($sorter2);
        $gridfield2 = new GridField("AttractionInfos", "Infos", $this->AttractionInfos(), $gridFieldConfig2);
        $fields->addFieldToTab('Root.Infos', $gridfield2);

        return $fields;
    }
}
