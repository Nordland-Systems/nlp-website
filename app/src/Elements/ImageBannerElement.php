<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property string $Variant
 * @property string $Overlay
 * @property int $Height
 * @property string $Parallax
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class ImageBannerElement extends BaseElement
{

    private static $db = [
        "Text" => "Varchar(255)",
        "Variant" => "Varchar(20)",
        "Overlay" => "Varchar(20)",
        "Height" => "Int(1000)",
        "Parallax" => "Varchar(20)"
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $field_labels = [
        "Text" => "Bildunterschrift",
        "Height" => "Höhe (in px)",
        "Image" => "Bild"
    ];

    private static $table_name = 'ImageBannerElement';
    private static $icon = 'font-icon-block-file';

    private static $translate = [
        'Text',
    ];

    public function getType()
    {
        return "Bildbanner";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Variant', new DropdownField('Variant', 'Variante', [
            "" => "Volle Breite",
            "variant--limited" => "Begrenzte Breite",
            "variant--hovering" => "Hervorgehoben",
        ]));
        $fields->replaceField('Overlay', new DropdownField('Overlay', 'Überlagerung', [
            "" => "Keine Überlagerung",
            "overlay--darker" => "Dunkler",
            "overlay--darkest" => "Am dunkelsten",
            "overlay--primary" => "Primärfarbe",
            "overlay--secondary" => "Sekundärfarbe",
            "overlay--fadeout" => "Fadeout",
        ]));
        $fields->replaceField('Parallax', new DropdownField('Parallax', 'Parallax', [
            "0" => "Kein Parallax",
            "0.2" => "Normale Geschwindigkeit (0.2)",
            "0.4" => "Hohe Geschwindigkeit (0.4)",
        ]));
        return $fields;
    }
}
