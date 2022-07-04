<?php

namespace App\News;

use App\News\NewsPage;
use App\News\NewsAdmin;
use App\Events\EventAdmin;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Security\Permission;
use SilverStripe\Forms\CheckboxSetField;

/**
 * Class \App\Docs\Docs
 *
 * @property string $Title
 * @property string $Date
 * @property string $Summary
 * @property string $Description
 * @property string $ImageDescription
 * @property boolean $Visible
 * @property int $ImageID
 * @method \SilverStripe\Assets\Image Image()
 */
class News extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Date" => "Datetime",
        "Summary" => "Varchar(255)",
        "Description" => "HTMLText",
        "ImageDescription" => "Varchar(255)",
        "Visible" => "Boolean"
    ];

    private static $has_one = [
        "Image" => Image::class,
    ];

    private static $owns = [
        "Image"
    ];

    private static $defaults = [
        "Visible" => true,
    ];

    private static $default_sort = "Title DESC";

    private static $field_labels = [
        "Title" => "Titel",
        "Date" => "Datum",
        "Summary" => "Vorschautext",
        "Description" => "Inhalt",
        "Visible" => "Sichtbar für Gäste",
        "Category" => "Kategorie"
    ];

    private static $summary_fields = [
        "ID" => "ID",
        "Title" => "Titel",
        "Summary" => "Kurzfassung",
        "Visible" => "Sichtbar"
    ];

    private static $searchable_fields = [
        "Title", "Description",
    ];

    private static $table_name = "News";

    private static $singular_name = "News";
    private static $plural_name = "News";

    private static $url_segment = "news";

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
        $holder = NewsPage::get()->sort("ID", "ASC")->First();
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
        $fields->dataFieldByName("Image")->setFolderName("news");
        return $fields;
    }

    public function CMSEditLink()
    {
        $admin = EventAdmin::singleton();
        $urlClass = str_replace('\\', '-', self::class);
        return $admin->Link("/{$urlClass}/EditForm/field/{$urlClass}/item/{$this->ID}/edit");
    }
}
