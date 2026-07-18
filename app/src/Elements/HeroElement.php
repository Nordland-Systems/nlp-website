<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property ?string $Subline
 * @property ?string $Overlay
 * @property ?string $Parallax
 * @property int $ImageID
 * @property int $BackgroundImageID
 * @property int $BackgroundImageDarkmodeID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\Assets\Image BackgroundImage()
 * @method \SilverStripe\Assets\Image BackgroundImageDarkmode()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class HeroElement extends BaseElement
{

    private static $db = [
        "Subline" => "Varchar(255)",
        "Overlay" => "Varchar(20)",
        "Parallax" => "Varchar(20)"
    ];

    private static $has_one = [
        "Image" => Image::class,
        "BackgroundImage" => Image::class,
        "BackgroundImageDarkmode" => Image::class,
    ];

    private static $owns = [
        "Image",
        "BackgroundImage",
        "BackgroundImageDarkmode",
    ];

    private static $field_labels = [
        "Subline" => "Unterüberschrift",
        "Image" => "Logo",
        "BackgroundImage" => "Hintergrundbild",
        "BackgroundImageDarkmode" => "Hintergrundbild Darkmode"
    ];

    private static $table_name = 'HeroElement';
    private static $icon = 'font-icon-block-carousel';

    private static $translate = [
        'Subline',
    ];

    #[Override]
    public function getType()
    {
        return "Hero";
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Overlay', new DropdownField('Overlay', 'Überlagerung', [
            "" => "Keine Überlagerung",
            "overlay--darker" => "Dunkler",
            "overlay--darkest" => "Am dunkelsten",
            "overlay--primary" => "Primärfarbe",
            "overlay--secondary" => "Sekundärfarbe",
            "overlay--fadeout" => "Fadeout",
            "overlay--fadeout2" => "Fadeout 2",
        ]));
        $fields->replaceField('Parallax', new DropdownField('Parallax', 'Parallax', [
            "0" => "Kein Parallax",
            "0.2" => "Normale Geschwindigkeit (0.2)",
            "0.4" => "Hohe Geschwindigkeit (0.4)",
            "0.6" => "Maximale Geschwindigkeit (0.6)",
        ]));
        return $fields;
    }
}
