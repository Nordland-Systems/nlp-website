<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextareaField;

/**
 * Class \App\Elements\EmbedElement
 *
 * @property string $EmbedCode
 */
class EmbedElement extends BaseElement
{

    private static $db = [
        "EmbedCode" => "HTMLText",
    ];

    private static $field_labels = [
    ];

    private static $styles = array();
    private static $table_name = 'EmbedElement';
    private static $icon = 'font-icon-code';

    public function getType()
    {
        return "Embed";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField("EmbedCode", new TextareaField('EmbedCode', 'Embed Code'));
        return $fields;
    }
}
