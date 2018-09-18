<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * WWM Marina Omega theme.
 */

function wwm_marina_omega_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (count($variables['breadcrumb']) > 1) {  // Only display the breadcrumb if there are more than one items in the trail
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    // Override Drupal core breadcrumb item imploding (no arrow).
    $output .= '<ul class="breadcrumb"><li>' . implode('</li> » <li>', $breadcrumb) . '</li></ul>';
    return $output;
  }
}

/**
 * Implements hook_preprocess_page()
 */
function wwm_marina_omega_preprocess_page() {
  if (in_array(arg(0), array('articles', 'news', 'press-releases', 'faqs'))) { // Panel pages
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/blog_pages.css', array('group' => CSS_THEME));
  }
  else if ((arg(0) == 'node' && preg_match('/^\d+$/', arg(1)) && empty(arg(2))) ) { // Node view page.
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/blog_pages.css', array('group' => CSS_THEME));
  }
  else if (arg(0) == 'user' && arg(1) == 'login') {
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/login.css', array('group' => CSS_THEME));
  }
}

/**
 * Implements hook_preprocess_maintenance_page()
 */
function wwm_marina_omega_preprocess_maintenance_page() {
  drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/maintenance.css', array('group' => CSS_THEME));
}
