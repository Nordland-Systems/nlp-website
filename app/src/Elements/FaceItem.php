<?php

namespace App\Elements;

use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Security\Permission;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\DropdownField;

/**
 * Class \App\Elements\FaceItem
 *
 * @property string $Name
 * @property string $Description
 * @property string $Profession
 * @property int $SortOrder
 * @property string $WebsiteLink
 * @property string $Mail
 * @property string $TwitterLink
 * @property string $InstagramLink
 * @property string $LinkedInLink
 * @property string $RedditLink
 * @property string $FacebookLink
 * @property string $PinterestLink
 * @property string $TikTokLink
 * @property string $FlickrLink
 * @property string $YoutubeLink
 * @property string $SoundcloudLink
 * @property string $GitHubLink
 * @property string $TelegramLink
 * @property int $ParentID
 * @property int $ImageID
 * @method \App\Elements\TeamElement Parent()
 * @method \SilverStripe\Assets\Image Image()
 */
class FaceItem extends DataObject {
    private static $db = [
        "Name" => "Varchar(255)",
        "Description" => "Varchar(255)",
        "Profession" => "Varchar(255)",
        "SortOrder" => "Int",
        "WebsiteLink" => "Varchar(500)",
        "Mail" => "Varchar(500)",
        "TwitterLink" => "Varchar(500)",
        "InstagramLink" => "Varchar(500)",
        "LinkedInLink" => "Varchar(500)",
        "RedditLink" => "Varchar(500)",
        "FacebookLink" => "Varchar(500)",
        "PinterestLink" => "Varchar(500)",
        "TikTokLink" => "Varchar(500)",
        "FlickrLink" => "Varchar(500)",
        "YoutubeLink" => "Varchar(500)",
        "SoundcloudLink" => "Varchar(500)",
        "GitHubLink" => "Varchar(500)",
        "BehanceLink" => "Varchar(500)",
        "TelegramLink" => "Varchar(500)"
    ];

    private static $has_one = [
        "Parent" => TeamElement::class,
        "Image" => Image::class
    ];

    private static $owns = [
        "Image"
    ];

    private static $field_labels = [
        "Name" => "Name",
        "Description" => "Beschreibung",
        "Profession" => "Bereich",
        "Image" => "Bild",
    ];

    private static $default_sort = 'SortOrder ASC, ID ASC';

    private static $inline_editable = false;

    private static $summary_fields = [
        'ID' => 'ID',
        'Name' => 'Name',
        'Description' => 'Beschreibung',
        'Profession' => 'Bereich'
    ];

    private static $searchable_fields = [
        "Name",
        "Profession",
    ];

    private static $table_name = "FaceItem";

    private static $singular_name = "Gesicht";
    private static $plural_name = "Gesichter";


    // tidy up the CMS by not showing these fields
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","ParentID");
        $fields->removeFieldFromTab("Root.Main","SortOrder");
        return $fields;
    }

    public function canView($member = null) {
        return true;
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canCreate($member = null, $context=[]) {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

}
