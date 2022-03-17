<!DOCTYPE html>
<html>
    <body>
        <form action="./selectionnervaleurs.php" method="post">
            <label for="Forme">Forme géométrique</label><br><br>
            <select name="Forme" required>
                <option value="carre">Carré</option>
                <option value="rectangle">Rectangle</option>
                <option value="triangle">Triangle</option>
                <option value="cercle">Cercle</option>
            </select><br><br>
            <button type="submit" value="envoyer">Choisir</button>
        </form>
    </body>
</html>