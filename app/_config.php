<?php

use SilverStripe\i18n\i18n;
use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;

use SilverStripe\CampaignAdmin\CampaignAdmin;
use SilverStripe\Admin\CMSMenu;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);
i18n::set_locale('de_DE');
\SilverStripe\ORM\Search\FulltextSearchable::enable();

//CMSMenu::remove_menu_class(CampaignAdmin::class);

$menuItems = array(
    'CMSPagesController',
    'AssetAdmin',
    'CMSSettingsController',
    'EventAdmin',
    'SecurityAdmin',
);
