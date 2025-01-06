<!DOCTYPE html>
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
            {if $successMessage}
                <div class="alert alert-success">{$successMessage}</div>
            {/if}

            {if $errorMessages}
                <div class="alert alert-danger">
                    {foreach from=$errorMessages item=message}
                        <p>{$message}</p>
                    {/foreach}
                </div>
            {/if}
            <form action="/contact/update" method="post">
                <input type="hidden" name="id" value="{$post.id|escape}">
                
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" id="name" name="name" class="form-control" value="{$post.name|escape}">
                    <p class="error-text">{$errorMessages['name']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="kana">ふりがな</label>
                    <input type="text" id="kana" name="kana" class="form-control" value="{$post.kana|escape}">
                    <p class="error-text">{$errorMessages['kana']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="text" id="tel" name="tel" class="form-control" value="{$post.tel|escape}">
                    <p class="error-text">{$errorMessages['tel']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" class="form-control" value="{$post.email|escape}">
                    <p class="error-text">{$errorMessages['email']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="body">問い合わせ内容</label>
                    <textarea id="body" name="body" class="form-control">{$post.body|escape}</textarea>
                    <p class="error-text">{$errorMessages['body']|default:''}</p>
                </div>

                <div class="button-group">
                    <button class="btn btn-warning my-2" type="button" onclick="history.back()">キャンセル</button>
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

