<?php

    $flag = false;
    $styleOutput = ""; 

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (isset($_POST['bodyColorOption'])){
                $flag = true;

                $bodyColor = $_POST['bodyColorOption'];
                $cssColor = "";
                switch ($bodyColor){
                    case "redBody":
                    $cssColor = "red";
                        break;
                    case "blueBody":
                    $cssColor = "blue";
                        break;
                    case "greenBody":
                    $cssColor = "green";
                        break;
                    case "yellowBody":
                    $cssColor = "yellow";
                        break;
                    case "whiteBody":
                    $cssColor = "white";
                        break;
                    case "blackBody":
                    $cssColor = "black";
                        break;
                    case "pinkBody":
                    $cssColor = "pink";
                        break;
                    case "chocolateBody":
                    $cssColor = "brown";
                        break;
                    default:
                    $cssColor = "black";
                }

                $tfz = $_POST['TitleFontSizeOption'];
                $csstfz = "";
                switch ($tfz){
                    case "tfz16":
                    $csstfz = "16px";
                        break;
                    case "tfz17":
                    $csstfz = "17px";
                        break;
                    case "tfz18":
                    $csstfz = "18px";
                        break;
                    case "tfz19":
                    $csstfz = "19px";
                        break;
                    case "tfz20":
                    $csstfz = "20px";
                        break;
                    case "tfz21":
                    $csstfz = "21px";
                        break;
                    case "tfz22":
                    $csstfz = "22px";
                        break;
                    case "tfz23":
                    $csstfz = "23px";
                        break;
                    default:
                    $csstfz = "16px";
                }


                $tfc = $_POST['TitleFontColorOption'];
                $csstfc = "";
                switch ($tfc){
                    case "redBody":
                    $csstfc = "red";
                        break;
                    case "blueBody":
                    $csstfc = "blue";
                        break;
                    case "greenBody":
                    $csstfc = "green";
                        break;
                    case "yellowBody":
                    $csstfc = "yellow";
                        break;
                    case "whiteBody":
                    $csstfc = "white";
                        break;
                    case "blackBody":
                    $csstfc = "black";
                        break;
                    case "pinkBody":
                    $csstfc = "pink";
                        break;
                    case "chocolateBody":
                    $csstfc = "brown";
                        break;
                    default:
                    $csstfc = "black";
                }


                $pfz = $_POST['pFontSizeOption'];
                $csspfz = "";
                switch ($pfz){
                    case "pfz16":
                    $csspfz = "16px";
                        break;
                    case "pfz17":
                    $csspfz = "17px";
                        break;
                    case "pfz18":
                    $csspfz = "18px";
                        break;
                    case "pfz19":
                    $csspfz = "19px";
                        break;
                    case "pfz20":
                    $csspfz = "20px";
                        break;
                    case "pfz21":
                    $csspfz = "21px";
                        break;
                    case "pfz22":
                    $csspfz = "22px";
                        break;
                    case "pfz23":
                    $csspfz = "23px";
                        break;
                    default:
                    $csspfz = "16px";
                }


                $pfc = $_POST['pFontColorOption'];
                $csspfc = "";
                switch ($pfc){
                    case "redBody":
                    $csspfc = "red";
                        break;
                    case "blueBody":
                    $csspfc = "blue";
                        break;
                    case "greenBody":
                    $csspfc = "green";
                        break;
                    case "yellowBody":
                    $csspfc = "yellow";
                        break;
                    case "whiteBody":
                    $csspfc = "white";
                        break;
                    case "blackBody":
                    $csspfc = "black";
                        break;
                    case "pinkBody":
                    $csspfc = "pink";
                        break;
                    case "chocolateBody":
                    $csspfc = "brown";
                        break;
                    default:
                    $csspfc = "black";
                }

                setcookie("bodyColor", $cssColor, 0, "", "", false, false);
                setcookie("tfz", $csstfz, 0, "", "", false, false);
                setcookie("tfc", $csstfc, 0, "", "", false, false);
                setcookie("pfz", $csspfz, 0, "", "", false, false);
                setcookie("pfc", $csspfc, 0, "", "", false, false);
                echo "<meta http-equiv='Refresh' content='0; url='index.php' />";
            }
        }
        ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Шестая лабораторная работа по ВТ</title>
    </head>

    


    <body>
        
        <?php

            $styleOutput .= "<style>";
            if (isset($_COOKIE["bodyColor"])){
                $flag = true;
                $bodyColor = $_COOKIE["bodyColor"];
                $styleOutput .= "body{ background-color: $bodyColor; }";
            }
            if (isset($_COOKIE["tfz"])){
                $flag = true;
                $tfz = $_COOKIE["tfz"];
                $styleOutput .= ".HeaderDiv{ font-size: $tfz; }";
            }
            if (isset($_COOKIE["tfc"])){
                $flag = true;
                $tfc = $_COOKIE["tfc"];
                $styleOutput .= ".HeaderDiv{ color: $tfc; }";
            }
            if (isset($_COOKIE["pfz"])){
                $flag = true;
                $pfz = $_COOKIE["pfz"];
                $styleOutput .= ".ParagraphDiv{ font-size: $pfz; }";
            }
            if (isset($_COOKIE["pfc"])){
                $flag = true;
                $pfc = $_COOKIE["pfc"];
                $styleOutput .= ".ParagraphDiv{ color: $pfc; }";
            }
            $styleOutput .= "</style>";

            if ($flag == true)
                echo $styleOutput;
        ?>
        
        <div class="mainContent">
            <div class="HeaderDiv">
                <h1>Sample_H1_Text</h1>
            </div>

            <div class="ParagraphDiv">
                <p>Sample_P_Text</p>
            </div>

            <div class="FormDiv">
                    <form method="POST" action="index.php">
                        <div class="bodyColorDiv">
                            <p>Цвет фона:</p>
                            <select name="bodyColorOption">
                                <option value="redBody" <?php if (isset($bodyColor)) if ($bodyColor=="red") echo "selected"; ?> >Красный</option>
                                <option value="blueBody" <?php if (isset($bodyColor)) if ($bodyColor=="blue") echo "selected"; ?> >Синий</option>
                                <option value="greenBody" <?php if (isset($bodyColor)) if ($bodyColor=="green") echo "selected"; ?> >Зелёный</option>
                                <option value="yellowBody" <?php if (isset($bodyColor)) if ($bodyColor=="yellow") echo "selected"; ?> >Жёлтый</option>
                                <option value="whiteBody" <?php if (isset($bodyColor)) if ($bodyColor=="white") echo "selected"; ?> >Белый</option>
                                <option value="blackBody" <?php if (isset($bodyColor)) if ($bodyColor=="black") echo "selected"; ?> >Чёрный</option>
                                <option value="pinkBody" <?php if (isset($bodyColor)) if ($bodyColor=="pink") echo "selected"; ?> >Розовый</option>
                                <option value="chocolateBody" <?php if (isset($bodyColor)) if ($bodyColor=="brown") echo "selected"; ?> >Шоколадный</option>
                            </select>
                        </div>

                        <div class="titleFontSizeDiv">
                            <p>Размер заголовка:</p>
                            <select name="TitleFontSizeOption">
                                <option value="tfz16" <?php if (isset($tfz)) if ($tfz=="16px") echo "selected"; ?> >16</option>
                                <option value="tfz17" <?php if (isset($tfz)) if ($tfz=="17px") echo "selected"; ?> >17</option>
                                <option value="tfz18" <?php if (isset($tfz)) if ($tfz=="18px") echo "selected"; ?> >18</option>
                                <option value="tfz19" <?php if (isset($tfz)) if ($tfz=="19px") echo "selected"; ?> >19</option>
                                <option value="tfz20" <?php if (isset($tfz)) if ($tfz=="20px") echo "selected"; ?> >20</option>
                                <option value="tfz21" <?php if (isset($tfz)) if ($tfz=="21px") echo "selected"; ?> >21</option>
                                <option value="tfz22" <?php if (isset($tfz)) if ($tfz=="22px") echo "selected"; ?> >22</option>
                                <option value="tfz23" <?php if (isset($tfz)) if ($tfz=="23px") echo "selected"; ?> >23</option>
                            </select>
                        </div>
                        
                        <div class="titleFontColorDiv">
                            <p>Цвет заголовка:</p>
                            <select name="TitleFontColorOption">
                                <option value="redBody" <?php if (isset($tfc)) if ($tfc=="red") echo "selected"; ?> >Красный</option>
                                <option value="blueBody" <?php if (isset($tfc)) if ($tfc=="blue") echo "selected"; ?> >Синий</option>
                                <option value="greenBody" <?php if (isset($tfc)) if ($tfc=="green") echo "selected"; ?> >Зелёный</option>
                                <option value="yellowBody" <?php if (isset($tfc)) if ($tfc=="yellow") echo "selected"; ?> >Жёлтый</option>
                                <option value="whiteBody" <?php if (isset($tfc)) if ($tfc=="white") echo "selected"; ?> >Белый</option>
                                <option value="blackBody" <?php if (isset($tfc)) if ($tfc=="black") echo "selected"; ?> >Чёрный</option>
                                <option value="pinkBody" <?php if (isset($tfc)) if ($tfc=="pink") echo "selected"; ?> >Розовый</option>
                                <option value="chocolateBody" <?php if (isset($tfc)) if ($tfc=="brown") echo "selected"; ?> >Шоколадный</option>
                            </select>
                        </div>


                        <div class="pFontSizeDiv">
                            <p>Размер абзаца:</p>
                            <select name="pFontSizeOption">
                                <option value="pfz16" <?php if (isset($pfz)) if ($pfz=="16px") echo "selected"; ?> >16</option>
                                <option value="pfz17" <?php if (isset($pfz)) if ($pfz=="17px") echo "selected"; ?> >17</option>
                                <option value="pfz18" <?php if (isset($pfz)) if ($pfz=="18px") echo "selected"; ?> >18</option>
                                <option value="pfz19" <?php if (isset($pfz)) if ($pfz=="19px") echo "selected"; ?> >19</option>
                                <option value="pfz20" <?php if (isset($pfz)) if ($pfz=="20px") echo "selected"; ?> >20</option>
                                <option value="pfz21" <?php if (isset($pfz)) if ($pfz=="21px") echo "selected"; ?> >21</option>
                                <option value="pfz22" <?php if (isset($pfz)) if ($pfz=="22px") echo "selected"; ?> >22</option>
                                <option value="pfz23" <?php if (isset($pfz)) if ($pfz=="23px") echo "selected"; ?> >23</option>
                            </select>
                        </div>

                        <div class="pFontColorDiv">
                            <p>Цвет абзаца:</p>
                            <select name="pFontColorOption">
                                <option value="redBody" <?php if (isset($pfc)) if ($pfc=="red") echo "selected"; ?> >Красный</option>
                                <option value="blueBody" <?php if (isset($pfc)) if ($pfc=="blue") echo "selected"; ?> >Синий</option>
                                <option value="greenBody" <?php if (isset($pfc)) if ($pfc=="green") echo "selected"; ?> >Зелёный</option>
                                <option value="yellowBody" <?php if (isset($pfc)) if ($pfc=="yellow") echo "selected"; ?> >Жёлтый</option>
                                <option value="whiteBody" <?php if (isset($pfc)) if ($pfc=="white") echo "selected"; ?> >Белый</option>
                                <option value="blackBody" <?php if (isset($pfc)) if ($pfc=="black") echo "selected"; ?> >Чёрный</option>
                                <option value="pinkBody" <?php if (isset($pfc)) if ($pfc=="pink") echo "selected"; ?> >Розовый</option>
                                <option value="chocolateBody" <?php if (isset($pfc)) if ($pfc=="brown") echo "selected"; ?> >Шоколадный</option>
                            </select>
                        </div>

                        <br>
                        <br>
                        <input type="submit" value="Применить"/>  
                  </form>
            </div>
        </div>
    
    </body>


</html>