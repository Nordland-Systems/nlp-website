<?php

namespace App\Docs;

use Page;

/**
 * Class \App\Docs\DocsHolder
 *
 */
class DocsHolder extends Page
{
    private static $table_name = 'DocsHolder';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    public function getDocsCategories()
    {
        return DocsCategory::get()->sort('Title', 'ASC');
    }
}
