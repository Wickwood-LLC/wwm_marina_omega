<?php
/**
 * @file
 * Fusion theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php. Some may be left
 * blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 */
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>

<body class="<?php print $classes; ?>">
  <div id="page" class="page">
    <div id="page-inner" class="page-inner">

      <!-- header-group region: width = grid_width -->
      <div id="header-group-wrapper" class="header-group-wrapper full-width">
        <div id="header-group" class="header-group region <?php print $grid_width; ?>">
          <div id="header-group-inner" class="header-group-inner inner">
            <?php if ($logo || $site_name || $site_slogan): ?>
            <div id="header-site-info" class="header-site-info block">
              <div id="header-site-info-inner" class="header-site-info-inner inner">
                <?php if ($site_name || $site_slogan): ?>
                  <?php if ($logo): ?>
                    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
                  <?php endif; ?>

                  <?php if ($site_name): ?>
                    <h1 class="site-name">
                      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    </h1>
                  <?php endif; ?>

                  <?php if ($site_slogan): ?>
                    <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
                  <?php endif; ?>
                <?php endif; ?>
              </div><!-- /header-site-info-inner -->
            </div><!-- /header-site-info -->
            <?php endif; ?>
          </div><!-- /header-group-inner -->
        </div><!-- /header-group -->
      </div><!-- /header-group-wrapper -->

      <div class="preface-top-outer"><?php print render($page['preface_top']); ?></div>

      <!-- main region: width = grid_width -->
      <div id="main-wrapper" class="main-wrapper full-width">
        <div id="main" class="main region <?php print $grid_width; ?>">
          <div id="main-inner" class="main-inner inner">
            <div id="content-region" class="content-region region nested">
              <div id="content-region-inner" class="content-region-inner inner">
                <a id="main-content-area"></a>
                <div id="content-inner" class="content-inner block">
                  <div id="content-inner-inner" class="content-inner-inner inner">
                    <?php if ($title): ?>
                    <h1 class="title"><?php print $title; ?></h1>
                    <?php endif; ?>
                    <?php if ($content): ?>
                    <div id="content-content" class="content-content">
                      <?php print $content; ?>
                    </div><!-- /content-content -->
                    <?php endif; ?>
                  </div><!-- /content-inner-inner -->
                </div><!-- /content-inner -->
              </div><!-- /content-region-inner -->
            </div><!-- /content-region -->
          </div><!-- /main-inner -->
        </div><!-- /main -->
      </div><!-- /main-wrapper -->

    </div><!-- /page-inner -->
  </div><!-- /page -->
</body>
</html>
