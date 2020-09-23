<!doctype html>
<html>
<head>
    <title>Château de la Haute Borde</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
{{--    @extends('menu')--}}

</head>
    <body>
    <div class="menu">
    <div id="menu-content">
        <a id="menu-close" onclick="closeMobileMenu(); return false" href="#" style="display: none;">
            <i class="fal fa-times" style="z-index:99999999999999999999999999;font-size: 26px; position: absolute; right: 30px; top: 30px; color: #ffffff;"></i>
        </a>
        <ul>
            <li>
                <a href="#homePage">Chateau</a>
            </li>
            <li>
                <a href="#">Chambres</a>
            </li>
            <li>
                <a href="#">chambres</a>
            </li>
        </ul>
    </div>
    </div>

    <div class="logoo"><img src="{{ asset('images/logo.png') }}"></div>
    <div id="navigation" class="fade-delay-1">
            <div id="homePage">
                <div class="present">
                    <p>Château de la Haute Borde</p>
                    <p>is an art and nature retreat in the</p>
                    <p>heart of the Loire Valley conceived</p>
                    <p>as a space to meet, exchange, and</p>
                    <p>foster artistic creativity.</p>
                </div>
            </div>
        <div id="secondPage">
            <div class="description">
                <p class="description-title">Le Chateau</p>
                <div class="description-text">
                    <p>Situé au coeur de la vallée de la Loire, à 4km de</p>
                    <p>Chaumont et à deux heures de Paris, le CHB est</p>
                    <p>une maison</p>
                    <p>d’hôtes et une résidence d’artistes.</p>
                </div>
            </div>
        </div>
        <div id="thirdPage">
            <div class="about">
                <p> En séjournant au château vous soutenez </p>
                <p>notre programme d’artistes en résidence</p>
            </div>
        </div>
        <div id="bedroomPage">
            <div class="bedroom-text">
                <p class="title-bedroom">Chambres</p>
                <p>L’architecture se mêle à la nature : les cinq</p>
                <p>chambres ont été entièrement rénovées dans</p>
                <p>des matériaux naturels (les sols sont en coccio-</p>
                <p>pesto, le salles de bain en marbre italien et les</p>
                <p>murs en enduit) par des artisans responsables.</p>
                <p>Le mobilier design a été exclusivement chiné par</p>
                <p>nos soins.</p>
                <p class="mailto"><a href="mailto:bonjour@c-h-b.fr">Réserver</a></p>
            </div>
        </div>
        <div id="residencePage">
            <div class="residence-title">
                <img src="{{ asset('images/title.png') }}">
            </div>
            <div class="residence-text">
                <p> Retraite propice à l’isolement et à la création, le CHB veut favoriser une rencontre</p>
                <p> entre les artistes et les hôtes de passage qui pourront échanger, participer à des</p>
                <p>ateliers, assister à des événements.</p>
            </div>
            <div class="residence-text-description">
                <p>«C’est avant tout</p>
                <p>un lieu inclusif</p>
                <p>qui tend à construire</p>
                <p>une communauté</p>
                <p>dans le respect</p>
                <p>de l’environnement</p>
                <p>et des autres, une </p>
                <p>parenthèse, propice à</p>
                <p>la réflexion et à</p>
                <p>la création.»</p>
            </div>
            <div class="mailtoresidency">
                <p class="mailto"><a href="mailto:bonjour@c-h-b.fr">Demande de résidence</a></p>
            </div>
        </div>

    <div id="logo-bottom"><img src="{{ asset(
    'images/logo-bottom.png') }}"></div>
    </div>

    </body>
</html>