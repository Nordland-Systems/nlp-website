<?php

namespace App\Events;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Events\Event
 *
 * @property string $Title
 * @property string $StartDate
 * @property string $EndDate
 * @property string $StartTime
 * @property string $EndTime
 * @property string $Description
 * @property string $Link
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class Event extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "StartDate" => "Date",
        "EndDate" => "Date",
        "StartTime" => "Time",
        "EndTime" => "Time",
        "Description" => "HTMLText",
        "Link" => "Varchar(255)"
    ];

    private static $has_one = [
        "Image" => Image::class
    ];

    private static $owns = [
        "Image",
    ];

    private static $default_sort = "StartDate DESC";

    private static $field_labels = [
        "Title" => "Titel",
        "StartDate" => "Datum",
        "Description" => "Kurzbeschreibung",
        "Link" => "Link"
    ];

    private static $summary_fields = [
        "FormattedDate" => "Datum",
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "StartDate", "Title", "Description",
    ];

    private static $table_name = "Event";

    private static $singular_name = "Event";
    private static $plural_name = "Events";

    public function HasStartTime() {
        $formatted = $this->dbObject('StartTime')->Format("HH:mm");
        return $formatted && $formatted != "00:00";
    }

    public function HasEndTime() {
        $formatted = $this->dbObject('EndTime')->Format("HH:mm");
        return $formatted && $formatted != "00:00";
    }

    public function FormattedDate() {
        $date = $this->dbObject('StartDate');
        if($date)
            return $date->Format("dd.MM.yyyy");
    }
}
