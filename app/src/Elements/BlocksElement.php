<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Elements\TimelineElement
 *
 * @method \SilverStripe\ORM\DataList|\App\Elements\BlockItem[] Blocks()
 */
class BlocksElement extends BaseElement
{
    private static $has_many = [
        "Blocks" => BlockItem::class
    ];

    private static $table_name = 'blocksElement';
    private static $icon = 'font-icon-thumbnails';

    public function inlineEditable()
    {
        return false;
    }

    public function getType() { return "Blöcke"; }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("Blocks");

        $gridFieldConfig = GridFieldConfig_RecordEditor::create(200);
        $sorter = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig->addComponent($sorter);
        $gridfield = new GridField("Blocks", "Eintrag", $this->Blocks(), $gridFieldConfig);
        $fields->addFieldToTab('Root.Main', $gridfield);

        return $fields;
    }
}
