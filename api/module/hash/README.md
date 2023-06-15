# ハッシュ化モジュール
Pythonからリクエストされたstrをsha3(512)でハッシュ化してレスポンスを返す。
## 仕様
エンドポイント
```
/api/module/hash/
```
### リクエスト
> __リクエストタイプ__
> GET
> __リクエストデータ__
> str = ハッシュ化する文字列。Req. URI too longにならない2000文字までならリクエスト可能
### レスポンス
> __レスポンスタイプ__
> result = 成否。str型で返る。successとfailが入る。
> data = 成功時のデータ。str型で返る。失敗時にはnull。
> reason = 失敗時のデータ。str型で返る。成功時にはnull。