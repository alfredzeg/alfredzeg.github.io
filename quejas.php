<!DOCTYPE html>
<html>
    <head>
        <title>Envía tus Quejas</title>
        <meta charset="utf-8">
        <style>
            textarea{
                resize:none;
            }
        </style>
    </head>

    <body>
        <?php
            if(empty($_GET["alu"])) $_GET["alu"]='Alumno';
            if(isset($_POST["dale"])){
                $file = "quejas.bin";
                $texto = unserialize(file_get_contents($file));
                $valor = array($_POST["alumno"],$_POST["profesor"],date("d/m/Y"),$_POST["comentario"]);
                if(is_array($texto)){
                    array_push($texto,$valor);
                } else {
                    $texto = array($valor);
                }
                file_put_contents($file,serialize($texto));
            }

            if($_GET["alu"] == "Admin"){
                $file = "quejas.bin";
                $texto = unserialize(file_get_contents($file));
                foreach($texto as $i){
                    echo "<p><b>$i[0]</b> sobre <b>$i[1]</b> ($i[2]):<br>
                        $i[3]</p>";
                }
            }  
        ?>
    </body>
</html>