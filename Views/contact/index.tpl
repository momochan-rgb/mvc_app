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
            <h2 class="mb-4">入力画面</h2>
            <form action="/contact/confirm" method="post" class="bg-white p-3 rounded mb-5">
                <p class="error-text">{$errorMessages['auth']|default:''}</p>
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" placeholder="テスト太郎" maxlength="10" value="{$post['name']|default:''}">
                    <p class="error-text">{$errorMessages['name']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <input type="text" class="form-control" name="kana" placeholder="てすとたろう" maxlength="10" value="{$post['kana']|default:''}">
                    <p class="error-text">{$errorMessages['kana']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control"  name="tel" placeholder="06-6012-3456" value="{$post['tel']|default:''}">
                    <p class="error-text">{$errorMessages['tel']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email" placeholder="geekation@exemple.com" value="{$post['email']|default:''}">
                    <p class="error-text">{$errorMessages['email']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="furigana">問い合わせ内容</label>
                    <textarea class="form-control" name="body" placeholder="お問い合わせ内容" rows="5">{$post['body']|default:''}</textarea>
                    <p class="error-text">{$errorMessages['body']|default:''}</p>
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
</body>