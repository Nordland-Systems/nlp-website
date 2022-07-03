<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Subline
 * @property string $Overlay
 * @property string $Parallax
 * @property int $ImageID
 * @property int $BackgroundImageID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\Assets\Image BackgroundImage()
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
    ];

    private static $owns = [
        "Image",
        "BackgroundImage"
    ];

    private static $field_labels = [
        "Subline" => "Unterüberschrift",
        "Image" => "Logo",
        "BackgroundImage" => "Hintergrundbild"
    ];

    private static $table_name = 'HeroElement';
    private static $icon = 'font-icon-block-carousel';

    private static $translate = [
        'Subline',
    ];

    public function getType() { return "Hero"; }

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
