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
        <script src="API/callRequest2.js"></script>
        <table id="tab" data-order='[[ 1, "asc" ]]' data-page-length='25'>
            <thead>
                <tr>
                    <th data-class-name="priority">Rang</th>
                    <th>Nom</th>
                    <th>Classe</th>
                    <th>Temps</th>
                    <th>Tour</th>
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