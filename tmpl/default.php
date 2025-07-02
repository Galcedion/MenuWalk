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
use Joomla\CMS\Factory;
if(strlen($g_mw_config['custom_css']) > 0) { // load custom CSS if set
	$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
	$wa->addInlineStyle($g_mw_config['custom_css']);
}
$align_content_map = ['top' => 'start', 'center' => 'center', 'bottom' => 'end'];
/* pre-build HTML from config */
$div_classlist = $g_mw_config['show_bootstrap'] ? 'class="col text-center"' : '';
$button_classlist = $g_mw_config['show_bootstrap'] && !$g_mw_config['show_bootstrap_pos'] ? 'class="btn btn-outline-info"' : '';
$button_styles = '';
if(array_key_exists($g_mw_config['vertical_align'], $align_content_map)) {
	$button_styles = ' style="align-content:' . $align_content_map[$g_mw_config['vertical_align']] . '"';
}
?>
<div class="<?=$main_class;?> <?=!$g_mw_config['show_bootstrap']?:'row';?>">
<div <?=$div_classlist;?><?=$button_styles;?>>
<?php if(in_array('first', $enabled_buttons) && isset($menu_elements['first'])): ?>
<a href="<?=$menu_elements['first']['url'];?>" <?=$button_classlist;?>><?=($g_mw_config['show_fontawesome'] ? '<i class="fa-solid fa-backward-step"></i> ' : '') . $menu_elements['first']['title'];?></a>
<?php endif; ?>
</div><div <?=$div_classlist;?><?=$button_styles;?>>
<?php if(in_array('prev', $enabled_buttons) && isset($menu_elements['prev'])): ?>
<a href="<?=$menu_elements['prev']['url'];?>" <?=$button_classlist;?>><?=($g_mw_config['show_fontawesome'] ? '<i class="fa-solid fa-chevron-left"></i> ' : '') . $menu_elements['prev']['title'];?></a>
<?php endif; ?>
</div><div <?=$div_classlist;?><?=$button_styles;?>>
<?php if(in_array('top', $enabled_buttons)): ?>
<?php $button_parent = $menu_elements['parent']['title']; ?>
<?php if($button_parent == '' && $g_mw_config['show_fontawesome']): ?>
<?php $button_parent = '<i class="fa-solid fa-chevron-up"></i>'; ?>
<?php elseif($g_mw_config['show_fontawesome']): ?>
<?php $button_parent = '<i class="fa-solid fa-chevron-up"></i> ' . $button_parent . ' <i class="fa-solid fa-chevron-up"></i>'; ?>
<?php endif; ?>
<a href="<?=$menu_elements['parent']['url'];?>" <?=$button_classlist;?><?=empty($button_parent) ? ' style="height:100%;"' : '';?>><?=$button_parent;?></a>
<?php endif; ?>
</div><div <?=$div_classlist;?><?=$button_styles;?>>
<?php if(in_array('next', $enabled_buttons) && isset($menu_elements['next'])): ?>
<a href="<?=$menu_elements['next']['url'];?>" <?=$button_classlist;?>><?=$menu_elements['next']['title'] . ($g_mw_config['show_fontawesome'] ? ' <i class="fa-solid fa-chevron-right"></i>' : '');?></a>
<?php endif; ?>
</div><div <?=$div_classlist;?><?=$button_styles;?>>
<?php if(in_array('last', $enabled_buttons) && isset($menu_elements['last'])): ?>
<a href="<?=$menu_elements['last']['url'];?>" <?=$button_classlist;?>><?=$menu_elements['last']['title'] . ($g_mw_config['show_fontawesome'] ? ' <i class="fa-solid fa-forward-step"></i>' : '');?></a>
<?php endif; ?>
</div>
</div>