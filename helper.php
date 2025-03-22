<?php
/**
 * @version    1.0.0
 * @author     Galcedion https://galcedion.com
 * @copyright  Copyright (c) 2025 Galcedion
 * @license    GNU/GPL: https://gnu.org/licenses/gpl.html
 */
defined('_JEXEC') or die;

class ModMenuWalk
{
	public static function get_menu_elements() {
		$menu_elements = [];
		$menu = JFactory::getApplication()->getMenu();
		$current = $menu->getActive();
		$tmp_parent = $menu->getItem($current->parent_id);
		$parent_level = $tmp_parent->level;
		$menu_elements['parent'] = ['title' => $tmp_parent->title, 'url' => JRoute::_($tmp_parent->link)];

		$menu_full = $menu->getItems(array(), array());

		$passed_current = False; // indicate passed current entry
		$reached_parent = False;
		$entries = ['first' => Null, 'prev' => Null, 'next' => Null, 'last' => Null];

		for($i = 0; $i < count($menu_full); ++$i) {
			if($menu_full[$i]->id == $tmp_parent->id) { // reached the parent, the following entries are the menu to traverse
				$reached_parent = True;
			} elseif($reached_parent && $menu_full[$i]->level === $tmp_parent->level) { // exiting the child / neighbour scope
				break;
			} elseif($reached_parent && $menu_full[$i]->level == $tmp_parent->level + 1) { // only process direct children of parent
				if($current->id == $menu_full[$i]->id) {
					$passed_current = True;
					if($entries['first'] === Null)
						$entries['first'] = False;
				} elseif(!$passed_current) {
					$entries['prev'] = $menu_full[$i];
					if($entries['first'] === Null)
						$entries['first'] = $menu_full[$i];
				} elseif($passed_current) {
					$entries['last'] = $menu_full[$i];
					if($entries['next'] === Null)
						$entries['next'] = $menu_full[$i];
				}
			}
		}
		if($entries['first'] != NUll)
			$menu_elements['first'] = ['title' => $entries['first']->title, 'url' => JRoute::_($entries['first']->link)];
		if($entries['prev'] != NUll)
			$menu_elements['prev'] = ['title' => $entries['prev']->title, 'url' => JRoute::_($entries['prev']->link)];
		if($entries['next'] != Null)
			$menu_elements['next'] = ['title' => $entries['next']->title, 'url' => JRoute::_($entries['next']->link)];
		if($entries['last'] != Null)
			$menu_elements['last'] = ['title' => $entries['last']->title, 'url' => JRoute::_($entries['last']->link)];

		return $menu_elements;
	}
}