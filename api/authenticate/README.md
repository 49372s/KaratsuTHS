# ハッシュ化モジュール
IDとパスワードをもとに認証して、リクエスト用のトークンを返却する。トークンの有効時間は1分間。00秒から59秒までしか対応しないため、リクエストが失敗した際に、時限が原因かを判別するか、秒をもとに処理を遅延させる機能を個人で実装する必要があります。
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

## 時限要因判別例
2度認証に失敗した際に、再度トークンの生成をリクエストする。

再度トークンのリクエスト後、2度認証失敗したらパスワード、ＩＤのミスといった判別が可能。

一番シンプルな方法になる。