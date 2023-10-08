<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Piedra Papel o Tijera</title>
    <style>
     table,th,td{
       border:1px solid black;
       border-collapse:collapse;
    }
    td {
        width: 50px;
        white-space:nowrap;
        text-align: center;
    }
    th{
        text-align: center;
        white-space:nowrap;
        padding-left:30px;
        padding-right:30px;
        
    }
    </style>
</head>
<body>
<?php
    define ('PIEDRA1',  "&#x1F91C;");
    define ('PIEDRA2',  "&#x1F91B;");
    define ('TIJERAS',  "&#x1F596;");
    define ('PAPEL',    "&#x1F91A;" );
    $msg = ["¡Empate!",
        "Ha ganado el Jugador 1",
        "Ha ganado el Jugador 2"];

    //Array del ganador, perdedor y empate
    $tabla = [[0,2,1],[1,0,2],[2,1,0]];

    //Array usado para la visualizacion
    $conversion = [0 => [PIEDRA1,PIEDRA2],PAPEL,TIJERAS];

    $Jugador1 = random_int(0,2);
    $Jugador2 = random_int(0,2);

    $ganador = CalcularGanador($Jugador1,$Jugador2,$tabla);
?>
    <h1>¡Piedra,Papel o Tijera!</h1>
    <table>
        <tr>
            <th>Jugador 1</th>
            <th>Jugador 2</th>
        </tr>
        <tr>
            <?php MostrarJugador($Jugador1,$Jugador2,$conversion) ?>
        </tr>
        <tr>
            <?php MostrarGanador($ganador,$msg)?> 
        </tr>
    </table>

<?php
    function CalcularGanador($P1,$P2,&$tabla) {
        $valor = $tabla[$P1][$P2];
        return $valor;
    }

    //Funciones para mostrar en la tabla
    function MostrarJugador($P1,$P2,&$conversion) {
        if ($P1 == 0) {
            echo "<td style='font-size:7rem;'>".$conversion[$P1][0]."</td>";
        } else {
            echo "<td style='font-size:7rem;'>".$conversion[$P1]."</td>";
        }

        if ($P2 == 0) {
            echo "<td style='font-size:7rem;'>".$conversion[$P2][1]."</td>";
        } else {
            echo "<td style='font-size:7rem;'>".$conversion[$P2]."</td>";
        }
    }

    function MostrarGanador($ganador,$msg) {
        echo "<th colspan='2'>".$msg[$ganador]."</th>";
    }
?>
</body>
</html>