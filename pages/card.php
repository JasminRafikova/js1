<?
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $new = $connection->query("SELECT * FROM `news` WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }
?>

<!-- banner -->
<div class="banner">
    <div class="banner-content section-1200">
        <h2><?=$new['name']?></h2>
        <p><?=$new["desc"]?></p>
    </div>
</div>
<!-- end banner -->

<!-- card -->
<div class="card section-1200">
    <div class="card-content">
        <div class="card-img">
            <img src="<?=$new["img"]?>" alt="">
        </div>

        <div class="card-title">
            <p><?=$new["date"]?></p>

            <div class="card-words">
                <p>Words: </p>
                <p><?=$new["words"]?></p>
            </div>
        </div>

        <div class="card-text">
            <p><?=$new["text"]?></p>
        </div>

        <div class="card-track">
            <div class="track-block">
                <div class="track-icon">
                    <img src="assets\media\card\icon.svg" alt="">
                </div>

                <div class="track-img">
                    <img src="assets\media\card\image-track.png" alt="">
                </div>

                <div class="track-text">
                    <h3><?=$new["track"]?></h3>
                    <p>VV</p>
                </div>

                <div class="track-play">
                    <img src="assets\media\card\line.png" alt="">
                    <img src="assets\media\card\play.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <?
    if (isset($_POST["sub"])) {
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
<!-- end card -->