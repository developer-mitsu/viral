<?php
mb_internal_encoding("UTF-8");
$admin_email = "info@permil.jp,info@codevillage.jp";
$admin_sub_email = "nishiumi@permil.jp";
// []内はcontact.html内のname
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $name_how = $_POST['name_how'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $trigger = $_POST['trigger'];
	$other = $_POST['other'];
    $body .= "氏名:".$name."\n";
    $body .= "氏名(フリガナ):".$name_how."\n";
    $body .= "年代:".$age."\n";
    $body .= "メールアドレス:".$email."\n";
    $body .= "電話番号:".$phone."\n";
    $body .= "受講希望日:".$date."\n";
    $body .= "きっかけ:".$trigger."\n";
    $body .= "その他:".$other."\n";  
  
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
	$flg = SENDMAIL($admin_email, $address, "無料体験講座へのお申込みがありました。", $body);
	if($flg == true) {
		$message = "無料体験講座のお申込みが完了しました。";
	} else {
		$message = "お申込みが完了しませんでした。\n大変お手数ですが、もう一度やり直して下さい。";
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="codevillageは、3ヶ月で凡ゆる選択肢を取れるようになることを目標にしたプログラミングスクールです。">
<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
<script src="https://kit.fontawesome.com/6270f2e9f0.js"></script>
<title>CodeVillage</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <p class="apply_message">
        <?php echo $message; ?>
    </p>

    <div class="submit">
        <div class="submit__inner">
            <a class="submit-btn" href="./">戻る</a>
        </div>
    </div>
    <script src="../js/contact.js"></script>
</body>
</html>