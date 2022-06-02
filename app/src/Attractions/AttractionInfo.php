<?php

namespace App\Attractions;

use SilverStripe\Security\Permission;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Elements\FaceItem
 *
 * @property string $InfoTitle
 * @property string $InfoContent
 * @property int $ParentID
 * @method \App\Attractions\Attraction Parent()
 */
class AttractionInfo extends DataObject {
    private static $db = [
        "InfoTitle" => "Varchar(255)",
        "InfoContent" => "HTMLText",
    ];

    private static $has_one = [
        "Parent" => Attraction::class
    ];

    private static $field_labels = [
        "InfoTitle" => "Titel",
        "InfoContent" => "Inhalt",
    ];

    private static $default_sort = 'SortOrder ASC, ID ASC';

    private static $inline_editable = false;

    private static $summary_fields = [
        'ID' => 'ID',
        'InfoTitle' => 'Titel',
    ];

    private static $searchable_fields = [
        "InfoTitle",
        "InfoContent",
    ];

    private static $table_name = "AttractionInfo";

    private static $singular_name = "Attraktionsinfo";
    private static $plural_name = "Attraktionsinfos";


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
