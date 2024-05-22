<?php /* Smarty version 2.6.22, created on 2021-08-04 15:52:10
         compiled from common/header.tpl */ ?>
<div id="header" class="clearfix" align="center"><?php echo $this->_tpl_vars['sitename']; ?>
管理画面</div>

<div id="navi2" style="float:left; width:160px;">
<ul>
<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['act']): ?>
<li class="menu"><a href="?act=<?php echo $this->_tpl_vars['item']['act']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></li>
<?php else: ?>
<li class="comment"><?php echo $this->_tpl_vars['item']['title']; ?>
</li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>