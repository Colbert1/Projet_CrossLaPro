<?php
include "header.php";
?>
    <title>Historique</title>
</head>
<body>
    <!--Header-->
    <div>
    <?php     
        include "navbar.php";
    ?>
    </div>
    <!--Body-->
    <div class="mid">
        <div>
            <form method="POST" action="">
                <select name="selector">
                    <?php 
                        $classement = new Classement($bdd);
                        $courses = $classement->selectCourse();
                        echo '<option value="0" selected>Sélectionner la course</option>';
                        $i=1;
                        foreach($courses as $course)
                        {
                            echo "<option id='option    {$i}' value='{$course['crs_nom']}'>{$course['crs_nom']}</option>"; 
                            $i++;
                        }
                    ?>
                </select>
            </form>
        </div>
        <script src="API/callRequestHistorique.js"></script>
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
</body>