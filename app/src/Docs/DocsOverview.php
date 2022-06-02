<?php

namespace App\Docs;
use Page;

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

/**
 * Class \App\Docs\DocsHolder
 *
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class DocsOverview extends Page
{
    private static $table_name = 'DocsOverview';

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $icon = "app/client/icons/docs.svg";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", new UploadField("Image", "Headerbild"));
        return $fields;
    }

    public function getDocsCategories()
    {
        return DocsCategory::get()->sort('Title', 'ASC');
    }
}
