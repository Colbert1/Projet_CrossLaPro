<?php

class Image
{
    private $_idImage;
    private $_image;
    private $_course;
    private $_bdd;

    public function __construc($bdd)
    {
        $this->_bdd = $bdd;
    }
    //Insertion en base des fichiers de la déclaration
    public function enregistrerFichier($nomFichier, $extenFichier)
    {
        $req = $this->_bdd->prepare("INSERT INTO `imagecourse_tbl`(`imgc_fichier`, `imgc_extension`,`imgc_id` ) VALUES imgc_fichier = :nom , imgc_extension = :extens");
        $req->bindParam('nom', $nomFichier, PDO::PARAM_STR);
        $req->bindParam('extens', $extenFichier, PDO::PARAM_STR);
        $req->execute();
    }
    //RECUPERER LES NOMS ET L'EXTENSION DES FICHIERS JOINTS DE LA COURSE S'IL Y EN A
    public function getFichier($course)
    {
        $req = $this->_bdd->prepare("SELECT `imgc_fichier`, `imgc_extension` FROM `imagecourse_tbl` WHERE crs_id = :course");
        $req->bindParam('course', $course, PDO::PARAM_INT);
        $req->execute();
    }
}
