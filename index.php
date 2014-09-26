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
                <input type="text" name="antal" value="1">
                <input type="submit" name="action" value="add">
                <input type="hidden" name="produkt" value="satan">
            </form>

        </div>

        <div>

            <p>no satan</p>
            <form>
                <input type="text" name="antal" value="1">
                <input type="submit" name="action" value="add">
                <input type="hidden" name="produkt" value="inte_satan">
            </form>     

        </div>
        <?php
        session_start();

        $tmp_antal = 0;
        $indexOfArray=0;
        
        if (isset($_SESSION["kundvagn"])) {

            //kolla om vi har data
            if (isset($_GET['antal'])) {
                $tmp_antal = $_GET['antal'];
                
                //loopa vagnen
                foreach ($_SESSION["kundvagn"] as $grej) {
                    
                    //loopa ev produkt i vagnen
                    foreach ($grej as $nyckel => $val) {
                        if ($nyckel == 'antal') {
                            
                            //kolla rätt prod
                            
                            
                            //öka prod antal
                            $_SESSION["kundvagn"][0]["antal"] = $_SESSION["kundvagn"][0]["antal"] + $tmp_antal;
                            
                            
                            
                
                        }
                    }
                }
                var_dump($_SESSION['kundvagn']);
            }
        } 
        
        

        
        
        
        
        else {
            $_SESSION["kundvagn"] = array();

            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Satan", "pris" => 666, "antal" => 0);
            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Inte Satan", "pris" => 123, "antal" => 0);
        }
        ?>

    </body>
</html>
