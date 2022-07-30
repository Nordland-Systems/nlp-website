<?php
namespace App\Stream;

use DateTime;
use SilverStripe\Forms\DatetimeField;
use StreamPage;

/**
 * Class \App\Docs\DocsPage
 *
 * @property string $CountdownDateTime
 */
class StreamCountdownPage extends StreamPage
{
    private static $db = [
        "CountdownDateTime" => "Datetime",
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

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Seiteneinstellungen", new DatetimeField("CountdownDateTime", "Stream-Startzeitpunkt"));
        return $fields;
    }
}
