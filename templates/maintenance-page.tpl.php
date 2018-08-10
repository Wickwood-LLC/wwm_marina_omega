<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */
?>
    <!DOCTYPE html>
    <?php if (omega_extension_enabled('compatibility') && omega_theme_get_setting('omega_conditional_classes_html', TRUE)): ?>
    <!--[if IEMobile 7]><html class="ie iem7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
    <!--[if lte IE 6]><html class="ie lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
    <!--[if (IE 7)&(!IEMobile)]><html class="ie lt-ie9 lt-ie8" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
    <!--[if IE 8]><html class="ie lt-ie9" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
    <!--[if (gte IE 9)|(gt IEMobile 7)]><html class="ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
    <![if !IE]>
    <html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <![endif]>
    <?php else: ?>
    <html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <?php endif; ?>

    <head>
        <title>
            <?php print $head_title; ?>
        </title>
        <?php print $head; ?>
        <?php print $styles; ?>
        <?php print $scripts; ?>
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yesteryear:regular&amp;subset=latin" media="all">
    </head>
    <body<?php print $attributes;?>>
        <div class="l-page">
            <header id="header">
                <div class="header-inner">
                    <div class="l-region l-region--header">
                        <div id="block-panels-mini-header" class="block block--panels-mini  block-panels-mini-header contextual-links-region block--panels-mini-header">
                            <div class="block__content">
                                <div class="panel-display panel-3col-stacked clearfix" id="mini-panel-header">
                                    <div class="center-wrapper">
                                        <div class="panel-panel panel-col-first">
                                            <div class="inside">
                                                <div class="panel-pane pane-page-logo">
                                                    <?php if ($logo): ?>
                                                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo">
                                                        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-panel panel-col">
                                            <div class="inside">
                                                <?php if ($site_name): ?>
                                                <h1 class="pane-page-site-name">
                                                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                                                      </h1>
                                                <?php endif; ?>
                                                <?php if ($site_slogan): ?>
                                                <div class="pane-page-slogan">
                                                    <?php print $site_slogan; ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="panel-panel panel-col-last">
                                            <div class="inside">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-panel panel-col-bottom">
                                        <div class="inside">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="l-main">
                <div class="l-content" role="main">
                    <?php if ($title): ?>
                    <h1><?php print $title; ?></h1>
                    <?php endif; ?>
                    <?php print $messages; ?>
                    <?php print $content; ?>
                </div>
            </div>
            <footer class="l-footer" role="contentinfo">
                <?php print $footer; ?>
            </footer>
        </div>
        </body>

    </html>