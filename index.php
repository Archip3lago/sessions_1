<!DOCTYPE html>
<!--http://www.youtube.com/watch?v=3BN6MSB81dA-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kundvagn</title>
    </head>
    <style>
        *{
            overflow: auto;
        }
        ul{
            float:left;
            border-right: 2px solid black;
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

        $summa = 0;
        $summa_item = 0;
        $tmp_antal = 0;
        $indexOfArray = 0;
        $n = 0;

        echo '<h2>Kundvagn</h2>';

        if (isset($_SESSION["kundvagn"])) {

            //kolla om vi har data
            if (isset($_GET['antal']) && $_GET['antal'] > 0) {
                if (isset($_GET['antal'])) {
                    $tmp_antal = $_GET['antal'];
                    $tmp_produkt = $_GET['produkt'];

                    $_SESSION["kundvagn"][$tmp_produkt]["antal"] = $_SESSION["kundvagn"][$tmp_produkt]["antal"] + $tmp_antal;
                    $_SESSION["kundvagn"][$tmp_produkt]["summa"] = $_SESSION["kundvagn"][$tmp_produkt]["antal"] * $_SESSION["kundvagn"][$tmp_produkt]["pris"];
                    foreach ($_SESSION["kundvagn"] as $grej) {
                        $summa = $summa + $grej["summa"];
                    }
                }
            }
            //ta bort saker
            if (isset($_GET['action']) and $_GET['action'] == "delete") {
                
                
                //DEN HÄR RADEN FUNGERAR INTE AV OKÄND ANLEDNING -SOLVEPLS
                $summa -= $_SESSION["kundvagn"][$_GET["id"]["summa"]];
                
                
                $_SESSION["kundvagn"][$_GET["id"]]["antal"] = 0;
            } else {
                
            }

            foreach ($_SESSION["kundvagn"] as $item) {

                if ($item["antal"] > 0) {
                    echo '<ul>';
                    foreach ($item as $info => $inget) {
                        if($info != "id"){
                        echo '<li>';
                        echo $inget;
                        echo '</li>';
                        }
                    }

                    echo $summa;
                    echo '<form>'
                    . '<input type="submit" name="action" value="delete">'
                    . "<input type='hidden' name='id' value='" . $item['id'] . "'>"
                    . '</form>';
                    echo '</ul>';
                    
                }
            }
        } else {
            $_SESSION["kundvagn"] = array();

            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Satan", "pris" => 666, "antal" => 0, "summa" => 0, "id" => 0);
            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Inte Satan", "pris" => 10, "antal" => 0, "summa" => 0, "id" => 1);
            $_SESSION["kundvagn"][] = array("ProduktNamn" => "Nummer 3", "pris" => 50, "antal" => 0, "summa" => 0, "id" => 2);
        }
        ?>

    </body>
</html>




