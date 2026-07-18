<?php

namespace {

    use SilverStripe\Assets\AssetControlExtension;
    use SilverStripe\Assets\Shortcodes\FileLinkTracking;
    use SilverStripe\CMS\Model\SiteTreeLinkTracking;
    use SilverStripe\Versioned\RecursivePublishable;
    use SilverStripe\Versioned\VersionedStateExtension;
    use DNADesign\Elemental\Models\ElementalArea;
    use DNADesign\Elemental\Extensions\ElementalPageExtension;
    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\CMS\Model\SiteTree;

    /**
 * Class \Page
 *
 * @property int $ElementalAreaID
 * @property int $ImageID
 * @method \DNADesign\Elemental\Models\ElementalArea ElementalArea()
 * @method \SilverStripe\Assets\Image Image()
 * @mixin \DNADesign\Elemental\Extensions\ElementalPageExtension
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
    class StreamPage extends SiteTree
    {
        private static $table_name = 'StreamPage';

        private static $db = [
        ];

        private static $has_one = [
            "Image" => Image::class,
        ];

        private static $owns = [
            "Image"
        ];

        #[Override]
        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab("Root.Seiteneinstellungen", new UploadField("Image", "Hintergrundbild"));
            return $fields;
        }
    }
}
