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
        $id = $this->getRequest()->param("ID");
        $deformatted = str_replace('_', ' ', $id);
        $deformatted = str_replace('%ae', 'ä', $deformatted);
        $deformatted = str_replace('%oe', 'ö', $deformatted);
        $deformatted = str_replace('%ue', 'ü', $deformatted);
        $article = Docs::get()->filter("Title", $deformatted)->first();
        return array(
            "Doc" => $article,
            "OtherDocs" => Docs::get()->exclude("ID", $id),
        );
    }

    public function area()
    {
        $id = $this->getRequest()->param("ID");
        $deformatted = str_replace('_', ' ', $id);
        $article = DocsArea::get()->filter("Title", $deformatted)->first();
        return array(
            "Area" => $article,
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
        $id = $this->getRequest()->param("ID");
        $deformatted = str_replace('_', ' ', $id);
        $article = DocsAttraction::get()->filter("Title", $deformatted)->first();
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
