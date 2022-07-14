<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\SpaceElement
 *
 * @property string $Variant
 * @property string $Text
 * @property int $ImageID
 * @property int $ButtonID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Button()
 */
class NoticeElement extends BaseElement
{

    private static $db = [
        "Variant" => "Varchar(20)",
        "Text" => "HTMLText",
    ];

    private static $has_one = [
        "Image" => Image::class,
        "Button" => Link::class,
    ];

    private static $owns = [
        "Image",
        "Button"
    ];

    private static $field_labels = [
        "Text" => "Text",
        "Image" => "Icon (transparenter Hintergrund und möglichst quadratisch)",
        "Button" => "Button"
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
        $fields->removeByName("ButtonID");
        $fields->insertAfter('Text', LinkField::create('Button'));
        $fields->replaceField('Variant', new DropdownField('Variant', 'Variante', [
            "style--none" => "Keiner",
            "style--important" => "Wichtig",
            "style--hint" => "Hinweis",
        ]));
        return $fields;
    }
}
