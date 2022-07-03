<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\SpaceElement
 *
 * @property string $Variant
 * @property string $Text
 * @property string $TwitterLink
 * @property string $LinkedInLink
 * @property string $InstagramLink
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class FaceElement extends BaseElement
{

    private static $db = [
        "Variant" => "Varchar(20)",
        "Text" => "HTMLText",
        "TwitterLink" => "Varchar(255)",
        "LinkedInLink" => "Varchar(255)",
        "InstagramLink" => "Varchar(255)",
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $field_labels = [
        "Text" => "Text",
        "Image" => "Faceimage",
        "TwitterLink" => "Twitter",
        "LinkedInLink" => "LinkedIn",
        "InstagramLink" => "Instagram",
    ];

    private static $table_name = 'FaceElement';
    private static $icon = 'font-icon-happy';

    public function getType() { return "Gesicht"; }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Variant', new DropdownField('Variant', 'Variante', [
            "" => "Gesicht links",
            "image--right" => "Gesicht rechts"
        ]));
        return $fields;
    }
}
