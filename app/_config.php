<?php

use SilverStripe\i18n\i18n;
use SilverStripe\Admin\CMSMenu;
use SilverStripe\Security\Member;

use SilverStripe\Security\PasswordValidator;
use SilverStripe\View\Parsers\ShortcodeParser;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);
i18n::set_locale('de_DE');
\SilverStripe\ORM\Search\FulltextSearchable::enable();

$menuItems = array(
    'CMSPagesController',
    'AssetAdmin',
    'CMSSettingsController',
    'EventAdmin',
    'SecurityAdmin',
);

ShortcodeParser::get('default')->register('age', ['Page', 'AgeShortcode']);
