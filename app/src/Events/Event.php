<?php

namespace App\Events;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\ORM\FieldType\DBDatetime;

/**
 * Class \App\Events\Event
 *
 * @property string $Title
 * @property string $Start
 * @property string $End
 * @property boolean $Allday
 * @property string $Description
 * @property int $ImageID
 * @property int $LinkID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Link()
 */
class Event extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Start" => "Datetime",
        "End" => "Datetime",
        "Allday" => "Boolean",
        "Description" => "HTMLText"
    ];

    private static $has_one = [
        "Image" => Image::class,
        "Link" => Link::class,
    ];

    private static $owns = [
        "Image",
        "Link"
    ];

    private static $default_sort = "Start DESC";

    private static $field_labels = [
        "Title" => "Titel",
        "Start" => "Start",
        "End" => "Ende",
        "Description" => "Kurzbeschreibung",
        "Link" => "Link",
        "Allday" => "Ganztägig",
    ];

    private static $summary_fields = [
        "FormattedSummaryDate" => "Datum",
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Start", "Title", "Description",
    ];

    public function populateDefaults()
    {
        $this->Start = date('Y-m-d H:00:00');
        parent::populateDefaults();
    }

    private static $table_name = "Event";

    private static $singular_name = "Event";
    private static $plural_name = "Events";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("LinkID");
        $fields->insertAfter('Description', LinkField::create('Link'));
        return $fields;
    }


    public function HasStartTime() {
        $formatted = $this->dbObject('Start')->Format("HH:mm");
        return $formatted && $formatted != "00:00";
    }

    public function HasEndTime() {
        $formatted = $this->dbObject('End')->Format("HH:mm");
        return $formatted && $formatted != "00:00";
    }

    public function FormattedStartDate() {
        $date = $this->dbObject('Start');
        if($date)
            return $date->Format("dd.MM.yy (HH:mm)");
    }

    public function FormattedSummaryDate() {
        $date = $this->dbObject('Start');
        $dateEnd = $this->dbObject('End');
        if($this->Allday){
            if($date)
                return $date->Format("dd.MM.yy") . " (Ganztägig)";
        } else {
            if($dateEnd){
                if($date)
                return $date->Format("dd.MM.yy (HH:mm)") . " - " . $dateEnd->Format("dd.MM.yy (HH:mm)");
            } else {
                if($date) {
                    return $date->Format("dd.MM.yy (HH:mm)");
                } else{
                    return "Kein Datum";
                }
            }
        }
    }

    public function AllDayDate() {
        $date = $this->dbObject('Start');
        if($date)
            return $date->Format("dd.MM.yy");
    }

    public function FormattedEndDate() {
        $date = $this->dbObject('End');
        if($date)
            return $date->Format("dd.MM.yy (HH:mm)");
    }
}
