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
 * @mixin \App\News\NewsPage dataRecord
 */
class NewsPageController extends PageController
{

    private static $allowed_actions = array (
        "view",
        'rss'
    );

    public function getNews()
    {
        $news = News::get();
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

    public function view()
    {
        $id = $this->getRequest()->param("ID");
        $article = News::get()->byId($id);
        return array(
            "News" => $article,
        );
    }

    public function init()
    {
        parent::init();

        RSSFeed::linkToFeed($this->Link("rss"), "Aktuelle News");
    }

    public function rss()
    {
        $rss = new RSSFeed(
            $this->LatestUpdates(),
            $this->Link(),
            "Aktuelle News",
            "Zeigt die aktuellen News aus dem Nordland-Park"
        );

        $rss->setTemplate('NewsRss');

        return $rss->outputToBrowser();
    }

    public function LatestUpdates()
    {
        return News::get()->sort("Date", "DESC")->limit(20);
    }
}
