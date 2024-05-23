<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>international-sport</title>
    <link rel="stylesheet" href="../css/workout.css">
    <link rel="stylesheet" href="../css/dannyheader.css">
</head>

<body>
<?php
/** @var mysqli $db */
require_once "../includes/connection.php";

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$get_articles = "SELECT id, title, content, author, img_path, img_alignment FROM workout_article";
$result_articles = $db->query($get_articles);

$get_goals = "SELECT id, title, content, author FROM goal";
$result_goals = $db->query($get_goals);

$articles = [];
$goals = [];

if ($result_articles->num_rows > 0) {
    while($row = $result_articles->fetch_assoc()) {
        $articles[] = $row;
    }
}

if ($result_goals->num_rows > 0) {
    while($row = $result_goals->fetch_assoc()) {
        $goals[] = $row;
    }
}
?>

    <header class="header-main">
        <div class="logo">
            <img src="../img/Logo.png" alt="logo">
            <nav class="navbar">
                <ul>
                    <li><a href="http://localhost/ALA-Blog/html/workout.php">work-out</a></li>
                    <li><a href="http://localhost/ALA-Blog/html/voeding.php">voeding</a></li>
                    <li><a href="http://localhost/ALA-Blog/html/feedback.php">feedback</a></li>
                </ul>
            </nav>
        </div>
        <div class="winkelmand">
            <a href="winkelmand.html"><div class="winkelmand-icon"></div></a>
            <a href="inlog.php"><div class="winkelmand-avatar"></div></a>
        </div>
    </header>

    <div class="workout-wrapper">

        <div class="workout-intro">
            <h1> Work-out </h1>
            <p>
                Workouts gaan niet alleen over overmatig zweten of zware gewichten tillen; ze zijn de sleutel tot het ontgrendelen van je fysieke en mentale potentieel.
                Regelmatige lichaamsbeweging opnemen in je routine biedt tal van voordelen, van het verbeteren van je algehele gezondheid tot het stimuleren van je humeur en het verhogen van je kwaliteit van leven.
                In deze tekst zullen we de diverse wereld van workouts verkennen, inzichten bieden in verschillende soorten oefeningen en de opmerkelijke impact die ze kunnen hebben op jouw welzijn.
            </p>
        </div>

        <div class="workout-articles-wrapper">
            <h2> Workout artikelen </h2>

            <?php
                for($i = 0; $i < count($articles); $i++) {
                    echo
                        '<div class="workout-article"">
                            <img src="' . $articles[$i]["img_path"] . '" alt="Sportende persoon">
                            <div>
                                <h2>' . $articles[$i]["title"] . '</h2>
                                <p>
                                    ' . $articles[$i]["content"] . '
                                </p>
                            </div>
                        </div>';
                }
            ?>
        </div>

        <div class="workout-doelen-wrapper">
            <h2>Het stellen van workout doelen</h2>
            <div class="workout-doelen">

                <?php
                for($i = 0; $i < count($goals); $i++) {
                    echo
                        '<div>
                            <h4> ' . $goals[$i]["title"] . ' </h4>
                            <p>
                                ' . $goals[$i]["content"] . '
                            </p>
                        </div>';
                }
                ?>

            </div>
        </div>

        <div class="workout-conclusie">
            <h2> Conclusie </h2>
            <p>
                Workouts zijn een krachtig middel om je lichaam en geest te transformeren. Door een verscheidenheid aan soorten oefeningen in je routine op te nemen,
                duidelijke doelen te stellen en consistentie en veiligheid te prioriteren, kun je je volledige potentieel ontgrendelen en genieten van een gezonder,
                gelukkiger leven. Dus, trek je sportschoenen aan, pak je yogamat of ga naar de sportschool en begin aan een reis naar een sterkere, levendigere versie van jezelf dankzij de magie van workouts.
            </p>
        </div>

    </div>

    <footer>
        <div class="container">
            <div class="secoverons">
                <!-- Dit is de texst over wie mr.sport is en wat die wilt berijken -->
                <h2>Over ons</h2>
                <p>Hallo allemaal, mijn naam is Mnr.Sport ik ga al 10+ jaar
                    naar de sportschool en heb ook mijn eigen sportschool.
                    Maar ik vond altijd dat er niet genoeg betrouwbare websites
                    zijn voor mensen die naar de gym gaan. Daarom heb ik deze website laten maken.
                    Voor iedereen die ernaar wilt kijken.
                </p>
            </div>
            <div class="locatie">
                <!-- Dit is de locatie van de gym zelf-->
                <h2>locatie</h2>
                <p>Mijn gym heet: International-sport. je kan ons vinden bij Haarsteegsestraat 141 5254 JN.</p>
            </div>
        </div>
    </footer>
</body>

<script type="text/javascript">
    window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0)
    })
</script>

</html>