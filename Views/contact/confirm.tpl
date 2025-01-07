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
            <h2 class="mb-4">確認画面</h2>
            <form action="/contact/submit" method="post" class="bg-white p-3 rounded mb-5">
                <p class="error-text">{$errorMessages['auth']|default:''}</p>
                <div class="form-group">
                    <label for="name">氏名</label>
                    <p class="form-control">{$post.name|escape}</p>
                </div>

                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <p class="form-control">{$post.kana|escape}</p>
                </div>

                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <p class="form-control">{$post.tel|escape}</p>
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <p class="form-control">{$post.email|escape}</p>
                </div>

                <div class="form-group">
                    <label for="body">問い合わせ内容</label>
                    <textarea class="form-control" rows="5" readonly>{$post.body|escape}</textarea>
                </div>

                <div class="button-group">
                    <button class="btn bg-warning my-2" type="button" onclick="history.back(-1)">キャンセル</button>
                    <button class="btn bg-warning my-2" type="submit">送信</button>
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