<?php
namespace App\Docs;

use Dompdf\Dompdf;
use Dompdf\Options;
use PageController;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\PasswordField;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;

/**
 * Class \App\Docs\DocsPageController
 *
 * @property \App\Docs\DocsOverview dataRecord
 * @method \App\Docs\DocsOverview data()
 * @mixin \App\Docs\DocsOverview
 */
class DocsOverviewController extends PageController implements PermissionProvider
{

    private static $allowed_actions = [
        "PasswordForm",
        "logout",
        "view",
        "pdf",
        "category",
        "attraction",
        "area",
        "targetgroup",
        "restaurant",
        "character"
    ];

    public function PasswordForm()
    {
        $fields = new FieldList(
            new PasswordField('Password', 'Passwort')
        );
        $actions = new FieldList(
            new FormAction('login', 'Einloggen')
        );
        $form = Form::create($this->owner, 'PasswordForm', $fields, $actions);
        return $form;
    }

    public function login($data, $form)
    {
        $session = $this->getRequest()->getSession();
        $session->set("PWD" . $this->URLSegment, $data["Password"]);
        return $this->redirect($this->Link());
    }

    public function logout($request)
    {
        $session = $this->getRequest()->getSession();
        $session->set("PWD" . $this->URLSegment, "");
        return $this->redirect($this->Link());
    }

    public function view()
    {
        $title = $this->getRequest()->param("ID");
        $article = Docs::get()->filter("LinkTitle", $title)->first();
        return array(
            "Doc" => $article
        );
    }

    public function area()
    {
        $title = $this->getRequest()->param("ID");
        $article = DocsArea::get()->filter("LinkTitle", $title)->first();
        return array(
            "Area" => $article,
        );
    }

    public function character()
    {
        $title = $this->getRequest()->param("ID");
        $article = DocsCharacter::get()->filter("LinkTitle", $title)->first();
        return array(
            "Character" => $article,
        );
    }

    public function targetgroup()
    {
        $id = $this->getRequest()->param("ID");
        $deformatted = str_replace('_', ' ', $id);
        $article = DocsTargetgroup::get()->filter("Title", $deformatted)->first();
        return array(
            "Targetgroup" => $article,
        );
    }

    public function restaurant()
    {
        $title = $this->getRequest()->param("ID");
        $article = DocsRestaurant::get()->filter("LinkTitle", $title)->first();
        return array(
            "Restaurant" => $article,
        );
    }

    public function pdf()
    {
        $id = $this->getRequest()->param("ID");
        $deformatted = str_replace('_', ' ', $id);
        $article = Docs::get()->filter("Title", $deformatted)->first();

        //Generate PDF:
        $options = new Options();
        $options->set('defaultFont', 'Metropolis');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml('
        <h1>' . $article->Title . '</h1>' . $article->Description);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        $now = date("d.m.Y");
        // Output the generated PDF to Browser
        $dompdf->stream('doc-' . $article->ID . '_' . $article->Title . '_' . $now . '.pdf');
    }

    public function category()
    {
        $id = $this->getRequest()->param("ID");
        $article = DocsCategory::get()->byId($id);
        return array(
            "Category" => $article,
        );
    }

    public function attraction()
    {
        $title = $this->getRequest()->param("ID");
        $article = DocsAttraction::get()->filter("LinkTitle", $title)->first();
        return array(
            "Attraction" => $article,
        );
    }

    public function getDocsCategories()
    {
        return DocsCategory::get()->sort('Title', 'ASC');
    }

    public function getAttractions()
    {
        return DocsAttraction::get();
    }

    public function getAreas()
    {
        return DocsArea::get();
    }

    public function getCharacters()
    {
        return DocsCharacter::get();
    }

    public function getRestaurants()
    {
        return DocsRestaurant::get();
    }

    public function getTargetgroups()
    {
        return DocsTargetgroup::get();
    }

    public function getDocs()
    {
        return Docs::get();
    }

    public function getCategory()
    {
        $id = $this->getRequest()->param("ID");
        $article = DocsCategory::get()->byId($id);
        return array(
            "DocCategory" => $article,
        );
    }

    public function checkLogin()
    {
        $session = $this->getRequest()->getSession();
        if ($session->get("PWD" . $this->URLSegment) == $this->Password) {
            return true;
        } else {
            return false;
        }
    }

    public function providePermissions()
    {
        return [
            'VIEW_DOCS' => 'Access Docs'
        ];
    }

    public function getDocsPermission()
    {
        return Permission::check("VIEW_DOCS");
    }
}
