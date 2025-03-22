<?php
/**
 * @version    1.0.0
 * @author     Galcedion https://galcedion.com
 * @copyright  Copyright (c) 2025 Galcedion
 * @license    GNU/GPL: https://gnu.org/licenses/gpl.html
 */
defined('_JEXEC') or die;
?>
<div class="<?=$main_class;?> row">
<div class="col">
<?php if(in_array('first', $enabled_buttons) && isset($menu_elements['first'])): ?>
<a href="<?=$menu_elements['first']['url'];?>" class="btn btn-outline-info"><i class="fa-solid fa-backward-step"></i> <?=$menu_elements['first']['title'];?></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('prev', $enabled_buttons) && isset($menu_elements['prev'])): ?>
<a href="<?=$menu_elements['prev']['url'];?>" class="btn btn-outline-info"><i class="fa-solid fa-backward"></i> <?=$menu_elements['prev']['title'];?></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('top', $enabled_buttons)): ?>
<a href="<?=$menu_elements['parent']['url'];?>" class="btn btn-outline-info"><i class="fa-solid fa-eject"></i> <?=$menu_elements['parent']['title'];?> <i class="fa-solid fa-eject"></i></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('next', $enabled_buttons) && isset($menu_elements['next'])): ?>
<a href="<?=$menu_elements['next']['url'];?>" class="btn btn-outline-info"><?=$menu_elements['next']['title'];?> <i class="fa-solid fa-forward"></i></a>
<?php endif; ?>
</div><div class="col">
<?php if(in_array('last', $enabled_buttons) && isset($menu_elements['last'])): ?>
<a href="<?=$menu_elements['last']['url'];?>" class="btn btn-outline-info"><?=$menu_elements['last']['title'];?> <i class="fa-solid fa-forward-step"></i></a>
<?php endif; ?>
</div>
</div>