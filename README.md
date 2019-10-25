# cvlp-v2
## ビルド後、デプロイ前に手動でやること
- topページパスを手動で書き換えてください
    - 生徒の声画像パス
    - 生徒の声「もっと見る」リンク
- faviconを手動でdistのimgに写してください
- phpファイルで読み込んでいるjsファイルにハッシュが付いてません htmlからコピペしてください
- curriculum,contact内にあるファイルをsrc内各フォルダからコピーし、dist内各フォルダにコピペしてください
  - venderフォルダ
  - composer.lock
  - .env(隠しファイル)
  - composer.json
  - codevillageなんちゃらかんちゃら.json
  
## CSSファイルの読み込みについて
- htmlファイル１つにつきCSS(SCSS)ファイル１つ
- メインのSCSSファイルにreset.scssなど、必要なcss情報をimportする
- その後各エントリーポイントへimport
