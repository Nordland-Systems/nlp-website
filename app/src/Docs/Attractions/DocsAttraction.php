<?php

namespace App\Docs;

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
 * @method \SilverStripe\ORM\DataList|\PurpleSpider\BasicGalleryExtension\PhotoGalleryImage[] PhotoGalleryImages()
 * @method \SilverStripe\ORM\DataList|\App\Docs\DocsAttractionInfo[] AttractionInfos()
 * @mixin \PurpleSpider\BasicGalleryExtension\PhotoGalleryExtension
 */
class DocsAttraction extends DataObject
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
        "AttractionInfos" => DocsAttractionInfo::class
    ];

    private static $owns = [
        "HeaderImage",
        "SvgIcon",
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
        $holder = DocsOverview::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("attraction/") . $this->ID;
        }
    }

    // this function creates the thumbnail for the summary fields to use
    public function getCMSThumbnail()
    {
        if ($image = $this->HeaderImage()) {
            return $image->CMSThumbnail();
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("AttractionInfos");

        $gridFieldConfig = GridFieldConfig_RecordEditor::create(200);
        $sorter = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig->addComponent($sorter);
        $gridfield = new GridField("AttractionInfos", "Infos", $this->AttractionInfos(), $gridFieldConfig);
        $fields->addFieldToTab('Root.Infos', $gridfield);

        return $fields;
    }
}
