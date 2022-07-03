<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Elements\TimelineElement
 *
 * @property boolean $IsCollapsible
 * @method \SilverStripe\ORM\DataList|\App\Elements\FAQItem[] FAQItems()
 */
class FAQElement extends BaseElement
{

    private static $db = [
        "IsCollapsible" => "Boolean"
    ];

    private static $has_many = [
        "FAQItems" => FAQItem::class
    ];

    private static $field_labels = [
        "IsCollapsible" => "Ist einklappbar"
    ];

    private static $defaults = [
        "IsCollapsible" => "True",
    ];

    private static $table_name = 'FAQElement';
    private static $icon = 'font-icon-help-circled';

    public function inlineEditable()
    {
        return false;
    }

    public function getType() { return "FAQ"; }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("FAQItems");

        $gridFieldConfig = GridFieldConfig_RecordEditor::create(200);
        $sorter = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig->addComponent($sorter);
        $gridfield = new GridField("FAQItems", "Eintrag", $this->FAQItems(), $gridFieldConfig);
        $fields->addFieldToTab('Root.Main', $gridfield);

        return $fields;
    }
}
