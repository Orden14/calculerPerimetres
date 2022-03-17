<?php

// ouvrir les sessions pour retrouver la forme ($_SESSION["forme"])
session_start();

// eviter que la page plante
if(!isset($_SESSION["forme"]))
{
    echo 'Erreur : Veuillez passer par les formulaires<br><a href="index.php">Retour au début</a>';
    exit();
}

class Forme
{
    // variables
    private $_forme;
    private $_perimetre;

    // constructeur
    public function __construct($forme, $perimetre)
    {
        $this->setForme($forme);
        $this->setPerimetre($perimetre);
        echo 'Constructeur formes OK';
    }

    // getters
    public function getForme()
    {
        return $this->_forme;
    }
    public function getPerimetre()
    {
        return $this->_perimetre;
    }

    // setters
    public function setForme($forme)
    {
        $this->_forme = $forme;
    }
    public function setPerimetre($perimetre)
    {
        $this->_perimetre = $perimetre;
    }
}

// Classe fille Carré
Class Carre extends Forme
{
    private $_coteCarre;

    // Constructeur hérité
    function __construct($forme, $perimetre, $coteCarre)
    {
      parent::__construct($forme, $perimetre);
      $this->setcoteCarre($coteCarre);
    }

    // getters
    public function getcoteCarre()
    {
        return $this->_coteCarre;
    }

    // setters
    public function setcoteCarre($coteCarre)
    {
        $this->_coteCarre = $coteCarre;
    }
   

    // fonctions
    public function calculerPerimetreCarre($unCarre)
    {
        $perimetreCarre = $unCarre->getcoteCarre() * 4;
        $unCarre->setPerimetre($perimetreCarre);
        echo '<br> Le perimetre du carré de coté '.$unCarre->getcoteCarre().' est de '.$unCarre->getPerimetre();
    }
}

// Classe fille Rectangle
Class Rectangle extends Forme
{
    private $_largeurRectangle;
    private $_longueurRectangle;

    // Constructeur hérité
    function __construct($forme, $perimetre, $largeurRectangle, $longueurRectangle)
    {
      parent::__construct($forme, $perimetre); 
      $this->setlargeurRectangle($largeurRectangle);
      $this->setlongueurRectangle($longueurRectangle); 
    }

    // getters
    public function getlargeurRectangle()
    {
        return $this->_largeurRectangle;
    }
    public function getlongueurRectangle()
    {
        return $this->_longueurRectangle;
    }

    // setters
    public function setlargeurRectangle($largeurRectangle)
    {
        $this->_largeurRectangle = $largeurRectangle;
    }
    public function setlongueurRectangle($longueurRectangle)
    {
        $this->_longueurRectangle = $longueurRectangle;
    }

    // fonctions
    public function calculerPerimetreRectangle($unRectangle)
    {
        $perimetreRectangle = $unRectangle->getlongueurRectangle() * 2 + $unRectangle->getlargeurRectangle() * 2;
        $unRectangle->setPerimetre($perimetreRectangle);
        echo '<br>Le perimetre du rectangle de largeur '. $unRectangle->getlargeurRectangle() . ' et de longueur ' . $unRectangle->getlongueurRectangle() . ' est de ' . $unRectangle->getPerimetre();
    }
}

// Classe fille Triangle
Class Triangle extends Forme
{
    private $_coteTriangleUn;
    private $_coteTriangleDeux;
    private $_coteTriangleTrois;

    // Constructeur hérité
    function __construct($forme, $perimetre, $coteTriangleUn, $coteTriangleDeux, $coteTriangleTrois)
    {
      parent::__construct($forme, $perimetre);
      $this->setcoteTriangleUn($coteTriangleUn);
      $this->setcoteTriangleDeux($coteTriangleDeux);
      $this->setcoteTriangleTrois($coteTriangleTrois);
    }

    // getters
    public function getcoteTriangleUn()
    {
        return $this->_coteTriangleUn;
    }
    public function getcoteTriangleDeux()
    {
        return $this->_coteTriangleDeux;
    }
    public function getcoteTriangleTrois()
    {
        return $this->_coteTriangleTrois;
    }

    // setters
    public function setcoteTriangleUn($coteTriangleUn)
    {
        $this->_coteTriangleUn = $coteTriangleUn;
    }
    public function setcoteTriangleDeux($coteTriangleDeux)
    {
        $this->_coteTriangleDeux = $coteTriangleDeux;
    }
    public function setcoteTriangleTrois($coteTriangleTrois)
    {
        $this->_coteTriangleTrois = $coteTriangleTrois;
    }

    // fonctions
    public function calculerPerimetreTriangle($unTriangle)
    {
        $perimetreTriangle = $unTriangle->getcoteTriangleUn() + $unTriangle->getcoteTriangleDeux() + $unTriangle->getcoteTriangleTrois();
        $unTriangle->setPerimetre($perimetreTriangle);
        echo '<br>Le perimetre du triangle de cotés '. $unTriangle->getcoteTriangleUn() . ' , ' . $unTriangle->getcoteTriangleDeux() . ' , ' . $unTriangle->getcoteTriangleTrois() . ' est de ' . $unTriangle->getPerimetre();
    }
}

// Classe fille Cercle
Class cercle extends Forme
{
    // Variables
    private $_rayonCercle;

    // Constructeur hérité
    function __construct($forme, $perimetre, $rayonCercle)
    {
      parent::__construct($forme, $perimetre); 
      $this->setrayonCercle($rayonCercle);
    }

    // getters
    public function getrayonCercle()
    {
        return $this->_rayonCercle;
    }

    // setters
    public function setrayonCercle($rayonCercle)
    {
        $this->_rayonCercle = $rayonCercle;
    }

    // fonctions
    public function calculerPerimetreCercle($unCercle)
    {
        $perimetreCercle = 2 * 3.14 * $unCercle->getrayonCercle();
        $unCercle->setPerimetre($perimetreCercle);
        echo '<br>Le perimetre du cercle de rayon ' . $unCercle->getrayonCercle() . ' est de ' . $unCercle->getPerimetre();
    }
}

// Programme principal

// Créer une forme a partir des classes filles en fonction de la session
switch($_SESSION["forme"])
{
    case 'carre':
        $unCarre = new Carre($_SESSION["forme"], 0, $_POST["coteCarre"]);
        $unCarre->calculerPerimetreCarre($unCarre);
        break;
    case 'rectangle':
        $unRectangle = new Rectangle($_SESSION["forme"], 0, $_POST["coteRectangleUn"], $_POST["coteRectangleDeux"]);
        $unRectangle->calculerPerimetreRectangle($unRectangle);
        break;
    case 'triangle':
        $unTriangle = new Triangle($_SESSION["forme"], 0, $_POST["coteTriangleUn"], $_POST["coteTriangleDeux"], $_POST["coteTriangleTrois"]);
        $unTriangle->calculerPerimetreTriangle($unTriangle);
        break;
    case 'cercle':
        $unCercle = new Cercle($_SESSION["forme"], 0, $_POST["rayonCercle"]);
        $unCercle->calculerPerimetreCercle($unCercle);
        break;
    default:
        echo 'Fetch error';
}

echo '<br><a href="index.php">Retour au début</a>';

// Detruire les sessions en cours
session_destroy();
?>