<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>international-sport </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dannyheader.css">
</head>

<body>
    <!-- dit is voor de navbar-->
    <header class="header-main">
        <div class="logo">
            <img src="img/Logo.png" alt="logo">
            <nav class="navbar">
                <ul>
                    <li><a href="html/workout.html">work-out</a></li>
                    <li><a href="html/voeding.html">voeding</a></li>
                    <li><a href="html/feedback.html">feedback</a></li>
                </ul>
            </nav>
        </div>
        <div class="winkelmand">
            <a href="winkelmand.html"><div class="winkelmand-icon"></div></a>
            <a href="inlog.php"><div class="winkelmand-avatar"></div></a>
        </div>
    </header>
    <!--dit is de inleiding en achtergrond van de landing page-->
    <div class="container-inleiding">
        <section class="banner"><img src="img/achtergrond.jpg" alt="background" height="100%" width="100%"></section>
        <div class="inleidinghome">
            <h1>International-sport</h1>
            <p>Welkom bij International-sport Jouw Gids naar een Gezonder, Sterker Leven!
    
                Ben je op zoek naar een gezondere levensstijl? Wil je je fysieke kracht vergroten, je energieniveau verhogen en je algehele welzijn verbeteren? Dan ben je op de juiste plek beland!
                
                Bij international-sport begrijpen we dat het behalen van je fitnessdoelen een reis is, en we zijn hier om je te begeleiden op elke stap van die reis. Of je nu een doorgewinterde atleet bent of net begint aan je fitnessavontuur, onze website biedt een schat aan waardevolle informatie, tips en bronnen om je te helpen je doelen te bereiken en je beste zelf te worden.
                
                Onze missie is simpel maar krachtig: we willen mensen inspireren, motiveren en voorzien van de kennis en tools die ze nodig hebben om actiever en gezonder te leven. Of je nu op zoek bent naar trainingsschema's, voedingsadvies, motivatie, of gewoon wat tips om gezonder te leven, je vindt het hier allemaal.
            </p>
        </div>
    </div>
    <!--hier begint de footer-->
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
<!--dit is de javascript voor het navbar-->
<script type="text/javascript">
    window.addEventListener("scroll", function () {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0)
    })
</script>

</html>