<?php
/**
 * @package    Joomla.Site
 * @subpackage mod_menuwalk
 *
 * @author     Galcedion https://galcedion.com
 * @copyright  Copyright (c) 2025 Galcedion
 * @license    GNU/GPL: https://gnu.org/licenses/gpl.html
 */
defined('_JEXEC') or die;

/**
 * Helper class for the Module MenuWalk.
 */
class ModMenuWalk
{
	/**
	 * static function to retrieve the menu elements relevant to the current page
	 *
	 * @param associative array containing the module config
	 *
	 * @return associative array containing the requested menu elements
	 */
	public static function get_menu_elements($g_mw_config) {
		$menu_elements = [];
		$menu = JFactory::getApplication()->getMenu();
		$current = $menu->getActive(); // the current page's menu entry
		$tmp_parent = $menu->getItem($current->parent_id);
		$parent_level = $tmp_parent->level; // TODO: currently not needed
		$menu_elements['parent'] = ModMenuWalk::build_menu_element($tmp_parent, $g_mw_config);

		$menu_full = $menu->getItems(array(), array());

		$passed_current = false; // indicate passed current entry
		$reached_parent = false; // indicate when the parent entry is reached
		$entries = ['first' => null, 'prev' => null, 'next' => null, 'last' => null];
		$count = 0; // counter of menu item position

		for($i = 0; $i < count($menu_full); ++$i) { // iterate entire menu
			if($menu_full[$i]->id == $tmp_parent->id) { // reached the parent, the following entries are the menu to traverse
				$reached_parent = true;
			} elseif($reached_parent && $menu_full[$i]->level === $tmp_parent->level) { // exiting the child / neighbour scope
				break;
			} elseif($reached_parent && $menu_full[$i]->level == $tmp_parent->level + 1) { // only process direct children of parent
				++$count;
				if($current->id == $menu_full[$i]->id) {
					$passed_current = true;
					if($entries['first'] === null)
						$entries['first'] = false;
				} elseif(!$passed_current) {
					$entries['prev'] = ModMenuWalk::build_menu_element($menu_full[$i], $g_mw_config, $count);
					if($entries['first'] === null)
						$entries['first'] = ModMenuWalk::build_menu_element($menu_full[$i], $g_mw_config, $count);
				} elseif($passed_current) {
					$entries['last'] = ModMenuWalk::build_menu_element($menu_full[$i], $g_mw_config, $count);
					if($entries['next'] === null)
						$entries['next'] = ModMenuWalk::build_menu_element($menu_full[$i], $g_mw_config, $count);
				}
			}
		}
		// TODO: refactor?
		if($entries['first'] != null)
			$menu_elements['first'] = $entries['first'];
		if($entries['prev'] != null)
			$menu_elements['prev'] = $entries['prev'];
		if($entries['next'] != null)
			$menu_elements['next'] = $entries['next'];
		if($entries['last'] != null)
			$menu_elements['last'] = $entries['last'];

		return $menu_elements;
	}

	/**
	 * static function to create get the relevant parts of the menu element to display it
	 *
	 * @param Joomla Menu Item
	 * @param associative array containing the module config
	 * @param integer, default null
	 *
	 * @return associative array containing title and URL of the menu element
	 */
	private static function build_menu_element($menu_item, $g_mw_config, $count = null) {
		$separator = $count !== null && $g_mw_config['show_menu_count'] && $g_mw_config['show_menu_title'] ? ' - ' : '';
		$title = ($g_mw_config['show_menu_count'] ? strval($count) : '') . $separator . ($g_mw_config['show_menu_title'] ? $menu_item->title : '');
		return ['title' => $title, 'url' => JRoute::_($menu_item->link)];
	}
}