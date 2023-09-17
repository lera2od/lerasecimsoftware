<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kekvland Seçim Sistemleri by Lera TicariMarka</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap');

        @font-face {
            font-family: "Designer";
            src: url("/fonts/Designer.otf");
        }

        body {
            background-color: #1D2145;
            color: #fff;
            font-family: 'Inter', sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        h1,
        h2 {
            margin: 0 !important;
        }

        .logo {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }

        p {
            text-align: center;
            margin-top: 30px;
            font-size: 18px;
        }

        ul {
            padding: 0;
            margin-top: 30px;
        }

        li {
            margin: 0;
        }

        a {
            color: #ff0000;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #ff6666;
        }

        .content {
            background-color: #0000009e;
            padding: 10px;
            width: 100vw;
            min-height: 100vh;
            backdrop-filter: blur(5px);
        }

        .big {
            font-family: 'Designer', sans-serif;
            font-weight: 100;
            font-size: 10vw;
            margin-top: 0;
            margin-bottom: 0;
        }

        .flex {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20vh;
        }

        .ajans {
            background-color: #0000009e;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
            width: 300px;
            height: 300px;
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
        }

        .ajans:hover {
            transform: scale(1.1);
        }

        .ajans img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
            background-color: white;
            border-radius: 10px;
            padding: 1px;
            transition: all 0.3s ease;
        }

        .ajans img:hover {
            transform: scale(1.1);
        }

        .ajans img:active {
            transform: scale(0.9);
        }

        .ajans h3 {
            margin: 0;
            font-size: 20px;
        }

        .btn {
            background-color: #ff0000;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            transition: all 0.3s ease;
            margin: 10px;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        .btn:active {
            transform: scale(0.9);
        }

        .banner {
            position: relative;
            background-color: #0000009e;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
            width: 50%;
            height: 30vh;
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            transition: all 0.2s ease-in-out;
            overflow: hidden;
        }

        .banner:hover {
            box-shadow: 0px 0px 15px 3px #ff0000
        }

        .banner h2 {
            margin: 0;
            font-size: 20px;
            text-shadow: 0 0 10px white;
        }

        .banner img {
            height: 120%;
            object-fit: cover;
            object-position: center;
            position: absolute;
            right: 0;
            top: 0;
            z-index: -1;
        }

        .banner .btn {
            box-shadow: 0 0 10px #ff0000;
        }

        .banner .left {
            left: 0;
        }

        .banner .right {
            right: 0;
        }

        .banner div {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 10px #ff0000;
            }

            50% {
                box-shadow: 0 0 20px #ff0000;
            }

            100% {
                box-shadow: 0 0 10px #ff0000;
            }
        }

        .footer {
            height: 20vh;
            background-color: black;
            margin: -25px;
            margin-top: 20px;
        }
    </style>
</head>

<body style="background-image: url(https://png.pngtree.com/background/20230525/original/pngtree-3d-paper-picture-image_2727027.jpg); background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 100vh;">
    <div class="content">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <?php
        if (isset($_GET["toast"])) {
            $allToasts = [
                "voted" => [
                    "text" => "Başarıyla oy kullandınız.",
                    "type" => "74D111"
                ],
                "login" => [
                    "text" => "Başarıyla giriş yaptınız.",
                    "type" => "74D111"
                ],
                "logout" => [
                    "text" => "Başarıyla çıkış yaptınız.",
                    "type" => "74D111"
                ],
                "alreadyvoted" => [
                    "text" => "Zaten oy kullandınız.",
                    "type" => "F33950"
                ],
                "forbidden" => [
                    "text" => "Bu sayfaya erişim izniniz yok.",
                    "type" => "F33950"
                ],
                "ajansyok" => [
                    "text" => "Böyle bir ajans yok.",
                    "type" => "F33950"
                ],
                "error" => [
                    "text" => "Bir hata oluştu.",
                    "type" => "F33950"
                ]
            ];
            $toast = $allToasts[$_GET["toast"]] ?? $allToasts["error"];
            $avatar = "";
            if (isset($_SESSION["avatar"])) {
                $avatar = "avatar: 'https://cdn.discordapp.com/avatars/{$_SESSION["user"]}/{$_SESSION["avatar"]}.png?size=128',";
            } else {
                $avatar = "";
            }
            echo "<script type='text/javascript'>";
            echo "Toastify({
                text: '{$toast["text"]}',
                $avatar
                duration: 5000,
                close: true,
                gravity: 'top',
                position: 'right',
                backgroundColor: '#{$toast["type"]}',
                stopOnFocus: true,
                close : true,
                onClick: function(){} // Callback after click
            }).showToast();";
            echo "</script>";
        }
        ?>
        <center>
            <h1>Kekvland Seçim 2023-2024</h1>
            <?php
            $leftRight = "left";
            function leftRight() {
                global $leftRight;
                echo "left";
            }

            $ceos = json_decode(file_get_contents("private/ceos.json"), true);

            if (isset($_SESSION["user"])) {
                foreach ($ceos as $ajans => $ceo) {
                    if (in_array($_SESSION["user"], $ceo)) :
            ?>
                        <br>
                        <div class="banner">
                            <img draggable="false" class="<?php leftRight()?>" src="https://cdn.discordapp.com/attachments/996815021109674054/1151227146233196696/isometric-artificial-intelligence-analyzes-data.png" alt="">
                            <div>
                                <h2>Ajansınızı Yönetin</h2>
                                <a href="/admin.php?ajans=<?= $ajans ?>" class="btn">Yönet</a>
                            </div>
                        </div>
            <?php
                    endif;
                }
            }
            ?>
            <?php

            $votes = file_get_contents("private/votes.json");
            $votes = json_decode($votes, true);

            $voted = false;
            if (isset($_SESSION["user"])) {
                foreach ($votes as $vote) {
                    $user = hash("sha256", $_SESSION["user"]);
                    if ($vote["user"] == $user) {
                        $voted = true;
                    }
                }
            }
            ?>
            <?php if (!isset($_SESSION["user"]) || $voted == false) : ?>
                <br>
                <div class="banner">
                    <img draggable="false" class="<?php leftRight()?>" src="https://cdn.discordapp.com/attachments/996815021109674054/1151225710925598810/urban-mother-with-a-baby-in-her-arms-votes-at-a-polling-station.png" alt="">
                    <div>
                        <h2>

                            <?php
                            if (!isset($_SESSION["user"])) {
                                echo "Oy Kullanmak İçin Giriş Yapın";
                            } else {
                                echo "Oy Kullanın";
                            }
                            ?>
                        </h2>
                        <a href="/vote.php" class="btn">
                            <?php
                            if (!isset($_SESSION["user"])) {
                                echo "Giriş Yap";
                            } else {
                                echo "Oy Kullan";
                            }
                            ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <br>
            <div class="banner">
                <div>
                    <h2>Seçim Sonuçlarını Takip Et</h2>
                    <a href="/ajanslar.php" class="btn">Ajansları Gör</a>
                </div>
                <img draggable="false" class="<?php leftRight()?>" src="https://cdn.discordapp.com/attachments/996815021109674054/1151225711378575512/urban-sports-fans-watch-the-olympic-games-on-tv.png" alt="">
            </div>
        </center>
    </div>
</body>

</html>