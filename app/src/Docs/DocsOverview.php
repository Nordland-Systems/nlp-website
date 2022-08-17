<?php

namespace App\Docs;

use Page;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxField;

/**
 * Class \App\Docs\DocsHolder
 *
 * @property bool $VisibleToGuests
 */
class DocsOverview extends Page
{
    private static $table_name = 'DocsOverview';

    private static $db = array(
        "VisibleToGuests" => "Boolean"
    );

    private static $icon = "app/client/icons/docs.svg";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", new CheckboxField("VisibleToGuests", "Sichtbar für Gäste"));
        return $fields;
    }
}
