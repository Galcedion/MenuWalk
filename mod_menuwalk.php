<?php
/**
 * @version    1.0.0
 * @author     Galcedion https://galcedion.com
 * @copyright  Copyright (c) 2025 Galcedion
 * @license    GNU/GPL: https://gnu.org/licenses/gpl.html
 */
defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$main_class = $params->get('g_class');
$enabled_buttons = $params->get('enable_buttons');
$g_mw_config = [];
$g_mw_config['show_menu_count'] = ($params->get('enable_menu_count') == 1 ? true : false);
$g_mw_config['show_menu_title'] = ($params->get('enable_menu_title') == 1 ? true : false);
$g_mw_config['show_fontawesome'] = ($params->get('enable_fontawesome') == 1 ? true : false);
$g_mw_config['show_bootstrap'] = ($params->get('enable_bootstrap') == 1 ? true : false);
$g_mw_config['show_bootstrap_pos'] = ($params->get('enable_bootstrap_position_only') == 1 ? true : false);
$g_mw_config['custom_css'] = $params->get('custom_css') === null ? '' : trim($params->get('custom_css'));

$menu_elements = ModMenuWalk::get_menu_elements($g_mw_config);

require JModuleHelper::getLayoutPath('mod_menuwalk');