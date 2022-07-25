<?php
namespace App\Team;

use App\Team\Character;
use App\Team\TeamMember;
use SilverStripe\Admin\ModelAdmin;
use SilverStripe\Forms\GridField\GridField;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
/**
 * Class \App\Team\TeamAdmin
 *
 */
class TeamAdmin extends ModelAdmin {

    private static $managed_models = array (
        TeamMember::class,
        Character::class,
    );

    private static $url_segment = "team";

    private static $menu_title = "Team";

    private static $menu_icon = "app/client/icons/team.svg";

    public function init() {
        parent::init();
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // This check is simply to ensure you are on the managed model you want adjust accordingly
        if ($this->modelClass === MATestObject::class) {
            $gridField = $form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass));

            // This is just a precaution to ensure we got a GridField from dataFieldByName() which you should have
            if ($gridField instanceof GridField) {
                $gridField->getConfig()->addComponent(new GridFieldSortableRows('Importance'));
            }
        }

        return $form;
    }
}
