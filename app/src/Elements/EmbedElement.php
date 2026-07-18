<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextareaField;

/**
 * Class \App\Elements\EmbedElement
 *
 * @property ?string $EmbedCode
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class EmbedElement extends BaseElement
{

    private static $db = [
        "EmbedCode" => "HTMLText",
    ];

    private static $field_labels = [
    ];

    private static $styles = [];
    private static $table_name = 'EmbedElement';
    private static $icon = 'font-icon-code';

    #[Override]
    public function getType()
    {
        return "Embed";
    }

    #[Override]
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField("EmbedCode", new TextareaField('EmbedCode', 'Embed Code'));
        return $fields;
    }
}
