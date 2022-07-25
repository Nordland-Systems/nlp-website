<?php

namespace App\Team;

use SilverStripe\Assets\Image;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Team\TeamMember
 *
 * @property string $Title
 * @property string $Place
 * @property string $Jointime
 * @property string $Bodysize
 * @property string $Age
 * @property string $Description
 * @property int $Importance
 * @property int $ImageID
 * @property int $ButtonID
 * @property int $Button2ID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Button()
 * @method \SilverStripe\LinkField\Models\Link Button2()
 */
class Character extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Place" => "Varchar(255)",
        "Jointime" => "Varchar(255)",
        "Bodysize" => "Varchar(255)",
        "Age" => "Varchar(255)",
        "Description" => "HTMLText",
        "Importance" => "Int"
    ];

    private static $has_one = [
        "Image" => Image::class,
        "Button" => Link::class,
        "Button2" => Link::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $indexes = [
        'Importance' => true,
    ];

    private static $default_sort = "Importance ASC";

    private static $field_labels = [
        "Title" => "Name",
        "Place" => "Herkunft",
        "Jointime" => "Seit wann dabei",
        "Age" => "Alter",
        "Description" => "Beschreibung",
        "Button" => "Button",
        "Button2" => "Button 2",
        "Importance" => "Wichtigkeit"
    ];

    private static $summary_fields = [
        "Importance" => "Wichtigkeit",
        "Title" => "Name",
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Characters";

    private static $singular_name = "Charakter";
    private static $plural_name = "Charaktere";

    private static $url_segment = "character";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("ButtonID");
        $fields->insertAfter('Description', LinkField::create('Button'));
        $fields->removeByName("Button2ID");
        $fields->insertAfter('Button', LinkField::create('Button2'));
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = TeamAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }
}
