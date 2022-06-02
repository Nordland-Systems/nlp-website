<?php

namespace App\Attractions;

use SilverStripe\Assets\Image;
use SilverStripe\Security\Permission;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Elements\FaceItem
 *
 * @property string $Title
 * @property int $SortOrder
 * @property int $ParentID
 * @property int $ImageID
 * @method \App\Attractions\Attraction Parent()
 * @method \SilverStripe\Assets\Image Image()
 */
class AttractionImage extends DataObject {
    private static $db = [
        "Title" => "Varchar(255)",
        "SortOrder" => "Int",
    ];

    private static $has_one = [
        "Parent" => Attraction::class,
        "Image" => Image::class
    ];

    private static $owns = [
        "Image"
    ];

    private static $field_labels = [
        "Title" => "Überschrift",
        "Image" => "Bild"
    ];

    private static $default_sort = 'SortOrder ASC, ID ASC';

    private static $inline_editable = false;

    private static $summary_fields = [
        'ID' => 'ID',
        'CMSThumbnail' => 'Bild',
        'Title' => 'Titel'
    ];

    private static $searchable_fields = [
        "Title",
    ];

    private static $table_name = "AttractionImage";

    private static $singular_name = "Attraktionsbild";
    private static $plural_name = "Attraktionsbilder";


    // tidy up the CMS by not showing these fields
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","ParentID");
        $fields->removeFieldFromTab("Root.Main","SortOrder");
        return $fields;
    }

    // this function creates the thumbnail for the summary fields to use
    public function getCMSThumbnail() {
        if($image = $this->Image())
            return $image->CMSThumbnail();
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
