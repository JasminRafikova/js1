<?

require './connection/connection.php';

global $connection;

$news = $connection->query("SELECT * FROM news")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SR.01</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/media/logo/logo-short.svg" type="image/x-icon">
    <script src="./assets/js/index.js" defer></script>
</head>

<body>

    <?

    require './components/header.php';

    if (isset($_GET["page"])) {
        if ($_GET["page"] == 'home') {
            require './pages/home.php';
        } else if($_GET["page"] == 'card') {
            require './pages/card.php';
        }
    } else {
        require './pages/home.php';
    }

    require './components/footer.php';

    ?>

</body>

</html>