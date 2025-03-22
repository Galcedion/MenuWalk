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
		
		$submenu = False;
		
		$aft_mode = False;
		$reached_parent = False;
		
		$prev = Null;
		$next = Null;
		
		for($i = 0; $i < count($menu_full); ++$i) {
			if($menu_full[$i]->id == $tmp_parent->id) {
				$submenu = $tmp_parent->level;
				$reached_parent = True;
				continue;
			} elseif($menu_full[$i]->level === $submenu) {
				break;
			}
			if($reached_parent && $menu_full[$i]->level == $submenu + 1) {
				if($current->id == $menu_full[$i]->id)
					$aft_mode = True;
				elseif(!$aft_mode)
					$prev = $menu_full[$i];
				else {
					$next = $menu_full[$i];
					break;
				}
			}
		}
		if($prev != NUll)
			$menu_elements['prev'] = ['title' => $prev->title, 'url' => JRoute::_($prev->link)];
		if($next != Null)
			$menu_elements['next'] = ['title' => $next->title, 'url' => JRoute::_($next->link)];
		
		return $menu_elements;
	}
}