<?php

namespace App;

use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

/**
 * Class \App\CustomSiteConfig
 *
 * @property \SilverStripe\SiteConfig\SiteConfig|\App\CustomSiteConfig $owner
 * @property ?string $LinkTwitter
 * @property ?string $LinkYouTube
 * @property ?string $LinkInstagram
 * @property ?string $LinkDiscord
 * @property ?string $LinkGitHub
 * @property ?string $FooterText
 */
class CustomSiteConfig extends Extension
{

    private static $db = [
        'LinkTwitter' => 'Varchar(255)',
        'LinkYouTube' => 'Varchar(255)',
        'LinkInstagram' => 'Varchar(255)',
        'LinkDiscord' => 'Varchar(255)',
        'LinkGitHub' => 'Varchar(255)',
        'FooterText' => 'HTMLText'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab("Root.Main", new TextField("LinkTwitter", "Twitter"));
        $fields->addFieldToTab("Root.Main", new TextField("LinkYouTube", "YouTube"));
        $fields->addFieldToTab("Root.Main", new TextField("LinkInstagram", "Instagram"));
        $fields->addFieldToTab("Root.Main", new TextField("LinkDiscord", "Discord"));
        $fields->addFieldToTab("Root.Main", new TextField("LinkGitHub", "GitHub"));
    }
}
