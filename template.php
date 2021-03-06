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