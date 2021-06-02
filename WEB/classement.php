<?php
include "header.php";
?>
    <title>Classement</title>
</head>

<body>
    <!--Haut de page-->
    <div>
        <?php 
        include "navbar.php";
        ?>
    </div>
    <!--Milieu de page-->
    <div class="mid">
    <?php
        echo '<option value="0" selected>Sélectionner la course</option>';
        foreach ($result as $ligne) {
            echo "<option value='{$ligne['crs_id']}'>"
            . $ligne['crs_nom'] . "</option>";
        }
    ?>
        <script src="API/callRequest2.js"></script>
        <table>
            <thead>
                <tr class="border border-blue-200 border-opacity-50 bg-gray-100">
                    <th class="w-32">Rang</th>
                    <th class="w-32">Nom</th>
                    <th class="w-32">Prénom</th>
                    <th class="w-32">Classe</th>
                    <th class="w-32">Temps</th>
                </tr>
            </thead>
            <tbody id="tab">
            </tbody>
        </table>
    </div>
    <!--Bas de page-->
    <div>
    </div>
</body>

</html>