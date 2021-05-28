<?php
include "header.php";
include "navbar.php";
?>
    <title>Classement</title>
</head>

<body>
    <!--Haut de page-->
    <div>
    </div>
    <!--Milieu de page-->
    <div class="mid">
        <script src="API/callRequest.js"></script>
        <table id="tab" data-order='[[ 1, "asc" ]]' data-page-length='25'>
            <thead>
                <tr>
                    <th id="clRang" data-class-name="priority">Rang</th>
                    <th id="clNom">Nom</th>
                    <th id="clClasse">Classe</th>
                    <th id="clTemps">Temps</th>
                    <th id="clTour">Tour</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
    <!--Bas de page-->
    <div>
    </div>
</body>

</html>