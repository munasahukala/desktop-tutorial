<!doctype html>
<html {!! Theme::htmlAttributes() !!} }>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>

    {!! BaseHelper::googleFonts('https://fonts.googleapis.com/css2?family=' . urlencode(theme_option('primary_font', 'Roboto Condensed')) . ':wght@300;400;700&display=swap') !!}

    <style>
        :root {
            --color-1st: {{ theme_option('primary_color', '#aa0909') }};
            --primary-color: {{ theme_option('primary_color', '#aa0909') }};
            --primary-font: '{{ theme_option('primary_font', 'Roboto Condensed') }}', sans-serif;
        }
    </style>

    {!! Theme::header() !!}
</head>
<body {!! Theme::bodyAttributes() !!}>
{!! apply_filters(THEME_FRONT_BODY, null) !!}
<header class="header">
    <section class="header-menu-top">
        <section class="container">
            <section class="header-menu-top-left fleft">
                {!!
                    Menu::renderMenuLocation('header-menu', [
                        'options' => ['id' => 'menu-header-top-menu', 'class' => 'menu'],
                        'theme'   => true,
                        'view'    => 'menu',
                    ])
                !!}
            </section><!-- end .header-menu-top-left -->
            <section class="header-menu-top-right header-social fright">
                <div class="language-wrapper">
                    {!! apply_filters('language_switcher') !!}
                </div>
            </section><!-- end .header-menu-top-right -->
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section><!-- end .header-menu-top -->
    <section class="header-top">
        <section class="container">
            <h1 class="logo fleft">
                <a href="{{ route('public.single') }}" title="{{ theme_option('site_title') }}">
                    @if (!theme_option('logo'))
                        <span>Lara</span>Mag
                    @else
                        <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}" title="{{ theme_option('site_title') }}"/>
                    @endif
                </a>
            </h1><!-- end .logo -->
            @if (is_plugin_active('ads'))
                <section class="header-banner" style="height: 90px; overflow: hidden">
                    {!! AdsManager::display('header') !!}
                </section><!-- end .header-banner -->
            @endif
        </section><!-- end .container -->
    </section><!-- end .header-right-top -->
    <section class="header-bottom">
        <section class="container">
            <a class="icon-home fleft icon-home-active icon-home-active" href="{{ route('public.single') }}" title="Homepage"></a>
            <section class="collap-main-nav fleft">
                <img src="{{ Theme::asset()->url('images/icon/collapse.png') }}" alt="collapse"/>
            </section>
            <section class="main-nav fleft">
                <section class="main-nav-inner tf">
                    <section class="close-nav">
                        <i class="fa fa-times" aria-hidden="true"></i> {{ __('Close menu') }}
                    </section><!-- end .close nav -->
                    {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => ['id' => 'menu-header-main-menu', 'class' => 'menu'],
                            'theme'   => true,
                            'view'    => 'menu',
                        ])
                    !!}
                </section><!-- end .main-nav-inner -->
            </section><!-- end .main-nav -->
            <a href="#" class="search-btn" title="search" @if (!Menu::isLocationHasMenu('second-menu')) style="margin-right: 0;" @endif><i class="fa fa-search"></i></a>
            @if (Menu::isLocationHasMenu('second-menu'))
                <section class="collap-nav-second bsize">
                    ...
                    {!!
                        Menu::renderMenuLocation('second-menu', [
                            'options' => ['id' => 'menu-header-second-menu', 'class' => 'menu'],
                            'theme' => true,
                        ])
                    !!}
                </section><!-- end .collap-nav-second -->
            @endif
            <section class="cboth"></section><!-- end .cboth -->
        </section><!-- end .container -->
    </section><!-- end .header-bottom -->
</header><!-- end .header -->

@if (is_plugin_active('blog'))
    <div class="super-search hide">
        <form class="quick-search" action="{{ route('public.search') }}">
            <input type="text" name="q" placeholder="{{ __('Type to search...') }}" class="form-control search-input" autocomplete="off">
            <span class="search-btn" title="search">&times;</span>
        </form>
        <div class="search-result"></div>
    </div>
@endif
