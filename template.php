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
    // Get node being displayed.
    $node = menu_get_object();
    if (in_array($node->type, array('article_post', 'panopoly_news_article', 'panopoly_faq', 'panopoly_page'))) {
      drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/articles_news_faq_nodes.css', array('group' => CSS_THEME));
    }
    else if ($node->type == 'press_release') {
      drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/press_release_nodes.css', array('group' => CSS_THEME));
    }
  }
  else if (arg(0) == 'categories') { // Categories view pages
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/categories_view.css', array('group' => CSS_THEME));
  }
  else if (arg(0) == 'taxonomy' && arg(1) == 'term' && preg_match('/^\d+$/', arg(2)) && empty(arg(3))) { // Categories term view pages
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/category_term_pages.css', array('group' => CSS_THEME));
  }
  else if (arg(0) == 'user') {
    // login and password reset pages.
    if ((arg(1) == 'login' || arg(1) == 'password')) {
      drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/login.css', array('group' => CSS_THEME));
    }
  }
  else if (arg(0) == 'admin') {	// admin pages
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/admin.css', array('group' => CSS_THEME));
  }
}

/**
 * Implements hook_preprocess_maintenance_page()
 */
function wwm_marina_omega_preprocess_maintenance_page() {	// maintenance page
  drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/maintenance.css', array('group' => CSS_THEME));
}

/**
 * Implements hook_form_BASE_FORM_ID_alter()
 */
function wwm_marina_omega_form_node_form_alter(&$form, &$form_state, $form_id) {
  $form['#attached']['css'][] = drupal_get_path('theme', 'wwm_marina_omega') . '/css/node_edit_forms.css';
}

/**
 * Implements hook_ctools_render_alter()
 */
function wwm_marina_omega_ctools_render_alter(&$info, &$page, &$context) {
  // Load homepage.css on panelizer page with "content-page-nodequeue" CSS class.
  if (!empty($info['classes_array']) && in_array('content-page-nodequeue', $info['classes_array'])) {
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/content_page_nodequeue_fields.css', array('group' => CSS_THEME));
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/content_page_nodequeue_teasers.css', array('group' => CSS_THEME));
  }
}

/**
 * Implements hook_views_pre_render()
 */
function wwm_marina_omega_views_pre_render(&$view) {
  dpm($views);
  if ($view->name == 'card_cycles') {
    drupal_add_css(drupal_get_path('theme', 'wwm_marina_omega') . '/css/view_card_cycles.css', array('group' => CSS_THEME));
  }
}
