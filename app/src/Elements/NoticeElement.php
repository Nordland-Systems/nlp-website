<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\SpaceElement
 *
 * @property ?string $Variant
 * @property ?string $Text
 * @property int $ImageID
 * @property int $ButtonID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Button()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
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

    #[Override]
    public function getType()
    {
        return "Hinweis";
    }

    #[Override]
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
