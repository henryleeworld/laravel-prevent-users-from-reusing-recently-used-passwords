# Laravel 8 避免重複使用舊的密碼

引入 infinitypaul 的 laravel-password-history-validation 套件來擴增避免重複使用舊的密碼，較長的時間相同的密碼是適用於特定帳戶，較大的機會，攻擊者將能夠判斷透過暴力密碼破解攻擊的密碼。如果使用者需要變更其密碼，但他們可以重複使用舊的密碼，便可大幅縮短良好的密碼原則的有效性。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 執行安裝 Laravel Mix 引用的依賴項目，並執行所有 Mix 任務。
```sh
$ npm install && npm run dev
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/register` 來進行註冊。
- 完成註冊後，可以經由 `/login` 來進行登入。
- 輕觸帳戶下方的「個人資料」內的「更新密碼」來進行密碼變更。

----

## 畫面截圖
![](https://i.imgur.com/anH2Dfk.png)
> 利用密碼歷程記錄避免重複使用舊的密碼