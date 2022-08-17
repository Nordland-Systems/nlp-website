<?php
namespace App\Team;

use PageController;

/**
 * Class \App\Team\TeamOverviewController
 *
 * @property \App\Team\TeamOverview dataRecord
 * @method \App\Team\TeamOverview data()
 * @mixin \App\Team\TeamOverview
 */
class TeamOverviewController extends PageController {

    private static $allowed_actions = [
        "view",
    ];

    public function view()
    {
        $id = $this->getRequest()->param("ID");
        $deformatted = str_replace('_', ' ', $id);
        $article = TeamMember::get()->filter("Title", $deformatted)->first();
        return array(
            "TeamMember" => $article,
        );
    }

    public function getTeamMembers()
    {
        return TeamMember::get();
    }

    public function getMembers()
    {
        return TeamMember::get()->filter("Importance", "member");
    }

    public function getFounders()
    {
        return TeamMember::get()->filter("Importance", "founder");
    }

    public function getPartners()
    {
        return TeamMember::get()->filter("Importance", "partner");
    }

    public function getSource()
        {
            if (isset($_GET['source'])) {
                return $_GET['source'];
            } else {
                return $this->Link;
            }
        }
}
