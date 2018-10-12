<?php
/* Smarty version 3.1.33, created on 2018-10-10 22:52:49
  from 'C:\xampp\htdocs\smartcgs\tpl\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bbec9116740a1_84689766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '662fb367fac1fe99ab011ac3c19b61149da2f02e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smartcgs\\tpl\\home.tpl',
      1 => 1539229967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbec9116740a1_84689766 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Welcome to the Casual Game Station!</h1>

<table class="specials">
    <tr><td colspan="2" class="specials_title">Current Specials</td>
   <td><?php echo $_smarty_tpl->tpl_vars['dailyspecial']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['weeklyspecial']->value;?>
</td></tr>
    
</table><?php }
}
