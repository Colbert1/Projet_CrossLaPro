<?php
include "header.php";
$req = $bdd->query("SELECT * FROM course_tbl");
$result = $req->fetchAll(PDO::FETCH_ASSOC);
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
    <!--Body-->
    <div class="mid">
        <div>
            <form method="GET" action="">
                <select class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight" name="course">
                    <?php 
                        $classement = new Classement($bdd);
                        $courses = $classement->selectCourse();
                        echo '<option value="0" selected>Sélectionner la course</option>';
                        foreach($courses as $course)
                        {
                            echo "<option value='{$course['crs_nom']}'>
                            {$course['crs_nom']}</option>"; 
                        }
                    ?>
                </select>
                <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2" type="submit">Choisir</button>
            </form>
        </div>
        <script src="API/callRequest.js"></script>
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
</html>