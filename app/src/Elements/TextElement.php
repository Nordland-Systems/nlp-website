<?php

namespace App\Elements;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TreeDropdownField;
use DNADesign\Elemental\Models\BaseElement;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property string $Text
 * @property string $AlignVariant
 * @property string $ColorVariant
 * @property string $ButtonText
 * @property int $ButtonLinkID
 * @method \SilverStripe\CMS\Model\SiteTree ButtonLink()
 */
class TextElement extends BaseElement
{

    private static $db = [
        "Text" => "HTMLText",
        "AlignVariant" => "Varchar(20)",
        "ColorVariant" => "Varchar(20)",
        "ButtonText" => "Varchar(255)",
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

    private static $has_one = [
        "ButtonLink" => SiteTree::class,
    ];

    public function getType()
    {
        return "Text";
    }

    public function RenderLink() {
        if ($this->LinkExtern) {
            return $this->LinkExtern;
        }
        if ($page = $this->ButtonLink()) {
            return $page->Link();
        }
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
