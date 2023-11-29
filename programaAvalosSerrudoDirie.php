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

function cargarPartidas()
{
    /* $partidas=[];
        $partidas[0]= ["palabraWordix"=>"YUYOS","jugador"=> "anto", "intentos"=> 3,"puntaje"=>15];
        $partidas[1]= ["palabraWordix"=>"HUEVO","jugador"=> "karen", "intentos"=> 4,"puntaje"=>11];
        $partidas[2]= ["palabraWordix"=>"TINTO","jugador"=> "pepito","intentos"=>3,"puntaje"=>15];
        $partidas[3]= ["palabraWordix"=>"NAVES","jugador"=> "mati","intentos"=>5,"puntaje"=>13];
        $partidas[4]= ["palabraWordix"=>"PALTA","jugador"=> "karen","intentos"=>2,"puntaje"=>15];
        $partidas[5]= ["palabraWordix"=>"GATOS","jugador"=> "devi","intentos"=>2,"puntaje"=>15];
        $partidas[6]= ["palabraWordix"=>"YUYOS","jugador"=> "luana","intentos"=>1,"puntaje"=>17];
        $partidas[7]= ["palabraWordix"=>"PISOS","jugador"=> "karen","intentos"=>6,"puntaje"=>0];
        $partidas[8]= ["palabraWordix"=>"LIMON","jugador"=> "anto","intentos"=>5,"puntaje"=>12];
        $partidas[9]= ["palabraWordix"=>"HUECO","jugador"=> "mati","intentos"=>6,"puntaje"=>8];
        return $partidas;*/
    $coleccion = [];
    $pa1 = ["palabraWordix" => "SUECO", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
    $pa2 = ["palabraWordix" => "YUYOS", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
    $pa3 = ["palabraWordix" => "HUEVO", "jugador" => "zrack", "intentos" => 3, "puntaje" => 9];
    $pa4 = ["palabraWordix" => "TINTO", "jugador" => "cabrito", "intentos" => 4, "puntaje" => 8];
    $pa5 = ["palabraWordix" => "RASGO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];
    $pa6 = ["palabraWordix" => "VERDE", "jugador" => "cabrito", "intentos" => 5, "puntaje" => 7];
    $pa7 = ["palabraWordix" => "CASAS", "jugador" => "kleiton", "intentos" => 5, "puntaje" => 7];
    $pa8 = ["palabraWordix" => "GOTAS", "jugador" => "kleiton", "intentos" => 0, "puntaje" => 0];
    $pa9 = ["palabraWordix" => "ZORRO", "jugador" => "zrack", "intentos" => 4, "puntaje" => 8];
    $pa10 = ["palabraWordix" => "GOTAS", "jugador" => "cabrito", "intentos" => 0, "puntaje" => 0];
    $pa11 = ["palabraWordix" => "FUEGO", "jugador" => "cabrito", "intentos" => 2, "puntaje" => 10];
    $pa12 = ["palabraWordix" => "TINTO", "jugador" => "briba", "intentos" => 0, "puntaje" => 0];

    array_push($coleccion, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8, $pa9, $pa10, $pa11, $pa12);
    return $coleccion;
}

/** Función SeleccionarOpcion visualiza el menú de opciones y retorna la opción seleccionada, si esta es válida 
 * @return int
 * int $menuOpciones
 */
function SeleccionarOpcion()
{
    echo "\n1) Jugar al wordix con una palabra elegida. \n";
    echo "2) Jugar al wordix con una palabra aleatoria. \n";
    echo "3) Mostrar una partida \n";
    echo "4) Mostrar la primer partida ganadora \n";
    echo "5) Mostrar resumen de Jugador \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra \n";
    echo "7) Agregar una palabra de 5 letras a Wordix \n";
    echo "8) Salir \n";
    echo "Seleccione una opción del menú:";
    $menuOpciones = solicitarNumeroEntre(1, 8);
    return ($menuOpciones);
}

/** 4)
 *  Solicita y verifica que se ingresen palabras de 5 letras y las retorna en mayúscula
 * @return string
 */
function pedirPalabra5Letras()
{
    //string $palabraPedida
    $palabraPedida = leerPalabra5Letras();
    return $palabraPedida;
}

/** 5) Función que solicita al usuario, las veces necesarias, un número entre un rango de valores. Retornando un número válido, es decir, que esté entre tal rango. 
 * 
 * @return int
 */

function pedirNumeroValido()
{
    // int $numeroElegido
    $nroElegido = solicitarNumeroEntre(0, 9);
    return $nroElegido;
}

/** 6) Dado un nro de partida, da los datos de la partida
 * @param array $partidas
 * @param int $indice
 */
function MostrarPartida($partidas, $indice)
{

    echo "********************************** \n";
    echo "Partida WORDIX " . $indice . ": Palabra " . $partidas[$indice]["palabraWordix"] . "\n";
    echo "Jugador: " . $partidas[$indice]["jugador"] . "\n";
    echo "Puntaje: " . $partidas[$indice]["puntaje"] . "\n";
    if ($partidas[$indice]["puntaje"] == 0) {
        echo "Intento: No adivinó la palabra. \n";
    }
    if ($partidas[$indice]["puntaje"] > 0) {
        print_r("Intento: Adivinó la palabra en " . $partidas[$indice]["intentos"] . "\n");
    }
    echo "**********************************\n";
}



/** 7) Función que dada la colección de palabras y una palabra, retorna la colección con la nueva palabra en ella.
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra5
 * @return array
 */
function coleccionPalabrasModificada($coleccionPalabras, $nuevaPalabra5)
{
    $palabraEnArreglo = false;

    foreach ($coleccionPalabras as $palabra) {
        if ($palabra == $nuevaPalabra5) {
            $palabraEnArreglo = true;
            echo "La palabra ya figura en Wordix:";
        }
    }

    if (!$palabraEnArreglo) {
        // Si la palabra no está en el arreglo, la agregamos
        $coleccionPalabras[] = $nuevaPalabra5;
        echo "Se agrego una nueva palabra.";
    }

    return $coleccionPalabras;
}

/** 8) Dada una colección de partidas y nombre del jugador retorna el índice de la primer partida ganada del jugador
 * @param array $partidas
 * @param string $nombreJugador
 * @return int
 * int $indicePartida
 */
function PrimerGanada($partidas, $nombreJugador)
{
    $i = 0;
    $cantIndices = count($partidas);
    $indicePartida = -2; // Por defecto, el jugador no ha jugado ninguna partida

    while ($i < $cantIndices) {
        if ($partidas[$i]["jugador"] === $nombreJugador && $partidas[$i]["puntaje"] > 0) {
            // El jugador ganó esta partida, se retorna el índice y se termina la función
            $indicePartida = $i;
        } elseif ($partidas[$i]["jugador"] === $nombreJugador && $partidas[$i]["puntaje"] === 0) {
            // El jugador jugó pero no ganó, se marca como que jugó alguna partida
            $indicePartida = -1;
        }
        $i++;
    }

    return $indicePartida;
}

/** 9) Función que, tomando una colección de partidas y el nombre de un jugador, retorna el resumen de dicho jugador.
 * @param array $partidas
 * @param string $nombreJugador
 * @return array
 */
function resumenJugador($partidas, $nombreJugador)
{

    $jugadorExiste = false;

    $estadisticasJugador = array(
        'jugador' => $nombreJugador,
        'partidas' => 0,
        'puntaje' => 0,
        'victorias' => 0,
        'intentos' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0
        )
    );
    foreach ($partidas as $partida) {
        if ($partida['jugador'] == $nombreJugador) {
            $jugadorExiste = true;
            $estadisticasJugador['partidas']++;
            $estadisticasJugador['puntaje'] += $partida['puntaje'];

            if ($partida['puntaje'] > 0) {
                $estadisticasJugador['victorias']++;
            }

            // Contar los intentos
            if ($partida['puntaje'] == 0) {
                $intentos = 0;
            } else {
                $intentos = $partida['intentos'];
                $estadisticasJugador['intentos'][$intentos]++;
            }
        }
    }
    if ($jugadorExiste) {
        echo "*********************\n";
        echo "Jugador: " . $estadisticasJugador['jugador'] . "\n";
        echo "Partidas jugadas: " . $estadisticasJugador['partidas'] . "\n";
        echo "Puntaje total: " . $estadisticasJugador['puntaje'] . "\n";
        echo "Partidas ganadas: " . $estadisticasJugador['victorias'] . "\n";
        echo "Porcentaje de victorias: " . ($estadisticasJugador['victorias'] / $estadisticasJugador['partidas'] * 100) . "%\n";

        // Mostrar intentos
        for ($i = 1; $i <= 6; $i++) {
            echo "Intentos " . $i . ": " . $estadisticasJugador['intentos'][$i] . "\n";
        }
        echo "*********************\n";
    }
    if (!$jugadorExiste) {
        echo "*********************\n";
        echo "No hay registros del jugador " . $nombreJugador . "\n";
        echo "*********************\n";
    }
    return $estadisticasJugador;
}


/** 10 Función que solicita el nombre del jugador y lo retorna en minúsculas, asegurándose siempre de que tal nombre comience con una letra.
 * @return string
 */
function solicitarJugador()
{
    do {
        echo "Ingrese el nombre del jugador (debe comenzar con una letra): ";
        $nombreJugador = strtolower(trim(fgets(STDIN)));
    } while (!ctype_alpha($nombreJugador[0]));

    return $nombreJugador;
}


/** funcion comparación
 * @param array $partidaA, $partidaB
 * @return int
 * int $orden
 */
function cmp($partidaA, $partidaB)
{
    $orden = 0;
    if ($partidaA['jugador'] == $partidaB["jugador"]) {
        if ($partidaA['palabraWordix'] == $partidaB['palabraWordix']) {
            $orden = 0;
        } elseif ($partidaA['palabraWordix'] < $partidaB['palabraWordix']) {
            $orden = -1;
        } else {
            $orden = 1;
        }
    } elseif ($partidaA['jugador'] < $partidaB['jugador']) {
        $orden = -1;
    } else {
        $orden = 1;
    }
    return $orden;
}

/** Inciso 11 ordena las partidas según jugador y palabra
 * @param array $partidas
 */
function mostrarPartidasOrdenadas($partidas)
{
    uasort($partidas, 'cmp');
    print_r($partidas);
}

/** Función palabraUtilizadaPorJugador
 * @param string $palabraElegida
 * @param string $jugador
 * @param array $partidas
 * @return boolean
 */
function palabraUtilizadaPorJugador($palabraElegida, $jugador, $partidas)
{
    $repetida = false;
    $i = 0;

    while ($i < count($partidas) && !($partidas[$i]['jugador'] == $jugador && $partidas[$i]['palabraWordix'] == $palabraElegida)) {
        $i++;
    }
    if ($i < count($partidas)) {
        $repetida = true;
    }

    return $repetida;
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

/**
 * array $estructuraPartidas, $estructuraPalabras, $palabrasJugadas, $partida, $intentosTotales, $estructuraMod, $estadisticasJugador
 * int $opcion, $palabras, $palabraAleatoria, $cantidadPartidas, $partidasJugador, $puntajeTotal, $victorias, $i 
 * string $jugadorSolicitado, $nroP, $nombreJugadorBusqueda, $nombreJugadorEstadisticas, $palabraAgregada
 * boolean $encontrado, $partidaEncontrada, $jugadorExiste
 * void $partidasOrdenadas, $visualizarPartida
 */


//Inicialización de variables:
$estructurasPalabras = cargarColeccionPalabras();
$estructuraPartidas = cargarPartidas();

//Proceso:

/*Menu programa principal */
do {
    $opcion = SeleccionarOpcion();


    switch ($opcion) {
        case 1:
            $jugadorSolicitado = solicitarJugador();
            $palabras = count($estructurasPalabras) - 1;
            //
            echo "Elige un número entre 0 y " . ($palabras) . ": ";
            $numPartida = solicitarNumeroEntre(0, $palabras);
            $palabraElegida = $estructurasPalabras[$numPartida];
            $palabrasUsadas = palabraUtilizadaPorJugador($palabraElegida, $jugadorSolicitado, $estructuraPartidas);
            if ($palabrasUsadas == false) {
                $estructuraPartidas[count($estructuraPartidas)] = jugarWordix($estructurasPalabras[$numPartida], $jugadorSolicitado);
            } else {
                echo "Esta palabra ya ha sido utilizada. Por favor, elige otra. \n";
                // Iniciar partida de Wordix con la palabra seleccionada

            }

            break;
        case 2:

            $jugadorSolicitado = solicitarJugador();
            $palabras = count($estructurasPalabras);
            $i = 0;
            $usadas = 0;
            $nroUsado = false;

            // Obtener una palabra aleatoria que no haya sido jugada por el jugador
                $palabraAleatoria = rand(0, $palabras - 1);
                $palabraSel = $estructurasPalabras[$palabraAleatoria];
                while ($i < count($estructuraPartidas)){
                    if ($palabraSel == $estructuraPartidas[$i]['palabraWordix']){
                        $nroUsado = true;
                    } else {
                        $nroUsado = false;
                    }
                    $i++;
                }
                if ($nroUsado == false){
                    $palabrasUsadas = palabraUtilizadaPorJugador($palabraSel, $jugadorSolicitado, $estructuraPartidas);
                    if ($palabrasUsadas == false){
                    $estructuraPartidas[count($estructuraPartidas)] = jugarWordix($estructurasPalabras[$palabraAleatoria], $jugadorSolicitado);
                    $usadas++;
                    } elseif ($usadas == $palabras){
                        echo "Lo siento, ya jugó con todas las palabras de Wordix. ";
                    } else {
                        echo "Ya jugó con esa palabra, vuelva a seleccionar la opción 2. ";
                    }
                }

            break;
        case 3:
            $cantidadPartidas = count($estructuraPartidas);
            echo "Ingrese un numero de partida entre 0 y " . $cantidadPartidas . ": ";

            $nroPartida = solicitarNumeroEntre(0, $cantidadPartidas);
            $visualizarPartida = MostrarPartida($estructuraPartidas, $nroPartida);

            break;
        case 4:

            $nombreJugadorBusqueda = solicitarJugador();
            $partidaGanada1ra = PrimerGanada($estructuraPartidas, $nombreJugadorBusqueda);

            if ($partidaGanada1ra == -1) {
                echo "El jugador " . $nombreJugadorBusqueda . " no ganó ninguna partida. \n";
            } elseif ($partidaGanada1ra == -2) {
                echo "El jugador " . $nombreJugadorBusqueda . " no existe. \n";
            } else {
                $resumen1raPartidaGanada = MostrarPartida($estructuraPartidas, $partidaGanada1ra);
                echo $resumen1raPartidaGanada;
            }

            break;
        case 5:

            $nombreJugadorEstadisticas = solicitarJugador();
            $elResumenJugador = resumenJugador($estructuraPartidas, $nombreJugadorEstadisticas);


            break;

        case 6:
            $partidasOrdenadas = mostrarPartidasOrdenadas($estructuraPartidas);


            break;
        case 7:
            $palabraAgregada = leerPalabra5Letras();
            $estructurasPalabras = coleccionPalabrasModificada($estructurasPalabras, $palabraAgregada);

            break;
            //...
    }
} while ($opcion != 8);
