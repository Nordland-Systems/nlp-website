<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property string $AlignVariant
 * @property string $ColorVariant
 * @property string $ButtonText
 * @property string $ButtonLink
 */
class TextElement extends BaseElement
{

    private static $db = [
        "Text" => "HTMLText",
        "AlignVariant" => "Varchar(20)",
        "ColorVariant" => "Varchar(20)",
        "ButtonText" => "Varchar(255)",
        "ButtonLink" => "Varchar(255)",
    ];

    private static $field_labels = [
        "Text" => "Text",
        "ButtonText" => "Button Text",
        "ButtonLink" => "Button Link"
    ];

    private static $table_name = 'TextElement';
    private static $icon = 'font-icon-block-content';

    private static $translate = [
        'Text',
        'ButtonText',
        'ButtonLink'
    ];

    public function getType()
    {
        return "Text";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('AlignVariant', new DropdownField('AlignVariant', 'Ausrichtungs-Variante', [
            "style--text-left" => "Text linksbündig",
            "style--text-center" => "Text zentriert",
            "style--text-right" => "Text rechtsbündig",
        ]));
        $fields->replaceField('ColorVariant', new DropdownField('ColorVariant', 'Farb-Variante', [
            "color--transparent" => "transparenter Hintergrund",
            "color--darker" => "dunklerer Hintergrund",
            "color--blue" => "blauer Hintergrund",
        ]));
        return $fields;
    }


}
