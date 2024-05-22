<?php /* Smarty version 2.6.22, created on 2021-10-27 20:56:09
         compiled from mail:mail2_body */ ?>
<?php echo $this->_tpl_vars['name']; ?>
様

いつも保育bizをご利用頂き
誠にありがとうございます。

求人のエントリーを受け付けました。
担当者よりご連絡をさせて頂きますので
今しばらくお待ちください。

応募日：<?php echo $this->_tpl_vars['info']['date']; ?>

<?php $_from = $this->_tpl_vars['info']['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
求人タイトル：<?php echo $this->_tpl_vars['item']['title']; ?>

求人ページ：<?php echo $this->_tpl_vars['url']; ?>
detail/<?php echo $this->_tpl_vars['item']['info_id']; ?>

求人No：<?php echo $this->_tpl_vars['item']['info_id']; ?>

応募No：<?php echo $this->_tpl_vars['item']['oubo_id']; ?>

<?php endforeach; endif; unset($_from); ?>

氏名：<?php echo $this->_tpl_vars['form']['name']; ?>

カナ：<?php echo $this->_tpl_vars['form']['name_kana']; ?>

性別：<?php echo $this->_tpl_vars['form']['radio01']; ?>

生年月日：<?php echo $this->_tpl_vars['form']['birthday_year']; ?>
年<?php echo $this->_tpl_vars['form']['birthday_month']; ?>
月<?php echo $this->_tpl_vars['form']['birthday_day']; ?>
日
保有資格：<?php echo $this->_tpl_vars['form']['shikaku']; ?>

電話番号：<?php echo $this->_tpl_vars['form']['tel']; ?>

メールアドレス：<?php echo $this->_tpl_vars['form']['email']; ?>

備考：<?php echo $this->_tpl_vars['form']['biko']; ?>


