<?
    $error = '';

    if(isset($_POST["addNews"])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $img = $_POST["img"];
        $date = $_POST["date"];
        $words = $_POST["words"];
        $track = $_POST["track"];
        $text = $_POST["text"];

        if($name == '') {
            $error .= 'Введите название<br>';
        }

        if($desc == '') {
            $error .= 'Введите краткое описание<br>';
        }

        if($img == '') {
            $error .= 'Введите ссылку на изображение<br>';
        }

        if($date == '') {
            $error .= 'Введите дату<br>';
        }

        if($words == '') {
            $error .= 'Введите автора<br>';
        }

        if($track == '') {
            $error .= 'Введите название песни<br>';
        }

        if($text == '') {
            $error .= 'Введите подробное описание<br>';
        }

        if($error == '') {
            $connection->query("INSERT INTO `news`(`name`, `desc`, `img`, `date`, `words`, `track`, `text`) VALUES ('$name','$desc','$img','$date','$words','$track','$text')");

            header('Location: ?page=home');
        }

    }
?>

<!-- add -->
<div class="add">
    <div class="add-content">
        <div class="add-close">
            <div class="add-btn js-close">
                <p>TO 1st <br> PAGE</p>
            </div>
        </div>

        <h2>ADD NEW</h2>

        <p class="error"><?=$error?></p>

        <form class="add-form" method="POST" name="addNews">
            <div class="add-input">
                <label>News headline:</label>
                <input type="text" name="name" class="input-headline">
            </div>

            <div class="add-input add-textarea">
                <label>News description(little):</label>
                <textarea name="desc"></textarea>
            </div>

            <div class="add-input">
                <label>News img(link):</label>
                <input type="text" name="img" class="input-headline">
            </div>

            <div class="add-form-block">
                <div class="add-input">
                    <label>Select date:</label>
                    <input type="text" name="date">
                </div>

                <div class="add-input">
                    <label>News words:</label>
                    <input type="text" name="words">
                </div>

                <div class="add-input">
                    <label>Spotify track:</label>
                    <input type="text" name="track">
                </div>
            </div>

            <div class="add-input add-full-texarea">
                <label>News full text:</label>
                <textarea name="text" class="full-textarea"></textarea>
            </div>

            <div class="add-form-btn">
                <input type="submit" value="Release news" name="addNews">
            </div>

        </form>
    </div>
</div>
<!-- end add -->

<!-- title -->
<div class="title">
    <div class="title-content section">
        <h2>About music...</h2>
    </div>
</div>
<!-- end title -->

<!-- add-btn -->
<div class="add-btn js-open">
    <p>ADD <br> NEW</p>
</div>
<!-- end add-btn -->

<!-- news -->
<div class="news">
    <div class="news-content section">
        <div class="news-items">

            <? foreach($news as $new) { ?>
            <div class="news-item">
                <div class="news-img">
                    <a href="?page=card&id=<?=$new['id']?>"><img src="<?=$new['img']?>" alt=""></a>
                </div>

                <div class="news-text">
                    <h3><?=$new["name"]?></h3>

                    <p><?=$new["desc"]?></p>

                    <div class="orange-block"></div>

                    <p class="news-date"><?=$new["date"]?></p>
                </div>
            </div>
            <!-- end item -->
            <? } ?>

        </div>

        <div class="news-nav">
            <p>BACK</p>
            <p>NEXT</p>
        </div>

        <?
            if(isset($_POST["sub"])) {
                $email = $_POST["email"];

                $connection->query("INSERT INTO `sub`(`email`) VALUES ('$email')");

                header('Location: ?page=home');
            }
        ?>

        <!-- sub -->
        <div class="sub content">
            <div class="sub-block">
                <h2>THE BEST OF ALL NEW! DELIVERED STRAIGHT TO YOUR INBOX THREE TIMES A WEEK. WHAT ARE YOU WAITING
                    FOR?</h2>

                <form class="sub-form" method="POST" name="sub">
                    <input type="text" placeholder="enter your email adress here" name="email">
                    <input type="submit" value="Let’s go!" class="btn" name="sub">
                </form>
            </div>
        </div>
        <!-- end sub -->

    </div>
</div>
<!-- end news -->
