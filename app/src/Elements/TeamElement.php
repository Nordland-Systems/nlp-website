<?php

namespace App\Elements;

use SilverStripe\Assets\AssetControlExtension;
use SilverStripe\Assets\Shortcodes\FileLinkTracking;
use SilverStripe\CMS\Model\SiteTreeLinkTracking;
use SilverStripe\Versioned\RecursivePublishable;
use SilverStripe\Versioned\VersionedStateExtension;
use Override;
use App\Team\TeamMember;
use App\Team\TeamOverview;
use SilverStripe\Forms\DropdownField;
use DNADesign\Elemental\Models\BaseElement;

/**
 * Class \App\Elements\TeamElement
 *
 * @property ?string $Text
 * @property ?string $DataType
 * @mixin \SilverStripe\Assets\AssetControlExtension
 * @mixin \SilverStripe\Assets\Shortcodes\FileLinkTracking
 * @mixin \SilverStripe\CMS\Model\SiteTreeLinkTracking
 * @mixin \SilverStripe\Versioned\RecursivePublishable
 * @mixin \SilverStripe\Versioned\VersionedStateExtension
 */
class TeamElement extends BaseElement
{
    private static $db = [
        "Text" => "HTMLText",
        "DataType" => "Varchar(255)",
    ];

    private static $table_name = 'TeamElement';

    private static $singular_name = 'Team Element';

    private static $plural_name = 'Team Elemente';

    private static $class_description = '';

    private static $field_labels = [
        "Text" => "Text",
    ];

    private static $icon = "font-icon-menu-security";

    #[Override]
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

    #[Override]
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
