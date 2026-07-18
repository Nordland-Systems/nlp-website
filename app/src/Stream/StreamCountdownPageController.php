<?php
namespace App\Stream;

use PageController;

/**
 * Class \App\Events\EventPageController
 *
 * @property StreamCountdownPage $dataRecord
 * @method StreamCountdownPage data()
 * @mixin StreamCountdownPage
 * @@property \App\Stream\StreamCountdownPage dataRecord
 */
class StreamCountdownPageController extends PageController
{
    private static $allowed_actions =  [
    ];
}
