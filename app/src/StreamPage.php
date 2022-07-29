<?php

namespace {

    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\CMS\Model\SiteTree;

    /**
 * Class \Page
 *
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
    class StreamPage extends SiteTree
    {
        private static $db = [
        ];

        private static $has_one = [
            "Image" => Image::class,
        ];

        private static $owns = [
            "Image"
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab("Root.Seiteneinstellungen", new UploadField("Image", "Hintergrundbild"));
            return $fields;
        }
    }
}
