<form action="./calculer.php" method="post">

<?php
session_start();

$formeChoisie = $_POST["Forme"];

switch($formeChoisie)
{
    case 'carre':
        echo '<label for="coteCarre">Longueur d\'un coté</label><br>
        <input type="text" placeholder="Longueur" name="coteCarre" required><br>';
        session_regenerate_id();
        $_SESSION['forme'] = $formeChoisie;
        break;
    case 'rectangle':
        echo '<label for="coteRectangleUn">Largeur du rectangle</label><br>
        <input type="text" placeholder="Longueur" name="coteRectangleUn" required><br>';
        echo '<label for="coteRectangleDeux">Longueur du rectangle</label><br>
        <input type="text" placeholder="Largeur" name="coteRectangleDeux" required><br>';
        session_regenerate_id();
        $_SESSION['forme'] = $formeChoisie;
        break;
    case 'triangle':
        session_regenerate_id();
        echo '<label for="coteTriangleUn">Longueur coté 1 du triangle</label><br>
        <input type="text" placeholder="Cote 1" name="coteTriangleUn" required><br>';
        echo '<label for="coteTriangleDeux">Longueur coté 2 du triangle</label><br>
        <input type="text" placeholder="Cote 2" name="coteTriangleDeux" required><br>';
        echo '<label for="coteTriangleTrois">Longueur coté 3 du triangle</label><br>
        <input type="text" placeholder="Cote 3" name="coteTriangleTrois" required><br>';
        $_SESSION['forme'] = $formeChoisie;
        break;
    case 'cercle':
        session_regenerate_id();
        echo '<label for="rayonCercle">Rayon du cercle</label><br>
        <input type="test" placeholder="Rayon" name="rayonCercle" required><br>';
        $_SESSION['forme'] = $formeChoisie;
        break;
    default:
        echo 'Erreur : Veuillez passer par les formulaires<br><a href="index.php">Retour au début</a>';
}
?>
<button type="submit" value="envoyer">Choisir</button>
</form>
