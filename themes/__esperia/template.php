<?php

/**
 * Add body classes if certain regions have content.
 */
function esperia_preprocess_html(&$variables)
{
	if (!empty($variables['page']['featured'])) {
		$variables['classes_array'][] = 'featured';
	}

	if (!empty($variables['page']['triptych_first'])
		|| !empty($variables['page']['triptych_middle'])
		|| !empty($variables['page']['triptych_last'])
	) {
		$variables['classes_array'][] = 'triptych';
	}

	if (!empty($variables['page']['footer_firstcolumn'])
		|| !empty($variables['page']['footer_secondcolumn'])
		|| !empty($variables['page']['footer_thirdcolumn'])
		|| !empty($variables['page']['footer_fourthcolumn'])
	) {
		$variables['classes_array'][] = 'footer-columns';
	}

	// Add conditional stylesheets for IE
	drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
	drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
	drupal_add_css('http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic', array('type' => 'external'));

	$viewport = array(
		'#tag' => 'meta',
		'#attributes' => array(
			'name' => 'viewport',
			'content' => 'initial-scale=1.0,maximum-scale=1.0,user-scalable=no',
		),
	);
	drupal_add_html_head($viewport, 'viewport');

}

/**
 * Override or insert variables into the page template for HTML output.
 */
function esperia_process_html(&$variables)
{
	// Hook into color.module.
	if (module_exists('color')) {
		_color_html_alter($variables);
	}
}

/**
 * Override or insert variables into the page template.
 */
function esperia_process_page(&$variables)
{
	// Hook into color.module.
	if (module_exists('color')) {
		_color_page_alter($variables);
	}
	// Always print the site name and slogan, but if they are toggled off, we'll
	// just hide them visually.
	$variables['hide_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
	$variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
	if ($variables['hide_site_name']) {
		// If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
		$variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
	}
	if ($variables['hide_site_slogan']) {
		// If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
		$variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
	}
	// Since the title and the shortcut link are both block level elements,
	// positioning them next to each other is much simpler with a wrapper div.
	if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
		// Add a wrapper div using the title_prefix and title_suffix render elements.
		$variables['title_prefix']['shortcut_wrapper'] = array(
			'#markup' => '<div class="shortcut-wrapper clearfix">',
			'#weight' => 100,
		);
		$variables['title_suffix']['shortcut_wrapper'] = array(
			'#markup' => '</div>',
			'#weight' => -99,
		);
		// Make sure the shortcut link is the first item in title_suffix.
		$variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
	}
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function esperia_preprocess_maintenance_page(&$variables)
{
	// By default, site_name is set to Drupal if no db connection is available
	// or during site installation. Setting site_name to an empty string makes
	// the site and update pages look cleaner.
	// @see template_preprocess_maintenance_page
	if (!$variables['db_is_active']) {
		$variables['site_name'] = '';
	}
	drupal_add_css(drupal_get_path('theme', 'esperia') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function esperia_process_maintenance_page(&$variables)
{
	// Always print the site name and slogan, but if they are toggled off, we'll
	// just hide them visually.
	$variables['hide_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
	$variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
	if ($variables['hide_site_name']) {
		// If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
		$variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
	}
	if ($variables['hide_site_slogan']) {
		// If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
		$variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
	}
}

/**
 * Override or insert variables into the node template.
 */
function esperia_preprocess_node(&$variables)
{
	if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
		$variables['classes_array'][] = 'node-full';
	}
}

/**
 * Override or insert variables into the block template.
 */
function esperia_preprocess_block(&$variables)
{
	// In the header region visually hide block titles.
	if ($variables['block']->region == 'header') {
		$variables['title_attributes_array']['class'][] = 'element-invisible';
	}
}

/**
 * Implements theme_menu_tree().
 */
function esperia_menu_tree($variables)
{
	return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function esperia_field__taxonomy_term_reference($variables)
{
	$output = '';

	// Render the label, if it's not hidden.
	if (!$variables['label_hidden']) {
		$output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
	}

	// Render the items.
	$output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
	foreach ($variables['items'] as $delta => $item) {
		$output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
	}
	$output .= '</ul>';

	// Render the top-level DIV.
	$output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] . '>' . $output . '</div>';

	return $output;
}

function esperia_links__system_main_menu($variables){
	$links = $variables['links'];
	$attributes = $variables['attributes'];
	$heading = $variables['heading'];
	global $language_url;
	$output = '';

	if (count($links) > 0) {
		// Treat the heading first if it is present to prepend it to the
		// list of links.
		if (!empty($heading)) {
			if (is_string($heading)) {
				// Prepare the array that will be used when the passed heading
				// is a string.
				$heading = array(
					'text' => $heading,
					// Set the default level of the heading.
					'level' => 'h2',
				);
			}
			$output .= '<' . $heading['level'];
			if (!empty($heading['class'])) {
				$output .= drupal_attributes(array('class' => $heading['class']));
			}
			$output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
		}

		$output .= '<ul' . drupal_attributes($attributes) . '>';

		$num_links = count($links);
		$i = 1;

		foreach ($links as $key => $link) {
			$subChild = sk_get_all_menu_node_children_ids($link['href']);
			$class = array($key);
			// Add first, last and active classes to the list of links to help out themers.
			$class[] = 'container3d relative f_xs_none m_xs_bottom_15';
			if ($i == 1) {
				$class[] = 'first';
			}
			if ($i == $num_links) {
				$class[] = 'last';
			}
			if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
				&& (empty($link['language']) || $link['language']->language == $language_url->language)
			) {
				$class[] = 'active current current-menu-item';
			}
			$output .= '<li' . drupal_attributes(array('class' => $class)) . '>';
			if (isset($link['href'])) {
				$wantsDark = isset($variables["attributes"]["id"]) ? "color_dark" : "color_light";
				$link["attributes"]["class"] = array($wantsDark . " fs_large relative r_xs_corners");
				// Pass in $link as $options, they share the same keys.
				$a = '<a href="' . $GLOBALS['base_path'] . drupal_get_path_alias($link['href']) . '">' . $link['title'] . '{ANCHOR}</a>';
				if($link['href'] == '<front>'){
					$a = '<a href="' . $GLOBALS['base_path'] . '">' . $link['title'] . '{ANCHOR}</a>';
				}
				if(sizeof($subChild) > 0){
					$a = '<a href="#">' . $link['title'] . '{ANCHOR}</a>';
					$output .= str_ireplace("{ANCHOR}", '<i class="icon-angle-right"></i>', $a);
				}else{
					$output .= str_ireplace("{ANCHOR}", '', $a);
				}
			} elseif (!empty($link['title'])) {
				// Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
				if (empty($link['html'])) {
					$link['title'] = check_plain($link['title']);
				}
				$span_attributes = '';
				if (isset($link['attributes'])) {
					$span_attributes = drupal_attributes($link['attributes']);
				}
				$output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
			}

			$i++;
			if(sizeof($subChild) > 0){
				$o = '<ul class="sub_menu r_xs_corners bg_light vr_list tr_all tr_xs_none trf_xs_none bs_xs_none d_xs_none">';
				$ls = '<li class="container3d relative"><a href="{URL}" class="d_block color_dark relative">{TITLE}';
				$ls .= '</a></li>';
				foreach ($subChild as $key => $l) {
					$el = str_ireplace("{TITLE}", $l['title'], $ls);
					$el = str_ireplace("{URL}", $GLOBALS['base_path'] . drupal_get_path_alias($l['href']), $el);
					$o .= $el;
				}
				$o .= '</ul>';
				$output .= $o;
			}

			$output .= "</li>\n";
		}

		$output .= '</ul>';
	}
	return $output;
}

function esperia_menu_breadcrumb_alter(&$active_trail, $item) {
	if (!drupal_is_front_page()) {
		$end = end($active_trail);
		if ($item['href'] == $end['href']) {
			$active_trail[] = $end;
		}
	}
}

function esperia_breadcrumb($variables){
	//color_grey_light_3 d_inline_m m_right_10
	if (count($variables['breadcrumb']) > 0) {
		$lastitem = sizeof($variables['breadcrumb']);
		$title = drupal_get_title();
		$crumbs = '<ul class="hr_list d_inline_m breadcrumbs">';
		$a = 1;
		foreach ($variables['breadcrumb'] as $value) {
			if ($a != $lastitem) {
				$crumbs .= '<li class="m_right_8 f_xs_none breadcrumb-' . $a . '">' . $value . ' ' . '<i class="icon-angle-right d_inline_m color_grey_light_3 fs_small"></i></li>';
				$a++;
			} else {
				$crumbs .= '<li class="m_right_8 f_xs_none breadcrumb-last">' . $value . '</li>';
			}
		}
		$crumbs .= '</ul>';
		return $crumbs;
	} else {
		return t("Home");
	}
}

function esperia_preprocess_page(&$variables) {
	drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' . path_to_theme() . '" });', 'inline');
}

function esperia_form_alter(&$variables) {
	if($variables["#attributes"]["class"][0] == "search-form"){
		$mainClass = $variables["basic"]["#attributes"]["class"];
		array_push($mainClass, "search-cont");
		$variables["basic"]["submit"]["#attributes"]["class"] = array("button_type_3 color_blue r_corners tt_uppercase fs_medium tr_all m_right_10 m_md_bottom_10");
	}
}


/**
 * Returns node ids of all the child items, including children of children
 * on all depth levels, of the given node path. Returns an empty array
 * if any error occurs.
 *
 * @param string $node_path
 * @return array
 */
function sk_get_all_menu_node_children_ids($node_path) {
	//Stop and return an empty array if node path is empty
	if(empty($node_path)) {
		return array();
	}

	//Init empty array to hold the results
	$nids = array();

	//Init parent keys. Check 'foreach' loop on parent keys for more info.
	$parent_keys = array('plid', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9');

	//Collect menu item corresponding to this path to begin updates.
	//Reference: http://stackoverflow.com/a/11615338/136696
	//Note: we couldn't find a way to get the sub-tree starting from this item
	//only and hence we had to get the whole menu tree built and then loop on
	//the current item part only. Not so bad considering that Drupal will
	//most probably have the whole menu cached anyway.
	$parent_menu_item = menu_link_get_preferred($node_path);

	//Stop and return empty array if a proper current menu item couldn't be found
	if(empty($parent_menu_item['menu_name']) || empty($parent_menu_item['mlid'])) {
		return array();
	}

	//Init parent item mlid for easier usage since now we know it's not empty
	$parent_menu_item_mlid = $parent_menu_item['mlid'];

	//Build whole menu based on the preferred menu_name gotten from this item
	$menu = menu_build_tree($parent_menu_item['menu_name']);

	//Reset menu cache since 'menu_build_tree' will cause trouble later on after
	//you call pathauto to update paths as it can only be called once.
	//Check: https://www.drupal.org/node/1697570
	menu_reset_static_cache();

	//Init processing array. This will hold menu items as we process them.
	$menu_items_to_process = array();

	//First run to fill up the processing array with the top level items
	foreach($menu as $top_level_menu_item) {
		$menu_items_to_process[] = $top_level_menu_item;
	}

	//While the processing array is not empty, keep looping into lower
	//menu items levels until all are processed.
	while(count($menu_items_to_process) > 0) {
		//Pop the top item from the processing array
		$mi = array_pop($menu_items_to_process);

		//Get its node id and add it to $nids if it's a current item child
		//Note that $parent_keys contains all keys that drupal uses to
		//set a menu item inside a tree up to 9 levels.
		foreach($parent_keys as $parent_key) {
			//First, ensure the current parent key is set and also mlid is set
			if(!empty($mi['link']['mlid']) && !empty($mi['link'][$parent_key])) {
				//If the link we're at is the parent one, don't add it to $nids
				//We need this check cause Drupal sets p1 to p9 in a way you
				//can easily use to generate breadcrumbs which means we will
				//also match the current parent, but here we only want children
				if($mi['link']['mlid'] != $parent_menu_item_mlid) {
					//Try to match the link to the parent menu item
					if($mi['link'][$parent_key] == $parent_menu_item_mlid) {
						//It's a child, add it to $nids and stop foreach loop.
						//Link_path has the path to the node. Example: node/63.
						if(!empty($mi['link']['link_path'])) {
							$arr = array();
							$arr['href'] = $mi['link']['link_path'];
							$arr['title'] = $mi['link']['title'];
							$nids[] = $arr;
							break;
						}
					}
				}
			}
		}

		//Add its child items, if any, to the processing array
		if(!empty($mi['below']) && is_array($mi['below'])) {
			foreach($mi['below'] as $child_menu_item) {
				//Add child item at the beginning of the array so that when
				//we get the list of node ids it's sorted by level with
				//the top level elements first; which is easy to attain
				//and also useful for some applications; why not do it.
				array_unshift($menu_items_to_process, $child_menu_item);
			}
		}
	}

	//Return
	return $nids;
}
