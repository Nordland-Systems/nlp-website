<?php

namespace App\Elements;

use App\Team\TeamMember;
use App\Team\TeamOverview;
use SilverStripe\Forms\DropdownField;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
 * Class \App\Elements\TeamElement
 *
 * @property string $Text
 * @property string $DataType
 */
class TeamElement extends BaseElement
{
    private static $db = [
        "Text" => "HTMLText",
        "DataType" => "Varchar(255)",
    ];

    private static $table_name = 'TeamElement';

    private static $singular_name = 'Gesicht Element';

    private static $plural_name = 'Gesichter Elemente';

    private static $description = '';

    private static $field_labels = [
        "Text" => "Text",
    ];

    private static $icon = "font-icon-menu-security";

    public function getType()
    {
        return "Team";
    }

    public function getMemberLink()
    {
        if ($news_page = TeamOverview::get()->first()) {
            $link = $news_page->Link();
            $link .= "view";
            return $link;
        } else {
            return "Error";
        }
    }

    public function getMembers()
    {
        return TeamMember::get()->filter("Importance", "member");
    }

    public function getFounders()
    {
        return TeamMember::get()->filter("Importance", "founder");
    }

    public function getPartners()
    {
        return TeamMember::get()->filter("Importance", "partner");
    }

    public function getFormers()
    {
        return TeamMember::get()->filter("Status", "formerly");
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('DataType', new DropdownField('DataType', 'Angezeigte Menschen', [
            "members" => "Mitglied",
            "founders" => "Gründer",
            "partners" => "Partner",
            "formers" => "Ehemalige"
        ]));
        return $fields;
    }
}
