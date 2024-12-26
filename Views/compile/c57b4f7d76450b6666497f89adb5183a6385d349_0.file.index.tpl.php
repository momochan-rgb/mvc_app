<?php
/* Smarty version 4.5.5, created on 2024-12-26 02:36:49
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_676cc14153bb82_51935851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1735178759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676cc14153bb82_51935851 (Smarty_Internal_Template $_smarty_tpl) {
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
            <h2 class="mb-4">入力画面</h2>
            <form action="/contact/confirm" method="post" class="bg-white p-3 rounded mb-5">
                <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['auth'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" placeholder="テスト太郎" maxlength="50" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <input type="text" class="form-control" name="kana" placeholder="てすとたろう" maxlength="50" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control"  name="tel" placeholder="06-6012-3456" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email" placeholder="geekation@exemple.com" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="form-group">
                    <label for="furigana">問い合わせ内容</label>
                    <textarea class="form-control" name="body" placeholder="お問い合わせ内容" rows="5"><?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</textarea>
                    <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                </div>

                <div class="button-group">
                    <button class="btn bg-warning my-2">送信</button>
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
</div>
</body><?php }
}
