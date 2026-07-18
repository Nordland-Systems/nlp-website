<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use SilverStripe\Forms\DropdownField;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use DNADesign\Elemental\Models\BaseElement;

/**
 * Class \App\Elements\TextImageElement
 *
 * @property ?string $Text
 * @property ?string $AlignVariant
 * @property ?string $ColorVariant
 * @property int $ButtonID
 * @method \SilverStripe\LinkField\Models\Link Button()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class TextElement extends BaseElement
{
    private static $db = [
        "Text" => "HTMLText",
        "AlignVariant" => "Varchar(20)",
        "ColorVariant" => "Varchar(20)",
    ];

    private static $has_one = [
        "Button" => Link::class,
    ];

    private static $owns = [
        "Button",
    ];

    private static $field_labels = [
        "Text" => "Text",
        "Button" => "Button"
    ];

    private static $table_name = 'TextElement';
    private static $icon = 'font-icon-block-content';

    private static $translate = [
        'Text',
        'Button'
    ];

    #[Override]
    public function getType()
    {
        return "Text";
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("ButtonID");
        $fields->insertAfter('ColorVariant', LinkField::create('Button'));
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
