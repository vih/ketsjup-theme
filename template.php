<?php

/**
 * @file
 * Theme functions
 */

/**
 * Implements template_preprocess_page().
 */
function ketsjup_preprocess_page(&$variables) {
  // footer links

    $links = array(
      'facebook' => array(
        'title' => t('Vi er på Facebook'),
        'sub_title' => t('Synes godt om'),
        'href' => 'http://facebook.com/vejleidraetsefterskole',
        'icon' => 'icon-facebook',
      ),
      'instagram' => array(
        'title' => t('Se os på Instagram'),
        'sub_title' => t('#ikkhårdtnok'),
        'href' => 'http://instagram.com/viesdk',
        'icon' => 'icon-instagram',
      ),
      'twitter' => array(
        'title' => t('Følg os på Twitter'),
        'sub_title' => t('Med på det nyeste'),
        'href' => 'http://twitter.com/ViesTwit',
        'icon' => 'icon-twitter',
      ),
      'contact' => array(
        'title' => t('Skriv eller ring +45 75820811'),
        'sub_title' => t('Kom i kontakt'),
        'href' => 'kontakt',
        'icon' => 'icon-envelope',
      ),
      /*
      'phone' => array(
        'title' => '+45 75820811',
        'sub_title' => t('Tal med os'),
        'icon' => 'icon-phone',
        'href' => 'kontakt',
      ),
      */
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
      $title .=  '<i class="' . $icon . '"></i>';

      $footer_links .= '<div class="span3">';
      $footer_links .= '<h4>' . $link['sub_title'] . '</h4>';
      $footer_links .= '<h3>' . l($title, $href, $options) . '</h3>';
      $footer_links .= '</div>';  
    }
    $footer_links .= '</div>';

    $variables['footer_links'] = $footer_links;
}