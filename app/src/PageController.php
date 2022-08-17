<?php

namespace {

    use SilverStripe\Security\IdentityStore;

    use SilverStripe\Security\Security;
    use SilverStripe\Core\Injector\Injector;

    use SilverStripe\CMS\Controllers\ContentController;

    /**
 * Class \PageController
 *
 * @property \Page dataRecord
 * @method \Page data()
 * @mixin \Page
 */
    class PageController extends ContentController
    {
        private static $allowed_actions = [
            "logout"
        ];

        public function logout($request)
        {
            Injector::inst()->get(IdentityStore::class)->logOut($request);
            $this->redirect($this->Page("home")->Link());
        }

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }

        public function CurrentMember()
        {
            return Security::getCurrentUser();
        }
    }
}
