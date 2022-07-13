<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property string $Variant
 * @property string $Highlight
 * @property string $ImgWidth
 * @property int $ImageID
 * @property int $ButtonID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Button()
 */
class TextImageElement extends BaseElement
{

    private static $db = [
        "Text" => "HTMLText",
        "Variant" => "Varchar(20)",
        "Highlight" => "Varchar(20)",
        "ImgWidth" => "Varchar(20)",
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
        "Image" => "Bild",
        "Button" => "Button"
    ];

    private static $table_name = 'TextImageElement';
    private static $icon = 'font-icon-block-promo-3';

    private static $translate = [
        'Text',
        'Image',
        'Button',
    ];

    public function getType() { return "Text + Bild"; }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("ButtonID");
        $fields->insertAfter('ImgWidth', LinkField::create('Button'));
        $fields->replaceField('Variant', new DropdownField('Variant', 'Variante', [
            "" => "Bild links",
            "image-right" => "Bild rechts",
        ]));
        $fields->replaceField('ImgWidth', new DropdownField('ImgWidth', 'Bildbreite', [
            "image-30" => "30%",
            "image-40" => "40%",
            "image-50" => "50%",
            "image-60" => "60%",
            "image-70" => "70%",
        ]));
        $fields->replaceField('Highlight', new DropdownField('Highlight', 'Highlight', [
            "" => "Kein Highlight",
            "highlighted" => "Highlight",
        ]));
        return $fields;
    }
}
