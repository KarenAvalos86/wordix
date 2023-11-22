<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Karen Romina Avalos** - Legajo FAI-4875 - mail: avaloskaren86@gmail.com - Github: KarenAvalos86
- **Matias Alberto Dirie** - Legajo FAI-5002 - mail: matias.dirie@est.fi.uncoma.edu.ar - Github: matiasDirie
- **Antonella Karin Serrudo Cuculich** - Legajo FAI-5053 - mail: antonella.serrudo@est.fi.uncoma.edu.ar - Github: antonellasc */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "HIELO", "PELON", "LIMON", "PALTA", "HUECO"
        
    ];

    return ($coleccionPalabras);
}

/** Función cargarPartidas, inicializa una estructura de datos con ejemplos de partidas y retorna el arreglo
 * @return array
 * array $partidas
 */

    function cargarPartidas(){
        $partidas=[];
        $partidas[0]= ["palabraWordix"=>"YUYOS","jugador"=> "Anto", "intentos"=> 3,"puntaje"=>15];
        $partidas[1]= ["palabraWordix"=>"HUEVO","jugador"=> "Karen", "intentos"=> 4,"puntaje"=>11];
        $partidas[2]= ["palabraWordix"=>"TINTO","jugador"=> "Pepito","intentos"=>3,"puntaje"=>15];
        $partidas[3]= ["palabraWordix"=>"NAVES","jugador"=> "Mati","intentos"=>5,"puntaje"=>13];
        $partidas[4]= ["palabraWordix"=>"PALTA","jugador"=> "Karen","intentos"=>2,"puntaje"=>15];
        $partidas[5]= ["palabraWordix"=>"GATOS","jugador"=> "Devi","intentos"=>2,"puntaje"=>15];
        $partidas[6]= ["palabraWordix"=>"YUYOS","jugador"=> "Luana","intentos"=>1,"puntaje"=>17];
        $partidas[7]= ["palabraWordix"=>"PISOS","jugador"=> "Karen","intentos"=>0,"puntaje"=>0];
        $partidas[8]= ["palabraWordix"=>"LIMON","jugador"=> "Anto","intentos"=>5,"puntaje"=>12];
        $partidas[9]= ["palabraWordix"=>"HUECO","jugador"=> "Mati","intentos"=>6,"puntaje"=>8];
        return $partidas;
    }

/** Función SeleccionarOpcion visualiza el menú de opciones y retorna la opción seleccionada, si esta es válida 
 * @return int
 * int $menuOpciones
 */
    function SeleccionarOpcion(){
        echo "1) Jugar al wordix con una palabra elegida. \n";
        echo "2) Jugar al wordix con una palabra aleatoria. \n";
        echo "3) Mostrar una partida \n";
        echo "4) Mostrar la primer partida ganadora \n";
        echo "5) Mostrar resumen de Jugador \n";
        echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra \n";
        echo "7) Agregar una palabra de 5 letras a Wordix \n";
        echo "8) Salir \n";
        echo "Seleccione una opción del menú:";
        $menuOpciones= solicitarNumeroEntre(1,8);
        return ($menuOpciones);
    }

/** 8) Dada una colección de partidas y nombre del jugador retorna el índice de la primer partida ganada del jugador
 * @param array $Partidas
 * @param string $nombreJugador
 * @return int
 * int $indicePartida
 */
function PrimerGanada($partidas, $nombreJugador){
    $i=0;
    $cantIndices= count($partidas);
   
    while($i<$cantIndices && (!($partidas[$i]["jugador"]==$nombreJugador) && !($partidas[$i]["puntaje"]>0))){
       
        $i++;
    }
    if ($i=$cantIndices){
        $indicePartida= -1;
    }else{
        $indicePartida= $i;
    }
    return $indicePartida;
}     

/** Inciso 9
 * @param array $coleccionPartidas
 * @param string $nombreJugador
 * @return array
 */
function resumenJugador($coleccionPartidas, $nombreJugador) {
    $resumenJugador = array(
        'jugador' => $nombreJugador,
        'partidas' => 0,
        'puntaje' => 0,
        'victorias' => 0,
        'intento1' => 0,
        'intento2' => 0,
        'intento3' => 0,
        'intento4' => 0,
        'intento5' => 0,
        'intento6' => 0
    );

    foreach ($coleccionPartidas as $partida) {
        if ($partida['jugador'] === $nombreJugador) {
            $resumenJugador['partidas']++;
            $resumenJugador['puntaje'] += $partida['puntaje'];

            if ($partida['puntaje'] > 0) {
                $resumenJugador['victorias']++;
            }

            for ($i = 1; $i <= 6; $i++) {
                $resumenJugador["intento$i"] += $partida["intentos"];
            }
        }
    }

    return $resumenJugador;
}

$partidas = cargarPartidas();
$resumen = resumenJugador($partidas, 'Karen');

// deberia de imprimir el resumen del jugador 'Karen'
print_r($resumen);



/** inciso 10
 * @return string
 */
function solicitarJugador() {
    do {
        echo "Ingrese el nombre del jugador (debe comenzar con una letra): ";
        $nombreJugador = strtolower(trim(fgets(STDIN)));
    } while (!ctype_alpha($nombreJugador[0])); 

    return $nombreJugador;
}

$nombreJugador = solicitarJugador();
echo "El nombre del jugador ingresado es: " . $nombreJugador;

/** Inciso 11
 * @param array $coleccionPartidas
 */
function mostrarPartidasOrdenadas($coleccionPartidas) {
    uasort($coleccionPartidas, function ($a, $b) {
        if ($a['jugador'] !== $b['jugador']) {
            return $a['jugador'] < $b['jugador'] ? -1 : 1;
        }

        return $a['palabraWordix'] < $b['palabraWordix'] ? -1 : 1;
    });


    echo "Colección de partidas ordenada por nombre del jugador y palabra:\n";
    print_r($coleccionPartidas);
}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
