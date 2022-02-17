<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\SpaceElement
 *
 * @property string $Variant
 * @property int $Height
 */
class SpaceElement extends BaseElement
{

    private static $db = [
        "Variant" => "Varchar(20)",
        "Height" => "Int(1000)"
    ];

    private static $field_labels = [
        "Height" => "Höhe (in px)"
    ];

    private static $table_name = 'SpaceElement';
    private static $icon = 'font-icon-caret-up-down';

    public function getType()
    {
        return "Abstand";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Variant', new DropdownField('Variant', 'Variante', [
            "style--none" => "Leerer Platz",
            "style--line" => "Einfache Linie",
            "style--wave" => "Welle",
            "style--diamond" => "Diamant",
        ]));
        return $fields;
    }
}
