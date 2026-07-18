<?php
namespace App\Stream;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use DateTime;
use StreamPage;
use App\Events\Event;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DatetimeField;

/**
 * Class \App\Docs\DocsPage
 *
 * @property ?string $CountdownDateTime
 * @property bool $UseNextStream
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
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
            ->filter([
            "Start:GreaterThan" => $now,
            "IsStream" => true,])
            ->sort("Start", "Asc")->first();
        if ($nextStream) {
            return $nextStream;
        } else {
            return false;
        }
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Seiteneinstellungen", new DatetimeField("CountdownDateTime", "Stream-Startzeitpunkt"));
        $fields->addFieldToTab("Root.Seiteneinstellungen", new CheckboxField("UseNextStream", "Zeit zum nächsten Stream nutzen"));
        return $fields;
    }
}
