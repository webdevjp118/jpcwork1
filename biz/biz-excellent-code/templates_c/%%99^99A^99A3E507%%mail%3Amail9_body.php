<?php /* Smarty version 2.6.22, created on 2021-08-18 00:00:02
         compiled from mail:mail9_body */ ?>
いつも保育BIZをご利用頂き
誠にありがとうございます。

検索条件に合致した求人が登録されました。
<?php $_from = $this->_tpl_vars['info']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
https://hoikubiz.com/detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
/
<?php endforeach; endif; unset($_from); ?>

解除はこちら
https://hoikubiz.com/release/<?php echo $this->_tpl_vars['seq']; ?>