<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>international-sport </title>
    <link rel="stylesheet" href="../css/style3.css">
    <link rel="stylesheet" href="../css/dannyheader.css">
</head>

<body>
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

    <fieldset>
        <!-- Dit is de feedback-->
        <div class="feedbackinh">
            <!-- Hier moet je je email schrijven  -->
            <div class="email">
                <label for="email">emailadres:</label>
                <input type="email" name="email" placeholder="mijn@mail." reguired>
                <br>
            </div>

            <!-- Hier moet je je naam schrijven  -->
            <label for="naam">naam:</label>
            <input type="text" id="naam" name="naam" size="30" required> <br>

            <!-- Hier mag je je telefoon nummer schrijven  -->
            <label for="nummer">telefoonnummer:</label>
            <input type="text" id="nummer" name="nummer" size="30"><br>

            <!-- Hier kan je je commentaar schrijven  -->
            <label for="feedback">feedback:</label>
            <br>
            <textarea name="commentaar" cols="40" rows="10" placeholder="hier kun je uw feedback intikken">
        </textarea>
            <!-- dit is een button waarmee je het feedback kan verzenden  -->
            <button type="submit" class="send"> verstuuren</button>
        </div>
    </fieldset>

    <footer>
        <div class="container">
            <div class="secoverons">
                <h2>Over ons</h2>
                <p>Hallo allemaal, mijn naam is Mnr.Sport ik ga al 10+ jaar
                    naar de sportschool en heb ook mijn eigen sportschool.
                    Maar ik vond altijd dat er niet genoeg betrouwbare websites
                    zijn voor mensen die naar de gym gaan. Daarom heb ik deze website laten maken.
                    Voor iedereen die ernaar wilt kijken.
                </p>
            </div>
            <div class="locatie">
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