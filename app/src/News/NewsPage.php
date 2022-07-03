<?php
namespace App\News;

use Page;
use SilverStripe\Forms\TextField;

/**
 * Class \App\Docs\DocsPage
 *
 * @property string $YoutubeLink
 */
class NewsPage extends Page {
    private static $db = [
        "YoutubeLink" => "Varchar(255)"
    ];

    private static $table_name = "App_News_NewsPage";

    public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab("Root.Seiteneinstellungen", new TextField("YoutubeLink", "Youtube-Link"));
            return $fields;
        }
}
