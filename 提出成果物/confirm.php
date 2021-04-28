<?php
$course = $_GET["course"];
$number_of_customers = $_GET["number_of_customers"];

$price = 0;
if ($course == "101") {
    $price = $number_of_customers*3500*1.1;
    $course_name = "特選てっぱん焼き";
    $image = "teppan.jpg";
} else if ($course == "102") {
    $price = $number_of_customers*2800*1.1;
    $course_name = "海の幸グリル";
    $image = "seafood.jpg";
} else if ($course == "103") {
    $price = $number_of_customers*2900*1.1;
    $course_name = "山の幸グルメ";
    $image = "mountainfood.jpg";
} else {
    $price = $num*1800*1.1;
    $course_name = "ガーリックライス";
    $image = "garlicrice.jpg";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <header>
        <div class="header-content">
            <div class="float-left">
                <img src="images/logo-saba.png" alt="logo">
            </div>
            <div class="float-left">
                <h1>夜明け食堂 ~さばみそ~</h1>
            </div>
        </div>
    </header>

    <div id="content">
        <ul class="procedure">
            <li class="gray">コース選択</li>
            <li class="choice">予約手続き</li>
            <li class="light_gray">予約完了</li>
        </ul>

        <div class="confirm">
            <ul>
                <li>
                    <span>コース</span><br>
                    <?php echo $course_name; ?>
                </li>
                <li><span>人数</span><br>
                    <?php echo $number_of_customers; ?>名様
                </li>
                <li><span>合計金額</span><br>
                    ¥<?php  echo $price; ?> (税込み)
                </li>
            </ul>
            <figure class="image">
                <img src="<?php echo "images/" .$image; ?>">
            </figure>
        </div>

        <h3 class="center">上記の内容でお間違いがなければ、お客様情報をお願いいたします。</h3>
        <form action="thanks.php" method="post">
            <ul class="user_info">
                <li>
                    <label>ご予約者名<span class="red">*</span></label>
                    <div>
                        <input type="text" name="last_name" class="name" placeholder="氏" required>
                        <input type="text" name="first_name" class="name" placeholder="名" required>
                    </div>
                </li>
                <li>
                    <label>連絡可能な電話番号<span class="red">*</span></label>
                    <div>
                        <input type="tel" name="phone_number" class="phone_number" pattern="\d{2,4}-?\d{3,4}-?\d{3,4}" required>
                        <input type="reset" value="情報をリセット" />
                    </div>
                </li>
                <input type="hidden" name="course_name" value="<?php echo $course_name; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="hidden" name="image" value="<?php echo $image; ?>">

                <input type="button" class="back" onclick="history.back()" value="変更する">
                <input type="submit" class="submit" value="予約を確定する">
            </ul>
        </form>
    </div>
</div>
</body>

</html>
