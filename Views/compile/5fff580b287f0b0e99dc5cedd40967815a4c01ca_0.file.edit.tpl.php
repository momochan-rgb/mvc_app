<?php
/* Smarty version 4.5.5, created on 2025-01-06 09:53:13
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_677ba80944acd1_16715785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fff580b287f0b0e99dc5cedd40967815a4c01ca' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl',
      1 => 1736156957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677ba80944acd1_16715785 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">更新画面</h2>
            <?php if ($_smarty_tpl->tpl_vars['successMessage']->value) {?>
                <div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['successMessage']->value;?>
</div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['errorMessages']->value) {?>
                <div class="alert alert-danger">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errorMessages']->value, 'message');
$_smarty_tpl->tpl_vars['message']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->do_else = false;
?>
                        <p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php }?>
            <form action="/contact/update" method="post" class="bg-white p-3 rounded mb-5" novalidate>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
                
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="kana">ふりがな</label>
                    <input type="text" id="kana" name="kana" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="text" id="tel" name="tel" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="body">問い合わせ内容</label>
                    <textarea id="body" name="body" class="form-control"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['post']->value['body'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="button-group">
                    <button class="btn btn-warning my-2" type="button" onclick="window.location.href='/contact/index'">キャンセル</button>
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <div class="bg-white p-3 rounded mb-5">
                    <div class="m-1">
                        <p><a href="/">トップページへ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php }
}
