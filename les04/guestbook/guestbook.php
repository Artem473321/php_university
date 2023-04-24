<?php
// TODO 1: PREPARING ENVIRONMENT: 1) session 2) functions
session_start();

// TODO 2: ROUTING

// TODO 3: CODE by REQUEST METHODS (ACTIONS) GET, POST, etc. (handle data from request): 1) validate 2) working with data source 3) transforming data

$aConfig = require_once 'config.php';
if (!empty(htmlspecialchars($_POST["email"]))) {
    $text = htmlspecialchars($_POST["email"]);
    $text2 = htmlspecialchars($_POST["name"]);
    $text3 = htmlspecialchars($_POST["text"]);

    echo $text;
    echo $text2;
    echo $text3;
}
if (empty($text) or empty($text2) or empty($text3)) {
    echo 'Something is empty';
} else {
    $array = array(
        "email" => $text,
        "name" => $text2,
        "text" => $text3
    );
    $db = mysqli_connect(
        $aConfig['host'],
        $aConfig ['user'],
        $aConfig ['pass'],
        $aConfig ['name']
    );
    $query = "INSERT INTO comments (email, name, text) VALUES (
    '" . $array['email'] . "',
    '" . $array['name'] . "',
    '" . $array['text'] . "'
)";
    mysqli_query($db, $query);
    mysqli_close($db);
}
// TODO 4: RENDER: 1) view (html) 2) data (from php)
?>

<!DOCTYPE html>
<html>

<?php require_once 'sectionHead.php' ?>

<body>

<div class="container">

    <!-- navbar menu -->
    <?php require_once 'sectionNavbar.php' ?>
    <br>

    <!-- guestbook section -->
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            GuestBook form
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">

                    <!-- TODO: create guestBook html form   -->
                    <form method="post" action="#" autocomplete="off">
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input name="email" type="email" class="form-control" id="email"
                                   placeholder="Введите email">
                        </div>
                        <div class="form-group">
                            <label for="name">Username </label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Введите имя">
                        </div>
                        <div class="form-group">
                            <label for="text">Текст</label>
                            <input name="text" type="text" class="form-control" id="text" placeholder="Заполни меня">
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Сomments
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                    <!-- TODO: render guestBook comments   -->
                    <?php
                    // TODO in HTML part
                    $db = mysqli_connect(
                        $aConfig['host'],
                        $aConfig['user'],
                        $aConfig['pass'],
                        $aConfig['name']
                    );
                    $query = 'SELECT * FROM comments ';
                    $dbResponse = mysqli_query($db, $query);
                    $aComments = mysqli_fetch_all($dbResponse, MYSQLI_ASSOC);
                    mysqli_close($db);
                    foreach ($aComments as $comment) {
                        echo $comment ['name'] . ' ';
                        echo $comment ['email'] . ' ';
                        echo $comment ['text'] . ' ';
                        echo $comment ['date'] . ' ';
                        echo '<hr>';
                    } ?>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
