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
            echo "<h1>Quejas 2º ASIR 23/24</h1>";
            if(empty($_GET["alu"])) $_GET["alu"]="Alumno";
            if($_GET["alu"] != "Admin")
            echo "
            <form action=".$_SERVER["PHP_SELF"]." method='post'>
                <b>Alumno</b><br>
                <select name='alumno'>
                <option value='Anonimo'>Anónimo</option>
                <option value='Mohamed'>Mohamed</option>
                <option value='Nassera'>Nassera</option>
                <option value='Daniel'>Daniel</option>
                <option value='Claudia'>Claudia</option>
                <option value='Najat'>Najat</option>
                <option value='Emilio'>Emilio</option>
                <option value='Jorge'>Jorge</option>
                <option value='Marek'>Marek</option>
                <option value='JuanCarlos'>Juan Carlos</option>
                <option value='Alex'>Álex</option>
                <option value='Michael'>Michael</option>
                <option value='Aquila'>Áquila</option>
                <option value='Javier'>Javier</option>
                <option value='Julian'>Julián</option>
                <option value='Juan Pablo'>Juan Pablo</option>
                <option value='Ainhoa'>Ainhoa</option>
                <option value='Kike'>Enrique</option>
                <option value='Alfredo'>Alfredo</option>
                </select><br><br>
                <b>Profesor</b><br>
                <select name='profesor'>
                <option value='Amaya'>Amaya</option>
                <option value='Carmen'>Carmen</option>
                <option value='Jesus Mari'>Jesus Mari</option>
                <option value='Jon'>Jon</option>
                <option value='Orlando'>Orlando</option>
                <option value='Pablo'>Pablo</option>
                <option value='Otro'>Otro</option>
                </select><br><br>
                <b>Comentario</b><br>
                <textarea name='comentario' rows='10' cols='50' autofocus placeholder='Escribe aquí algo que quieras que le diga a un profesor.' required></textarea><br><br>
                <input type=submit name='dale' value='Submit'>
            </form>";

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