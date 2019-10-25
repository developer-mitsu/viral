<?php
mb_internal_encoding("UTF-8");

require_once __DIR__.'/vendor/autoload.php';
use Dotenv\Dotenv;

$admin_email = "info@codevillage.jp";// 受信するメールアドレス
$admin_sub_email = "tsuyoshi_fl@icloud.com";

/**
 * Class GoogleSheetsAPISample
 */
class GoogleSheetsAPISample {

    /**
     * @var Google_Service_Sheets
     */
    protected $service;

    /** 
     * @var array|false|string
     */
    protected $spreadsheetId;

    /**
     * GoogleSheetsAPISample constructor.
     */
    public function __construct()
    {
        $dotenv = new Dotenv(__dir__);
        $dotenv->load();
        $credentialsPath = getenv('SERVICE_KEY_JSON');
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . dirname(__FILE__) . '/' . $credentialsPath);

        $this->spreadsheetId = getenv('SPREADSHEET_ID');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Google_Service_Sheets::SPREADSHEETS);
        $client->setApplicationName('test');

        $this->service = new Google_Service_Sheets($client);
    }

    /**
     * @param string $date
     * @param string $name
     * @param string $name_how
     */
    public function append(string $date, string $name, string $name_how, string $email, string $phone, string $opportunity)
    {
        $value = new Google_Service_Sheets_ValueRange();
        $value->setValues([ 'values' => [ $date, $name, $name_how, $email, $phone, $opportunity ] ]);
        $response = $this->service->spreadsheets_values->append($this->spreadsheetId, '事前課題!A1', $value, [ 'valueInputOption' => 'USER_ENTERED' ] );
        /**
         * $this->spreadsheetId, '{シート名}!{セルの番号}'
         */
    }
}

function SENDMAIL($to,$from,$sub,$body) {
    mb_language("uni");
    mb_internal_encoding("utf-8");//utf-8 or SJIS
    $Head="";
    $Head.="From: ".$from."\n";
    $Head.="Mime-Version: 1.0\n";
    $Head.="Reply-To: ".$from."\n";
    $Head.="X-Mailer: PHP/". phpversion();
    $flg = mb_send_mail($to, $sub, $body,$Head, $admin_email);
    return $flg;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$name_how = $_POST['name_how'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$opportunity = $_POST['opportunity'];

	$body .= "氏名".$name."\n";
	$body .= "氏名".$name_how."\n";
    $body .= "メールアドレス:".$email."\n";
	$body .= "電話番号:".$phone."\n";
	$body .= "ダウンロードの目的:\n".$opportunity."\n\n";

    SENDMAIL($admin_email, $email, "資料請求", $body);
    
    $sample = new GoogleSheetsAPISample;

    $date    = date('Y/m/d'); //タイムスタンプ
    $sample->append($date, $name, $name_how, $email, $phone, $opportunity);
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
    <title>CodeVillage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/6270f2e9f0.js"></script>
    <link rel="stylesheet" href="../css/curriculum.css">
    <title>CodeVillage｜池袋のプログラミングスクール</title>
</head>

<body>
    <header id="js-scrollHdr">
    <div class="hd-wrap">
        <h1 class="hd-logo"><a href="./index.html">Code Village</a></h1>
        <nav class="hd-nav">
        <ul>
            <li class="hd-nav__item"><a href="./index.html#about">Code Villageとは</a></li>
            <li class="hd-nav__item"><a href="./index.html#curriculum">カリキュラム</a></li>
            <li class="hd-nav__item"><a href="./index.html#flow">受講について</a></li>
            <li class="hd-nav__item"><a href="./index.html#price">料金</a></li>
        </ul>
        </nav>

        <nav id="hd-nav--sp">
        <ul>
            <li class="hd-nav__item--sp"><a href="./index.html#about">Code Villageとは</a></li>
            <li class="hd-nav__item--sp"><a href="./index.html#flow">受講の流れ</a></li>
            <li class="hd-nav__item--sp"><a href="./index.html#curriculum">カリキュラム</a></li>
            <li class="hd-nav__item--sp"><a href="./index.html#voice">お客様の声</a></li>
            <li class="hd-nav__item--sp"><a href="./index.html#q-a">Q ＆ A</a></li>
            <li class="hd-nav__item--sp"><a href="./index.html#access">アクセス</a></li>
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
        <a href="./contact.html">無料カウンセリング</a>
        </div>
        <div id="hum-bar">
        <span id="bar1" class="bar"></span>
        <span id="bar2" class="bar"></span>
        <span id="bar3" class="bar"></span>
        </div>
    </div>
    </header>

    <section class="downloading">
        <p>
            自動でダウンロードが始まらない場合は、<wbr>以下のリンクをクリックしてください。<br>
            <a href="../prechallenge.zip" download="prechallenge.zip" class="hd--main-btn">ダウンロードを開始する</a>
        </p>
        <div class="reservation-btn__wrapper">
            <div class="reservation-btn__bg"></div>
            <a href="./" class="reservation-btn__main"></a>
            <a href="./" class="reservation-btn__description">TOPに戻る</a>
        </div>
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
            <p class="ft-logo"><a href="./index.html">Code Village</a></p>
            <ul class="ft-list">
                <li><a href="./index.html#about">Code Villageとは</a></li>
                <li><a href="./index.html#curriculum">カリキュラム</a></li>
                <li><a href="./index.html#flow">受講について</a></li>
                <li><a href="./index.html#price">料金</a></li>
            </ul>
            </div>
            <div class="ft-inc">
                <small>&copy;2007-2019 Permil inc.</small>
            </div>
        </div>
    </footer>
    
    <script src="../js/curriculum.js"></script>
</body>

</html>