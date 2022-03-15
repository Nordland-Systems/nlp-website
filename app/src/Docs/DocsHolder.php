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
class DocsHolder extends Page
{
    private static $table_name = 'DocsHolder';

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $menu_icon_class = "font-icon-p-news-item";
    

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
