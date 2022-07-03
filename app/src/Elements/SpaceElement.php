<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\SpaceElement
 *
 * @property string $Variant
 * @property int $Height
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class SpaceElement extends BaseElement
{

    private static $db = [
        "Variant" => "Varchar(20)",
        "Height" => "Int(1000)"
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $field_labels = [
        "Height" => "Höhe (in px)",
        "Image" => "Icon (transparenter Hintergrund und möglichst quadratisch)"
    ];

    private static $table_name = 'SpaceElement';
    private static $icon = 'font-icon-caret-up-down';

    public function getType() { return "Abstand"; }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Variant', new DropdownField('Variant', 'Variante', [
            "style--none" => "Leerer Platz",
            "style--line" => "Einfache Linie",
            "style--wave" => "Welle",
            "style--diamond" => "Diamant",
            "style--icon" => "Icon",
        ]));
        return $fields;
    }
}
