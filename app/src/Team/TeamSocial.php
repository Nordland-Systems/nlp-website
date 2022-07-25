<?php

namespace App\Team;

use App\Team\TeamAdmin;
use App\Team\TeamMember;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Team\TeamSocial
 *
 * @property string $Plattform
 * @property string $Link
 * @property int $SortOrder
 * @property int $ParentID
 * @method \App\Team\TeamMember Parent()
 */
class TeamSocial extends DataObject
{
    private static $db = [
        "Plattform" => "Varchar(255)",
        "Link" => "Varchar(255)",
        "SortOrder" => "Int",
    ];

    private static $has_one = [
        "Parent" => TeamMember::class,
    ];

    private static $default_sort = "SortOrder ASC";

    private static $field_labels = [
        "Plattform" => "Plattform",
        "Link" => "Link",
        "SortOrder" => "Sortierung"
    ];

    private static $summary_fields = [
        "Plattform" => "Plattform",
        "Link" => "Link",
    ];

    private static $table_name = "TeamSocial";

    private static $singular_name = "Sozialer Link";
    private static $plural_name = "Soziale Links";

    private static $url_segment = "teamsocial";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Plattform', new DropdownField('Plattform', 'Plattform', [
            "website" => "Website",
            "mail" => "Mail",
            "youtube" => "Youtube",
            "twitch" => "Twitch",
            "twitter" => "Twitter",
            "instagram" => "Instagram",
            "linkedin" => "LinkedIn",
            "behance" => "Behance",
            "github" => "Github",
            "facebook" => "Facebook",
            "flickr" => "Flickr",
            "spotify" => "Spotify",
            "soundcloud" => "Soundcloud",
            "telegram" => "Telegram",
            "discord" => "Discord",
            "itchio" => "Itch.io",
            "reddit" => "Reddit",
            "tiktok" => "TikTok",
        ]));
        $fields->removeByName("ParentID");
        $category_map = [];
        if ($categories = TeamMember::get()) {
            return $fields;
        }
    }
}
