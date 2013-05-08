<?php

include_once(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/twitter_bootstrap.inc');
include_once(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/modules/theme.inc');
include_once(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/modules/pager.inc');
include_once(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/modules/form.inc');
include_once(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/modules/admin.inc');
include_once(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/modules/menu.inc');


// Load module include files
$modules = module_list();

foreach ($modules as $module) {
  if (is_file(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/modules/' . str_replace('_', '-', $module) . '.inc')) {
    include_once(drupal_get_path('theme', 'twitter_bootstrap') . '/includes/modules/' . str_replace('_', '-', $module) . '.inc');
  }    
}

/**
 * hook_theme() 
 */
function twitter_bootstrap_theme() {
  return array(
    'twitter_bootstrap_links' => array(
      'variables' => array('links' => array(), 'attributes' => array(), 'heading' => NULL),
    ),
    'twitter_bootstrap_btn_dropdown' => array(
      'variables' => array('links' => array(), 'attributes' => array(), 'type' => NULL),
    ), 
  );
}

function twitter_bootstrap_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $breadcrumbs = '<ul class="breadcrumb">';
    
    $count = count($breadcrumb) - 1;
    foreach($breadcrumb as $key => $value) {
      if($count != $key) {
        $breadcrumbs .= '<li>'.$value.'<span class="divider">/</span></li>';
      }else{
        $breadcrumbs .= '<li>'.$value.'</li>';
      }
    }
    $breadcrumbs .= '</ul>';
    
    return $breadcrumbs;
  }
}

/**
 * Preprocess variables for node.tpl.php
 *
 * @see node.tpl.php
 */
function twitter_bootstrap_preprocess_node(&$variables) {
  if($variables['teaser'])
    $variables['classes_array'][] = 'row-fluid';
}

/**
 * Preprocess variables for block.tpl.php
 *
 * @see block.tpl.php
 */
function twitter_bootstrap_preprocess_block(&$variables, $hook) {
  //$variables['classes_array'][] = 'row';
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__no_wrapper';
  }
  $variables['title_attributes_array']['class'][] = 'block-title';
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function twitter_bootstrap_process_block(&$variables, $hook) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;
}

/**
 * Preprocess variables for page.tpl.php
 *
 * @see page.tpl.php
 */
function twitter_bootstrap_preprocess_page(&$variables) {
  global $user;
  if ($user->uid == 0) {
    if(arg(0) == 'user' && (arg(1) == NULL || arg(1) == 'register' || arg(1) == 'password' || arg(1) == 'login') && $variables['user']->uid == 0) {
      $variables['theme_hook_suggestions'][] = 'page__login__section';
    }
  }
  // Add information about the number of sidebars.
  if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    $variables['columns'] = 3;
  }
  elseif (!empty($variables['page']['sidebar_first'])) {
    $variables['columns'] = 2;
  }
  elseif (!empty($variables['page']['sidebar_second'])) {
    $variables['columns'] = 2;
  }
  else {
    $variables['columns'] = 1;
  }
  
  // Our custom search because its cool :)
  $variables['search'] = FALSE;
  if(theme_get_setting('toggle_search') && module_exists('search'))
    $variables['search'] = drupal_get_form('_twitter_bootstrap_search_form');

  // Primary nav
  $variables['primary_nav'] = FALSE;
  if($variables['main_menu']) {
    // Build links
    $tree = menu_tree_page_data(variable_get('menu_main_links_source', 'main-menu'));
    $variables['main_menu'] = twitter_bootstrap_menu_navigation_links($tree);
    
    // Build list
    $variables['primary_nav'] = theme('twitter_bootstrap_links', array(
      'links' => $variables['main_menu'],
      'attributes' => array(
        'id' => 'main-menu',
        'class' => array('nav'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }
  
  // Secondary nav
  $variables['secondary_nav'] = FALSE;
  if($variables['secondary_menu']) {
    $secondary_menu = menu_load(variable_get('menu_secondary_links_source', 'user-menu'));
    
    // Build links
    $tree = menu_tree_page_data($secondary_menu['menu_name']);
    $variables['secondary_menu'] = twitter_bootstrap_menu_navigation_links($tree);
    
    // Build list
    $variables['secondary_nav'] = theme('twitter_bootstrap_btn_dropdown', array(
      'links' => $variables['secondary_menu'],
      'label' => $secondary_menu['title'],
      'type' => 'success',
      'attributes' => array(
        'id' => 'user-menu',
        'class' => array('pull-right'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }
  
  // Replace tabs with dropw down version
  //$variables['tabs']['#primary'] = _twitter_bootstrap_local_tasks($variables['tabs']['#primary']);

}

function _twitter_bootstrap_search_form($form, &$form_state) {
  // Get custom search form for now
  $form = search_form($form, $form_state);

  // Cleanup
  $form['#attributes']['class'][] = 'navbar-search';
  $form['#attributes']['class'][] = 'pull-left';
  $form['basic']['keys']['#title'] = '';
  $form['basic']['keys']['#attributes']['class'][] = 'search-query';
  $form['basic']['keys']['#attributes']['class'][] = 'span2';
  $form['basic']['keys']['#attributes']['placeholder'] = t('Search');
  unset($form['basic']['submit']);
  unset($form['basic']['#type']);
  unset($form['basic']['#attributes']);
  $form += $form['basic'];
  unset($form['basic']);

  return $form;
}



/**
 * Preprocess variables for region.tpl.php
 *
 * @see region.tpl.php
 */
function twitter_bootstrap_preprocess_region(&$variables, $hook) {
  if ($variables['region'] == 'content') {
    $variables['theme_hook_suggestions'][] = 'region__no_wrapper';
  }
  
  // Me likes
  if($variables['region'] == "sidebar_first")
    $variables['classes_array'][] = 'well';
}

/**
 * Returns the correct span class for a region
 */
function _twitter_bootstrap_content_span($columns = 1) {
  $class = FALSE;
  
  switch($columns) {
    case 1:
      $class = 'span12';
      break;
    case 2:
      $class = 'span9';
      break;
    case 3:
      $class = 'span6';
      break;
  }
  
  return $class;
}

/**
 * Returns HTML for a node preview for display during node creation and editing.
 *
 * @param $variables
 *   An associative array containing:
 *   - node: The node object which is being previewed.
 *
 * @ingroup themeable
 */
function twitter_bootstrap_node_preview($variables) {
  $node = $variables['node'];

  $output = '<div class="preview">';

  $preview_trimmed_version = FALSE;

  $elements = node_view(clone $node, 'teaser');
  $trimmed = drupal_render($elements);
  $elements = node_view($node, 'full');
  $full = drupal_render($elements);

  // Do we need to preview trimmed version of post as well as full version?
  if ($trimmed != $full) {
    // drupal_set_message(t('The trimmed version of your post shows what your post looks like when promoted to the main page or when exported for syndication.<span class="no-js"> You can insert the delimiter "&lt;!--break--&gt;" (without the quotes) to fine-tune where your post gets split.</span>'));
    // $output .= '<h3>' . t('Preview trimmed version') . '</h3>';
    // $output .= $trimmed;
    // $output .= '<h3>' . t('Preview full version') . '</h3>';
    $output .= $full;
  }
  else {
    $output .= $full;
  }
  $output .= "</div>\n";

  return $output;
}
