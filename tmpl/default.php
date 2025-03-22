<?php
/**
 * @version    1.0.0
 * @author     Galcedion https://galcedion.com
 * @copyright  Copyright (c) 2025 Galcedion
 * @license    GNU/GPL: https://gnu.org/licenses/gpl.html
 */
defined('_JEXEC') or die;

$parent = $menu_elements['parent'];

?>
<div class="<?=$main_class;?>">
<div>
<?php if(isset($menu_elements['prev'])): ?>
<a href="<?=$menu_elements['prev']['url'];?>"><?=$menu_elements['prev']['title'];?></a>
<?php endif; ?>
</div><div>
<a href="<?=$parent['url'];?>"><?=$parent['title'];?></a>
</div><div>
<?php if(isset($menu_elements['next'])): ?>
<a href="<?=$menu_elements['next']['url'];?>"><?=$menu_elements['next']['title'];?></a>
<?php endif; ?>
</div>
</div>