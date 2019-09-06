<?php

/**
 * Implements hook_process_page().
 */
function wwm_marina_omega_process_page(&$variables) {
  // You can use process hooks to modify the variables before they are passed to
  // the theme function or template file.
}

function wwm_marina_omega_button($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'submit';
  element_set_attributes($element, array(
    'id',
    'name',
    'value',
  ));
  $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'form-button-disabled';
  }

  // if (strpos($variables['element']['#value'], 'edit')) {
  //   $variables['element']['#value'] = "&#xf044; " . $variables['element']['#value'];
  // }
  if ($element['#value'] == 'Edit selected') {
    $element['#value'] = "&#xf044; " . $variables['element']['#value'];
  }

  return '<input' . drupal_attributes($element['#attributes']) . ' />';

  dpm($variables);
}
