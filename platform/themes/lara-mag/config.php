<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Shortcode\View\View;
use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be overridden by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function (Theme $theme) {
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme) {
            // You may use this event to set up your assets.

            $version = get_cms_version();

            $theme
                ->asset()
                ->usePath()
                ->add('lara-mag-css', 'css/lara-mag.css', [], [], $version);

            if (BaseHelper::isRtlEnabled()) {
                $theme
                    ->asset()
                    ->usePath()
                    ->add('rtl-css', 'css/rtl.css', [], [], $version);
            }

            $theme
                ->asset()
                ->container('footer')
                ->usePath()
                ->add('lara-mag-js', 'js/lara-mag.js', [], [], $version);

            if (function_exists('shortcode')) {
                $theme->composer(
                    ['page', 'post', 'category', 'tag', 'gallery'],
                    function (View $view) {
                        $view->withShortcodes();
                    }
                );
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function (Theme $theme) {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            },
        ],
    ],
];
