<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Elements\TeamElement
 *
 * @property string $Text
 * @method \SilverStripe\ORM\DataList|\App\Elements\FaceItem[] Faces()
 */
class TeamElement extends BaseElement
{
    private static $db = [
        "Text" => "Varchar(250)",
    ];

    private static $has_many = [
        "Faces" => FaceItem::class,
    ];

    private static $table_name = 'TeamElement';

    private static $singular_name = 'Gesicht Element';

    private static $plural_name = 'Gesichter Elemente';

    private static $description = '';

    private static $field_labels = [
        "Text" => "Text",
    ];

    private static $icon = "font-icon-menu-security";

    public function inlineEditable()
    {
        return false;
    }

    public function getType()
    {
        return "Team";
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("Team");

        $gridFieldConfig = GridFieldConfig_RecordEditor::create(200);
        $sorter = new GridFieldSortableRows('SortOrder');
        $gridFieldConfig->addComponent($sorter);
        $gridfield = new GridField("Items", "Gesicht", $this->Faces(), $gridFieldConfig);
        $fields->addFieldToTab('Root.Main', $gridfield);
        return $fields;
    }
}
