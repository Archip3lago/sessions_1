<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Carl Ekcarl af Carlek</title>
    </head>
    <body>
        <div>

            <p>Satan</p>
            <form>
                <input type="text" name="satan" value="1">
                <input type="submit" name="action" value="add">
            </form>

        </div>

        <div>

            <p>no satan</p>
            <form>
                <input type="text" name="no_satan" value="1">
                <input type="submit" name="action" value="add">
            </form>     

        </div>
        <?php
        session_start();


        if (isset($_SESSION["carl"])) {
            
            
            
            
            
            
            
            
        } else {
            $_SESSION["carl"] = array();

            $_SESSION["carl"][] = array("ProduktNamn" => "Satan", "pris" => 666, "antal" => 0);
            $_SESSION["carl"][] = array("ProduktNamn" => "Inte Satan", "pris" => 123, "antal" => 0);
        }
        ?>

    </body>
</html>
