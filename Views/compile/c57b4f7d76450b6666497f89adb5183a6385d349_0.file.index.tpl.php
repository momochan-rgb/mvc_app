<?php
/* Smarty version 4.5.5, created on 2025-01-06 09:46:02
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_677ba65ac64929_62569642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1736155623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677ba65ac64929_62569642 (Smarty_Internal_Template $_smarty_tpl) {
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
            <form action="/contact/confirm" method="post" class="bg-white p-3 rounded mb-5" novalidate>
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
                    <input type="tel" class="form-control"  name="tel" placeholder="0660123456" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
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
    <div class="row justify-content-center">
    <div class="col-lg-8">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>ふりがな</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせ内容</th>
                    <th>送信日時</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tableData']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['kana'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['body'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['created_at'];?>
</td>
                    <td>
                        <a href="/contact/edit?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" class="extract-url" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">更新</a>
                    </td>
                    <td>
                        <a href="#" onclick="deleteContact(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
); return false;">削除</a>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<?php echo '<script'; ?>
>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll(".extract-url");
        
        links.forEach(function(link) {
            const url = link.getAttribute("href");
            
            const idMatch = url.match(/\?id=(\d+)/);
            if (idMatch) {
                const extractedId = idMatch[1];
                console.log("Extracted ID: " + extractedId); 
            } else {
                console.error("IDの抽出に失敗しました: " + url);
            }
        });
    });

    function deleteContact(id) {
        if (confirm('本当に削除しますか？')) {
            fetch('/contact/delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('削除に失敗しました。');
                }
            })
            .catch(error => {
                alert('削除中にエラーが発生しました。');
                console.error(error);
            });
        }
    }
<?php echo '</script'; ?>
>
</body>
<?php }
}
