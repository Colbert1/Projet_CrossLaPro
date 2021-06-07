<?php

class Image
{
    private $_idImage;
    private $_image;
    private $_course;
    public function enregistrerFichier($filename, $declaId, $connexionBdd, $type)
    {
        $insertFichier = $connexionBdd->prepare("INSERT INTO `imagecourse_tbl`(`imgc_fichier`, `imgc_extension`,`imgc_id` ) VALUES (?,?,?)");
        $insertFichier->bind_param('ssd', $filename, $type, $declaId);
        $insertFichier->execute();
        $fichierId = $insertFichier->insert_id;
    }
    public function getFichier($connexionBdd, $idImage)
    {
?>
        <div class="container">
            <?php
            $requetefichier = "SELECT * FROM `imagecourse_tbl` WHERE imgc_id = $idImage ";
            $result = $connexionBdd->query($requetefichier);
            while ($ligne = $result->fetch_assoc()) {
                echo $this->afficheFichier($ligne);
            }
            ?>
        </div>
<?php
    }
    public function afficheFichier($ligne)
    {
        $type = $ligne['imgc_extension'];
        $icon = "";
        if ($type == "Image") {
            $icon = '<ion-icon name="image-outline"></ion-icon>';
        }
        $link = '<a href="/Projet_CrossLaPro/upload/"' . $ligne['imgc_fichier'] . '">' . $icon . ' - '  . $ligne['fichierjoint'] . '</a><br>';
        return $link;
    }
}
