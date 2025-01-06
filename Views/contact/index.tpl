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
            <form action="/contact/confirm" method="post" class="bg-white p-3 rounded mb-5">
                <p class="error-text">{$errorMessages['auth']|default:''}</p>
                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" placeholder="テスト太郎" maxlength="50" value="{$post['name']|default:''}">
                    <p class="error-text">{$errorMessages['name']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="furigana">ふりがな</label>
                    <input type="text" class="form-control" name="kana" placeholder="てすとたろう" maxlength="50" value="{$post['kana']|default:''}">
                    <p class="error-text">{$errorMessages['kana']|default:''}</p>
                </div>

                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control"  name="tel" placeholder="0660123456" value="{$post['tel']|default:''}">
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
                {foreach from=$tableData item=row}
                <tr>
                    <td>{$row.id}</td>
                    <td>{$row.name}</td>
                    <td>{$row.kana}</td>
                    <td>{$row.tel}</td>
                    <td>{$row.email}</td>
                    <td>{$row.body}</td>
                    <td>{$row.created_at}</td>
                    <td>
                        <a href="/contact/edit?id={$row.id}" class="extract-url" data-id="{$row.id}">更新</a>
                    </td>
                    <td>
                        <a href="#" onclick="deleteContact({$row.id}); return false;">削除</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<script>
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
</script>
</body>
