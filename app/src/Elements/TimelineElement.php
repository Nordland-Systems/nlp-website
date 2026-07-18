<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use SilverStripe\ORM\DataList;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Elements\TimelineElement
 *
 * @property bool $IsCollapsible
 * @method \SilverStripe\ORM\DataList|\App\Elements\TimelineItem[] TimelineItems()
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
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

    #[Override]
    public function inlineEditable()
    {
        return false;
    }

    #[Override]
    public function getType()
    {
        return "Zeitleiste";
    }

    #[Override]
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
