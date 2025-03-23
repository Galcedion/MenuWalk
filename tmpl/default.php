<?php
/**
 * @version    1.0.0
 * @author     Galcedion https://galcedion.com
 * @copyright  Copyright (c) 2025 Galcedion
 * @license    GNU/GPL: https://gnu.org/licenses/gpl.html
 */
defined('_JEXEC') or die;
$button_classlist = $g_mw_config['show_bootstrap'] ? 'class="btn btn-outline-info"' : '';
$fa_first = $g_mw_config['show_fontawesome'] ? '<i class="fa-solid fa-backward-step"></i>' : '';
$fa_prev = $g_mw_config['show_fontawesome'] ? '<i class="fa-solid fa-backward"></i>' : '';
$fa_parent = $g_mw_config['show_fontawesome'] ? '<i class="fa-solid fa-eject"></i>' : '';
$fa_next = $g_mw_config['show_fontawesome'] ? '<i class="fa-solid fa-forward"></i>' : '';
$fa_last = $g_mw_config['show_fontawesome'] ? '<i class="fa-solid fa-forward-step"></i>' : '';
?>
<div class="<?=$main_class;?> <?=!$g_mw_config['show_bootstrap']?:'row';?>">
<div class="<?=!$g_mw_config['show_bootstrap']?:'col';?>">
<?php if(in_array('first', $enabled_buttons) && isset($menu_elements['first'])): ?>
<a href="<?=$menu_elements['first']['url'];?>" <?=$button_classlist;?>><?=$fa_first;?> <?=$menu_elements['first']['title'];?></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('prev', $enabled_buttons) && isset($menu_elements['prev'])): ?>
<a href="<?=$menu_elements['prev']['url'];?>" <?=$button_classlist;?>><?=$fa_prev;?> <?=$menu_elements['prev']['title'];?></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('top', $enabled_buttons)): ?>
<a href="<?=$menu_elements['parent']['url'];?>" <?=$button_classlist;?>><?=$fa_parent;?> <?=$menu_elements['parent']['title'];?> <?=$fa_parent;?></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('next', $enabled_buttons) && isset($menu_elements['next'])): ?>
<a href="<?=$menu_elements['next']['url'];?>" <?=$button_classlist;?>><?=$menu_elements['next']['title'];?> <?=$fa_next;?></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('last', $enabled_buttons) && isset($menu_elements['last'])): ?>
<a href="<?=$menu_elements['last']['url'];?>" <?=$button_classlist;?>><?=$menu_elements['last']['title'];?> <?=$fa_last;?></a>
<?php endif; ?>
</div>
</div>