<?php

namespace App\Docs;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Security\Permission;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property boolean $Visible
 * @property string $Description
 * @property string $ImageDescription
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class Docs extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Visible" => "Boolean",
        "Description" => "HTMLText",
        "ImageDescription" => "Varchar(255)",
    ];

    private static $defaults = [
        "Visible" => true,
    ];

    private static $has_one = [
        "Image" => Image::class
    ];

    private static $owns = [
        "Image",
    ];

    private static $default_sort = "Date DESC";

    private static $field_labels = [
        "Title" => "Titel",
        "Description" => "Kurzbeschreibung",
        "ImageDescription" => "Bildbeschreibung",
        "Image" => "Bild",
        "Visible" => "Sichtbar für Gäste",
    ];

    private static $summary_fields = [
        "FormattedDate" => "Datum",
        "Visible" => "Sichtbar",
        "CMSThumbnail" => "Bild",
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "Docs";

    public function populateDefaults()
    {
        $this->Date = date('Y-m-d H:00:00');
        parent::populateDefaults();
    }

    public function FormattedDate() {
        $date = $this->dbObject('Date');
        if($date)
            return $date->Format("dd.MM.yyyy");
    }

    protected function onAfterWrite() {
        parent::onAfterWrite();
        $image = $this->Image();
        if($image->exists()) {
            $image->publishRecursive();
        }
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canDelete($member = null)
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function canCreate($member = null, $context = [])
    {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    //Needed to use ElementalArea in template
    public function CanArchive($member=null) {
        return Permission::check('CMS_ACCESS_NewsAdmin', 'any', $member);
    }

    public function Link()
    {
        $holder = DocsPage::get()->sort("ID", "ASC")->First();
        if ($holder) {
            return $holder->Link("view/") . $this->ID;
        }
    }

    // this function creates the thumnail for the summary fields to use
    public function getCMSThumbnail()
    {
        if ($image = $this->Image())
            return $image->CMSThumbnail();
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->dataFieldByName("Image")->setFolderName("docs");
        if(!$this->exists()) {
            $fields->addFieldToTab("Root.Main",
                new LiteralField("Introduction", "<p><strong>Bitte speichern, um Inhaltselemente hinzuzufügen</strong></p>"));
        }
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = DocsAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }
}
