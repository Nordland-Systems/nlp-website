<?php

namespace App\Docs;

use SilverStripe\Assets\File;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Events\Event
 *
 * @property string $Title
 * @property string $Description
 * @property int $SortOrder
 * @property int $SvgIconID
 * @method \SilverStripe\Assets\File SvgIcon()
 * @method \SilverStripe\ORM\ManyManyList|\App\Docs\DocsAttraction[] Attractions()
 */
class DocsTargetgroup extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Description" => "HTMLText",
    ];

    private static $has_one = [
        "SvgIcon" => File::class,
    ];

    private static $owns = [
        "SvgIcon",
    ];

    private static $belongs_many_many = [
        "Attractions" => DocsAttraction::class
    ];

    private static $default_sort = "Title ASC";

    private static $field_labels = [
        "Title" => "Titel",
    ];

    private static $summary_fields = [
        "Title" => "Titel",
        "Attractions.Count" => "Attraktionen"
    ];

    private static $searchable_fields = [
        "Title"
    ];

    private static $table_name = "Targetgroup";

    private static $singular_name = "Zielgruppe";
    private static $plural_name = "Zielgruppen";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main", "ParentID");
        return $fields;
    }

    public function getFormattedName()
    {
        return str_replace(' ', '_', $this->Title);
    }

    public function AllAttractions()
    {
        return $this->Docs()->filter(["VisibleToDreamteam" => true]);
    }
}
