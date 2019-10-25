<?php
mb_internal_encoding("UTF-8");

$admin_email = "info@permil.jp";
$admin_sub_email = "kusuda@permil.jp";

// []内はcontact.html内のname
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $name_how = $_POST['name_how'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$content = $_POST['content'];
  $date1 = $_POST['date1'];
  $date2 = $_POST['date2'];
  $date3 = $_POST['date3'];
  $freeText = $_POST['free-text'];

  $body .= "氏名:".$name."\n";
  $body .= "氏名(フリガナ):".$name_how."\n";
  $body .= "メールアドレス:".$email."\n";
	$body .= "電話番号:".$phone."\n";
  $body .= "第一希望日程:".$date1."\n";
  $body .= "第二希望日程:".$date2."\n";
  $body .= "第三希望日程:".$date3."\n";
  $body .= "備考・その他:".$freeText."\n";
	$body .= "お問い合わせ内容:\n".$content."\n\n";
  
  
  function SENDMAIL($to,$from,$sub,$body) {
    mb_language("uni");
    mb_internal_encoding("utf-8");//utf-8 or SJIS
    $Head="";
    $Head.="From: ".$from."\n";
    $Head.="Mime-Version: 1.0\n";
    $Head.="Reply-To: ".$from."\n";
    $Head.="X-Mailer: PHP/". phpversion();
    $flg = mb_send_mail($to, $sub, $body,$Head, $admin_sub_email);
    return $flg;
  }

	//メールの送り先,メールの送り元,メールタイトル
	$flg = SENDMAIL($admin_email, $address, "カウンセリング希望", $body);

	if($flg == true) {
		$message = "無料カウンセリングのお申込みが完了しました。\n弊社より折り返しご連絡致します。\n今しばらくお待ち下さい。";
	} else {
		$message = "メールの送信に失敗しました。\nお手数ですが、もう一度やり直して下さい。";
	}
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143178225-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-143178225-1');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="codevillageは、3ヶ月で凡ゆる選択肢を取れるようになることを目標にしたプログラミングスクールです。">
<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="../css/contact.css">
<script src="https://kit.fontawesome.com/6270f2e9f0.js"></script>
<title>CodeVillage</title>
</head>
<body>
  <header id="js-scrollHdr">
    <div class="hd-wrap">
        <h1 class="hd-logo"><a href="../index.html">Code Village</a></h1>
        <nav class="hd-nav">
        <ul>
            <li class="hd-nav__item"><a href="../index.html#about">Code Villageとは</a></li>
            <li class="hd-nav__item"><a href="../index.html#curriculum">カリキュラム</a></li>
            <li class="hd-nav__item"><a href="../index.html#flow">受講について</a></li>
            <li class="hd-nav__item"><a href="../index.html#price">料金</a></li>
        </ul>
        </nav>

        <nav id="hd-nav--sp">
        <ul>
            <li class="hd-nav__item--sp"><a href="../index.html#about">Code Villageとは</a></li>
            <li class="hd-nav__item--sp"><a href="../index.html#flow">受講の流れ</a></li>
            <li class="hd-nav__item--sp"><a href="../index.html#curriculum">カリキュラム</a></li>
            <li class="hd-nav__item--sp"><a href="../index.html#voice">お客様の声</a></li>
            <li class="hd-nav__item--sp"><a href="../index.html#q-a">Q ＆ A</a></li>
            <li class="hd-nav__item--sp"><a href="../index.html#access">アクセス</a></li>
        </ul>
        <div class="hd-icon--sp">
            <span class="icon-insta">
            <a href="https://instagram.com/codevillage_offisial?igshid=1j4pr62ysyih1"><i class="fab fa-instagram"></i></a>
            </span>
            <span class="icon-tw">
            <a href="https://twitter.com/Code__Village"><i class="fab fa-twitter"></i></a>
            </span>
        </div>
        </nav>
        <div class="hd--main-btn">
        <a href="../contact.html">無料カウンセリング</a>
        </div>
        <div id="hum-bar">
        <span id="bar1" class="bar"></span>
        <span id="bar2" class="bar"></span>
        <span id="bar3" class="bar"></span>
        </div>
    </div>
  </header>

  <section class="contact-sended">
    <p>
      <?php echo $message; ?>
    </p>
    <p><a href="./">>>戻る</a></p>
  </section>

  <footer class="php-footer">
        <div class="inner ft-inner">
            <div class="ft-top">
            <div class="ft-sns-link">
                <span class="icon-insta">
                <a href="https://instagram.com/codevillage_offisial?igshid=1j4pr62ysyih1"><i class="fab fa-instagram"></i></a>
                </span>
                <span class="icon-tw">
                <a href="https://twitter.com/Code__Village"><i class="fab fa-twitter"></i></a>
                </span>
            </div>
            <p class="ft-logo"><a href="../index.html">Code Village</a></p>
            <ul class="ft-list">
                <li><a href="../index.html#about">Code Villageとは</a></li>
                <li><a href="../index.html#curriculum">カリキュラム</a></li>
                <li><a href="../index.html#flow">受講について</a></li>
                <li><a href="../index.html#price">料金</a></li>
            </ul>
            </div>
            <div class="ft-inc">
                <small>&copy;2007-2019 Permil inc.</small>
            </div>
        </div>
    </footer>

    <script src="../js/contact.js"></script>
</body>
</html>
