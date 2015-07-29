<?php
/**
 * @file
 * Theme functions
 */

require_once dirname(__FILE__) . '/includes/structure.inc';
require_once dirname(__FILE__) . '/includes/comment.inc';
require_once dirname(__FILE__) . '/includes/form.inc';
require_once dirname(__FILE__) . '/includes/menu.inc';
require_once dirname(__FILE__) . '/includes/node.inc';
require_once dirname(__FILE__) . '/includes/panel.inc';
require_once dirname(__FILE__) . '/includes/user.inc';
require_once dirname(__FILE__) . '/includes/view.inc';

/**
 * Implements hook_css_alter().
 */
function ketsjup_css_alter(&$css) {
  $radix_path = drupal_get_path('theme', 'radix');

  // Radix now includes compiled stylesheets for demo purposes.
  // We remove these from our subtheme since they are already included 
  // in compass_radix.
  unset($css[$radix_path . '/assets/stylesheets/radix-style.css']);
  unset($css[$radix_path . '/assets/stylesheets/radix-print.css']);
}

/**
 * Implements template_preprocess_page().
 */
function ketsjup_preprocess_page(&$variables) {
  // Add copyright to theme.
  if ($copyright = theme_get_setting('copyright')) {
    $variables['copyright'] = check_markup($copyright['value'], $copyright['format']);
  }

  // Format and add main menu to theme.
  $main_menu_data = menu_build_tree(variable_get('menu_main_links_source', 'main-menu'), array(
    'min_depth' => 1,
    'max_depth' => 4,
  ));
  $variables['main_menu'] = menu_tree_output($main_menu_data);
  $variables['main_menu']['#theme_wrappers'] = array();


  // Footer links.
  $links = array(
    'facebook' => array(
      'title' => t('Vi er på Facebook'),
      'sub_title' => t('Synes godt om'),
      'href' => 'http://facebook.com/vejleidraetsefterskole',
      'icon' => 'facebook',
    ),
    'instagram' => array(
      'title' => t('Se os på Instagram'),
      'sub_title' => t('#ikkhårdtnok'),
      'href' => 'http://instagram.com/viesdk',
      'icon' => 'instagram',
    ),
    'twitter' => array(
      'title' => t('Følg os på Twitter'),
      'sub_title' => t('Med på det nyeste'),
      'href' => 'http://twitter.com/ViesTwit',
      'icon' => 'twitter',
    ),
    'contact' => array(
      'title' => t('Skriv eller ring +45 75820811'),
      'sub_title' => t('Kom i kontakt'),
      'href' => 'kontakt',
      'icon' => 'envelope',
    ),
  );

  $footer_links = '<div class="footer-links row-fluid">';
  foreach ($links as $link) {
    $title = $link['title'];
    $href = '';

    $options = array();
    $options['html'] = TRUE;
    if (isset($link['href'])) {
      $href = $link['href'];
    }
    else {
      $options['fragment'] = FALSE;
      $options['absolute'] = TRUE;
    }

    $icon = isset($link['icon']) ? $link['icon'] : '';
    $title .= '<i class="fa fa-' . $icon . '"></i>';

    $footer_links .= '<div class="col-md-3">';
    $footer_links .= '<h4>' . $link['sub_title'] . '</h4>';
    $footer_links .= '<h3>' . l($title, $href, $options) . '</h3>';
    $footer_links .= '</div>';
  }
  $footer_links .= '</div>';

  $variables['footer_links'] = $footer_links;
}

/**
 * Adds theme hook suggestions.
 *
 * Implements hook_preprocess_node().
 */
function ketsjup_preprocess_node(&$vars) {
    if ($vars['view_mode'] == 'teaser') {
        $vars['theme_hook_suggestions'][] = 'node__' . $vars['node']->type . '__teaser';
    }
}
