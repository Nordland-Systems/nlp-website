<?php
namespace App\News;

use App\News\News;
use PageController;
use App\Events\Event;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\RSS\RSSFeed;

/**
 * Class \App\Events\EventPageController
 *
 * @property \App\News\NewsPage dataRecord
 * @method \App\News\NewsPage data()
 * @mixin \App\News\NewsPage
 */
class NewsPageController extends PageController
{

    private static $allowed_actions = array (
        "post",
        'rss'
    );

    public function getNews()
    {
        $now = date("Y-m-d H:i:s");
        $news = News::get()->filter(array(
            "Date:LessThan" => $now,
            "Visible" => true
        ))->sort("Date", "DESC");
        $pagelist = new PaginatedList($news, $this->request);
        $pagelist->setPageLength(10);
        return $pagelist;
    }

    public function getEvents()
    {
        $news = Event::get();
        $pagelist = new PaginatedList($news, $this->request);
        $pagelist->setPageLength(3);
        return $pagelist;
    }

    public function getFutureEvents()
    {
        $today = date("Y-m-d H:i:s", strtotime('-3 hours'));
        $events = Event::get()
            ->filterAny(['Start:GreaterThanOrEqual' => $today,
            "End:GreaterThanOrEqual" =>  $today])
            ->sort('Start ASC');
        $pagelist = new PaginatedList($events, $this->request);
        $pagelist->setPageLength(3);
        return $pagelist;
    }

    public function post()
    {
        $title = $this->getRequest()->param("ID");
        $article = News::get()->filter("LinkTitle", $title)->first();

        return array(
            "News" => $article,
        );
    }

    public function init()
    {
        parent::init();

        RSSFeed::linkToFeed($this->Link("rss"), "Nordland-Park News");
    }

    public function rss()
    {
        $rss = new RSSFeed(
            $this->LatestUpdates(),
            $this->Link(),
            "Nordland-Park News",
            "Alles Aktuelle aus dem Nordland-Park"
        );

        $rss->setTemplate('NewsRSS');

        return $rss->outputToBrowser();
    }

    public function LatestUpdates()
    {
        $now = date("Y-m-d H:i:s");
        return News::get()->filter(array(
            "Date:LessThan" => $now,
            "Visible" => true
        ))->sort("Date", "DESC")->limit(20);
    }
}
