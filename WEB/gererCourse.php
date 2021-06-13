<!-- 
    APPEL DES FONCTIONS DE THEO:
    - DEMARRER COURSE
    - ARRETER COURSE 
    
    DANEL AFFICHAGE EN TEMPS REEL DU TEMPS DE LA COURSE
 -->
<?php
include "header.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Page Principale</title>
</head>

<body class="bg-blue-300 h-screen">
    <div class="container mx-auto flex justify-center grid justify-items-start m-40">

        <div class="w-full max-w-xs pt-6">
            <div class="mb-4 text-center">
                <div class="shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-400">
                    <span>0 h</span> :
                    <span>0 min</span> :
                    <span>0 s</span>

                </div>
                <button id="start" class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" onclick="start()">Start</button>
                <button id="stop" class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" onclick="stop()">Stop</button>
                <button id="reset" class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" onclick="reset()">Reset</button>
            </div>

        </div>
    </div>
</body>
<script type="text/javascript">
    /*la fonction getElementByTagName renvoie une liste des éléments portant le nom de balise donné ici "span".*/
    var sp = document.getElementsByTagName("span");
    var btn_start = document.getElementById("start");
    var btn_stop = document.getElementById("stop");
    var t;
    var ms = 0,
        s = 0,
        mn = 0,
        h = 0;

    /*La fonction "start" démarre un appel répétitive de la fonction update_chrono par une cadence de 100 milliseconde en utilisant setInterval et désactive le bouton "start" */

    function start() {
        t = setInterval(update_chrono, 100);
        btn_start.disabled = true;

    }
    /*La fonction update_chrono incrémente le nombre de millisecondes par 1 <==> 1*cadence = 100 */
    function update_chrono() {
        ms += 1;
        /*si ms=10 <==> ms*cadence = 1000ms <==> 1s alors on incrémente le nombre de secondes*/
        if (ms == 10) {
            ms = 1;
            s += 1;
        }
        /*on teste si s=60 pour incrémenter le nombre de minute*/
        if (s == 60) {
            s = 0;
            mn += 1;
        }
        if (mn == 60) {
            mn = 0;
            h += 1;
        }
        /*afficher les nouvelle valeurs*/
        sp[0].innerHTML = h + " h";
        sp[1].innerHTML = mn + " min";
        sp[2].innerHTML = s + " s";
        sp[3].innerHTML = ms + " ms";

    }

    /*on arrête le "timer" par clearInterval ,on réactive le bouton start */
    function stop() {
        clearInterval(t);
        btn_start.disabled = false;

    }
    /*dans cette fonction on arrête le "timer" ,on réactive le bouton "start" et on initialise les variables à zéro */
    function reset() {
        clearInterval(t);
        btn_start.disabled = false;
        ms = 0, s = 0, mn = 0, h = 0;
        /*on accède aux différents span par leurs indice*/
        sp[0].innerHTML = h + " h";
        sp[1].innerHTML = mn + " min";
        sp[2].innerHTML = s + " s";
        sp[3].innerHTML = ms + " ms";
    }
</script>

</html>