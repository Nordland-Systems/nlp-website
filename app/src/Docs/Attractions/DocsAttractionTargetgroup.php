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
 * @property int $HeaderImageID
 * @property int $SvgIconID
 * @property int $AreaID
 * @method \SilverStripe\Assets\Image HeaderImage()
 * @method \SilverStripe\Assets\File SvgIcon()
 * @method \App\Docs\DocsArea Area()
 * @method \SilverStripe\ORM\DataList|\PurpleSpider\BasicGalleryExtension\PhotoGalleryImage[] PhotoGalleryImages()
 * @method \SilverStripe\ORM\DataList|\App\Docs\DocsAttractionInfo[] AttractionInfos()
 * @mixin \PurpleSpider\BasicGalleryExtension\PhotoGalleryExtension
 * @mixin \TractorCow\Fluent\Extension\FluentExtension
 */
class DocsAttractionTargetgroup extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "SortOrder" => "Int",
    ];

    private static $has_one = [
        "Parent" => DocsAttraction::class,
        "SvgIcon" => File::class,
    ];

    private static $owns = [
        "SvgIcon",
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Title"
    ];

    private static $table_name = "AttractionTargetGroup";

    private static $singular_name = "Zielgruppe";
    private static $plural_name = "Zielgruppen";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main", "ParentID");
        $fields->removeFieldFromTab("Root.Main", "SortOrder");
        return $fields;
    }

    public function getFormattedName()
    {
        return str_replace(' ', '_', $this->Title);
    }
}
