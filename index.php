<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Carl Ekcarl af Carlek</title>
    </head>
    <style>
        *{
            overflow: auto;
        }
        ul{
            float:left;
            border:solid thin black;
            padding:15px;
            list-style-type: none;
            margin-left: 10px;
        }
        #forms{
            float:left;
            border:solid thin black;
            padding:15px;
        }
        h2{
            padding-left:10px;
        }
    </style>
    <body>
        <div id="forms">
        <div>

            <p>Satan</p>
            <form>
                <input type="text" name="antal" value="1">
                <input type="submit" name="action" value="add">
                <input type="hidden" name="produkt" value="0">
            </form>

        </div>

        <div>

            <p>no satan</p>
            <form>
                <input type="text" name="antal" value="1">
                <input type="submit" name="action" value="add">
                <input type="hidden" name="produkt" value="1">
            </form>     

        </div>
        <div>

            <p>Nummer tre</p>
            <form>
                <input type="text" name="antal" value="1">
                <input type="submit" name="action" value="add">
                <input type="hidden" name="produkt" value="2">
            </form>     

        </div>
        </div>
        <?php
        session_start();

        $tmp_antal = 0;
        $indexOfArray=0;
        
        echo '<h2>Kundvagn</h2>';
        
        if (isset($_SESSION["kundvagn"])) {

            //kolla om vi har data
            if(isset($_GET['antal']) && $_GET['antal']>0){
            if (isset($_GET['antal'])) {
                $tmp_antal = $_GET['antal'];
                $tmp_produkt = $_GET['produkt'];
                //loopa vagnen
                foreach ($_SESSION["kundvagn"] as $grej) {
                    
                    //loopa ev produkt i vagnen
                    foreach ($grej as $nyckel => $val) {
                        if ($nyckel == 'antal') {
                            
                            
                            
                            //öka prod antal
                            
                            $_SESSION["kundvagn"][$tmp_produkt]["antal"] = $_SESSION["kundvagn"][$tmp_produkt]["antal"] + $tmp_antal;
                            $tmp_antal -= $tmp_antal;
                            
                            
                
                        }
                        
                        
                        
                        
                        
                        
                    }
                }
            }
            }
            
            foreach($_SESSION["kundvagn"] as $item){
                            
                            echo '<ul>';
                            foreach($item as $info){
                                echo '<li>';
                                echo $info;
                                echo '</li>';
                            }
                            echo '<form>'
                            . '<input type="hidden" name="produkt" value="$item">'
                            . '<input type="submit">'
                            . '</form>';
                            echo '</ul>';
                            
                        }
        } 
        
        

        
        
        
        
        else {
            $_SESSION["kundvagn"] = array();

            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Satan", "pris" => 666, "antal" => 0);
            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Inte Satan", "pris" => 10, "antal" => 0);
            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Nummer 3", "pris" => 50, "antal" => 0);
        }
        ?>

    </body>
</html>
