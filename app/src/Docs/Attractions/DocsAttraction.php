<?php

namespace App\Docs;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Thumbnail;
use TractorCow\SliderField\SliderField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\View\Parsers\URLSegmentFilter;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Events\Event
 *
 * @property string $Title
 * @property string $AttractionID
 * @property string $Type
 * @property string $TypeLink
 * @property string $Description
 * @property string $Price
 * @property string $Capacity
 * @property bool $VisibleToGuests
 * @property bool $VisibleToDreamteam
 * @property int $ThrillIntensity
 * @property string $LinkTitle
 * @property int $HeaderImageID
 * @property int $SvgIconID
 * @property int $AreaID
 * @method \SilverStripe\Assets\Image HeaderImage()
 * @method \SilverStripe\Assets\File SvgIcon()
 * @method \App\Docs\DocsArea Area()
 * @method \SilverStripe\ORM\DataList|\PurpleSpider\BasicGalleryExtension\PhotoGalleryImage[] PhotoGalleryImages()
 * @method \SilverStripe\ORM\DataList|\App\Docs\DocsAttractionInfo[] AttractionInfos()
 * @method \SilverStripe\ORM\ManyManyList|\App\Docs\DocsTargetgroup[] AttractionTargetgroups()
 * @mixin \PurpleSpider\BasicGalleryExtension\PhotoGalleryExtension
 * @mixin \TractorCow\Fluent\Extension\FluentExtension
 */
class DocsAttraction extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "AttractionID" => "Varchar(10)",
        "Type" => "Varchar(255)",
        "TypeLink" => "Varchar(255)",
        "Description" => "HTMLText",
        "Price" => "Varchar(255)",
        "Capacity" => "Varchar(255)",
        "VisibleToGuests" => "Boolean",
        "VisibleToDreamteam" => "Boolean",
        "ThrillIntensity" => "Int",
        "LinkTitle" => "Varchar(255)",
    ];

    private static $has_one = [
        "HeaderImage" => Image::class,
        "SvgIcon" => File::class,
        "Area" => DocsArea::class,
    ];

    private static $has_many = [
        "AttractionInfos" => DocsAttractionInfo::class,
    ];

    private static $many_many = [
        "AttractionTargetgroups" => DocsTargetgroup::class
    ];

    private static $owns = [
        "HeaderImage",
        "SvgIcon",
        "AttractionInfos"
    ];

    private static $defaults = [
        "VisibleToGuests" => false,
        "VisibleToDreamteam" => true,
        "ThrillIntensity" => 5,
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "AttractionID" => "Attraktions-ID",
        "Title" => "Titel",
        "Type" => "Typ",
        "TypeLink" => "Link zum Typ",
        "Description" => "Beschreibung",
        "Area" => "Themenbereich",
        "HeaderImage" => "Headerbild",
        "AttractionInfos" => "Infos",
        "Price" => "Vorraussichtliche Kosten",
        "Capacity" => "Kapazität pro Stunde",
        "VisibleToGuests" => "Sichtbar für Gäste",
        "VisibleToDreamteam" => "Sichtbar für Dreamteam",
        "ThrillIntensity" => "Thrill Intensität (0-10)",
    ];

    private static $summary_fields = [
        "CMSThumbnail" => "Bild",
        "AttractionID" => "Attraktions-ID",
        "Title" => "Titel",
        "Type" => "Typ",
        "Area.Title" => "Themenbereich",
    ];

    private static $searchable_fields = [
        "Title", "AttractionID", "Type", "Description"
    ];

    private static $table_name = "Attraction";

    private static $singular_name = "Attraktion";
    private static $plural_name = "Attraktionen";

    public function Link()
    {
        $holder = DocsOverview::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("attraction/") . $this->LinkTitle;
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

        $fields->removeByName("AttractionInfos");

        $gridFieldConfig = GridFieldConfig_RecordEditor::create(200);
        $sorter = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig->addComponent($sorter);
        $gridfield = new GridField("AttractionInfos", "Infos", $this->AttractionInfos(), $gridFieldConfig);
        $fields->addFieldToTab('Root.Infos', $gridfield);

        $fields->removeByName("AttractionTargetgroups");
        $targetgroups_map = [];
        if ($targetgroups = DocsTargetgroup::get()) {
            $targetgroups_map = $targetgroups->map();
        }
        $fields->addFieldToTab("Root.Main", new CheckboxSetField("AttractionTargetgroups", "Zielgruppen", $targetgroups_map));

        $fields->removeByName("ThrillIntensity");
        $fields->addFieldToTab("Root.Main", new SliderField("ThrillIntensity", "Thrill Intensität (0-10)", 0, 10));

        $fields->removeByName("Locales");

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

    public function getFormattedName()
    {
        return str_replace(' ', '_', $this->Title);
    }

    public function getTargetGroups()
    {
        return $this->AttractionTargetgroups();
    }
}
