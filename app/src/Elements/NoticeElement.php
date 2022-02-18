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
 * @property string $ButtonText
 * @property string $ButtonLink
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class NoticeElement extends BaseElement
{

    private static $db = [
        "Variant" => "Varchar(20)",
        "Text" => "HTMLText",
        "ButtonText" => "Varchar(255)",
        "ButtonLink" => "Varchar(255)",
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $field_labels = [
        "Text" => "Text",
        "Image" => "Icon (transparenter Hintergrund und möglichst quadratisch)",
        "ButtonText" => "Button Text",
        "ButtonLink" => "Button Link"
    ];

    private static $table_name = 'NoticeElement';
    private static $icon = 'font-icon-attention';

    public function getType()
    {
        return "Hinweis";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Variant', new DropdownField('Variant', 'Variante', [
            "style--none" => "Keiner",
            "style--important" => "Wichtig",
            "style--hint" => "Hinweis",
        ]));
        return $fields;
    }
}
