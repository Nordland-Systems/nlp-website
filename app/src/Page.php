<?php

namespace {

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\DropdownField;

    /**
 * Class \Page
 *
 * @property string $MenuPosition
 * @property string $ShowHeroImage
 * @property int $ElementalAreaID
 * @property int $ImageID
 * @method \DNADesign\Elemental\Models\ElementalArea ElementalArea()
 * @method \SilverStripe\Assets\Image Image()
 * @mixin \DNADesign\Elemental\Extensions\ElementalPageExtension
 */
    class Page extends SiteTree
    {
        private static $db = [
            "MenuPosition" => "Enum('main,footer,topbar', 'main')",
            "ShowHeroImage" => "Varchar(255)"
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

            $fields->addFieldToTab("Root.Seiteneinstellungen", new DropdownField("MenuPosition", "Menü", [
                "main" => "Hauptmenü",
                "footer" => "Footer",
                "topbar" => "TopBar",
            ]), "Content");

            $fields->addFieldToTab("Root.Seiteneinstellungen", new DropdownField("ShowHeroImage", "Headerbild anzeigen?", [
                "show-with-title" => "Headerbild mit Titel anzeigen",
                "show-without-title" => "Headerbild ohne Titel anzeigen",
                "hide" => "Headerbild verstecken",
            ]), "Content");
            $fields->addFieldToTab("Root.Seiteneinstellungen", new UploadField("Image", "Headerbild"));
            return $fields;
        }
    }
}
