<?php
/**
 * @version    1.0.0
 * @author     Galcedion https://galcedion.com
 * @copyright  Copyright (c) 2025 Galcedion
 * @license    GNU/GPL: https://gnu.org/licenses/gpl.html
 */
defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$menu_elements = ModMenuWalk::get_menu_elements();

$main_class = $params->get('g_class');

require JModuleHelper::getLayoutPath('mod_menuwalk');