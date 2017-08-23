<?php namespace Pixney\FiskeTheme;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Ui\ControlPanel\Component\Navigation\Event\SortNavigation;
use Illuminate\Pagination\AbstractPaginator;
use Pixney\FiskeTheme\Http\Controller\Admin\PreferencesController;
use Pixney\FiskeTheme\Http\Controller\Admin\SettingsController;
use Pixney\FiskeTheme\Listener\ApplySorting;

/**
 * Class FiskeThemeServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FiskeThemeServiceProvider extends AddonServiceProvider
{

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        SortNavigation::class => [
            ApplySorting::class,
        ],
    ];

    protected $overrides = [
        'module::admin/dashboards/dashboard' => "theme::overrides/dashboards/dashboard",
        'module::admin/dashboards/partials/columns' => "theme::overrides/dashboards/partials/columns",
        "anomaly.extension.xml_feed_widget::content" => "theme::overrides/dashboards/xml/content",
        //'anomalys.dashboard.module::admin/dashboards/dashboard' => "theme::overrides/dashboards/dashboard"
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/settings/themes/pixney.theme.fiske/navigation'    => SettingsController::class . '@navigation',
        'admin/preferences/themes/pixney.theme.fiske/navigation' => PreferencesController::class . '@navigation',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        AbstractPaginator::$defaultView       = 'pixney.theme.fiske::pagination/bootstrap-4';
        AbstractPaginator::$defaultSimpleView = 'streams::pagination/simple-bootstrap-4';
    }
}
