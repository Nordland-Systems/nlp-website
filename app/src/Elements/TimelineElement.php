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
 * @method \SilverStripe\ORM\DataList|\App\Elements\TimelineItem[] TimelineItems()
 */
class TimelineElement extends BaseElement
{

    private static $db = [
        "IsCollapsible" => "Boolean"
    ];

    private static $has_many = [
        "TimelineItems" => TimelineItem::class
    ];

    private static $field_labels = [
        "IsCollapsible" => "Ist einklappbar"
    ];

    private static $table_name = 'TimelineElement';
    private static $icon = 'font-icon-block-file-list';

    public function inlineEditable()
    {
        return false;
    }

    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Zeitleiste');
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("TimelineItems");

        $gridFieldConfig = GridFieldConfig_RecordEditor::create(200);
        $sorter = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig->addComponent($sorter);
        $gridfield = new GridField("Items", "Eintrag", $this->TimelineItems(), $gridFieldConfig);
        $fields->addFieldToTab('Root.Main', $gridfield);

        return $fields;
    }
}
