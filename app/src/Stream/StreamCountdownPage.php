<?php
namespace App\Stream;

use StreamPage;

/**
 * Class \App\Docs\DocsPage
 *
 */
class StreamCountdownPage extends StreamPage
{
    private static $db = [
    ];

    private static $has_one = [
    ];

    private static $table_name = "App_Stream_StreamCountdownPage";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
