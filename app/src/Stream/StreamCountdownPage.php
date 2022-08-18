<?php
namespace App\Stream;

use DateTime;
use StreamPage;
use App\Events\Event;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DatetimeField;

/**
 * Class \App\Docs\DocsPage
 *
 * @property string $CountdownDateTime
 * @property bool $UseNextStream
 */
class StreamCountdownPage extends StreamPage
{
    private static $db = [
        "CountdownDateTime" => "Datetime",
        "UseNextStream" => "Boolean",
    ];

    private static $has_one = [
    ];

    private static $table_name = "App_Stream_StreamCountdownPage";

    //Check if CountdownDateTime is in the past
    public function getCountdownEnded()
    {
        $now = new DateTime();
        $countdownDateTime = $this->CountdownDateTime;
        if ($countdownDateTime < $now) {
            return true;
        } else {
            return false;
        }
    }

    public function getNextStream()
    {
        $now = date("Y-m-d H:i:s");
        $nextStream= Event::get()
            ->filter(array(
            "Start:GreaterThan" => $now,
            "IsStream" => true,))
            ->sort("Start", "Asc")->first();
        if ($nextStream) {
            return $nextStream;
        } else {
            return false;
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Seiteneinstellungen", new DatetimeField("CountdownDateTime", "Stream-Startzeitpunkt"));
        $fields->addFieldToTab("Root.Seiteneinstellungen", new CheckboxField("UseNextStream", "Zeit zum nächsten Stream nutzen"));
        return $fields;
    }
}
