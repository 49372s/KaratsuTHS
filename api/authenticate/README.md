# ハッシュ化モジュール
IDとパスワードをもとに認証して、リクエスト用のトークンを返却する
## 仕様
エンドポイント
```
/api/authenticate/
```
### リクエスト
> __リクエストタイプ__

> GET

> __リクエストデータ__

> id = APIユーザーID。
> token = APIユーザーパスワード。

**これらは事前に/api/module/hash/でハッシュ化したものを送信する必要があります**

### レスポンス
> __レスポンスタイプ__

> result = 成否。str型で返る。successとfailが入る。

> data = トークン。str型で返る。失敗時にはnull。

> reason = 失敗理由。str型で返る。成功時にはnull。