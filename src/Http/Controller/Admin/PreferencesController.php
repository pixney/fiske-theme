<?php namespace Pixney\FiskeTheme\Http\Controller\Admin;

use Anomaly\PreferencesModule\Preference\Contract\PreferenceRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Support\Facades\Log;

/**
 * Class PreferencesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PreferencesController extends AdminController
{

    /**
     * Save the navigation order.
     *
     * @param PreferenceRepositoryInterface $preferences
     */
    public function navigation(PreferenceRepositoryInterface $preferences)
    {	
        $preferences->set('pixney.theme.fiske::navigation', serialize($this->request->get('navigation')));
    }
}
