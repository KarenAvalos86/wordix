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
        $pa1 = ["palabraWordix" => "SUECO", "jugador" => "kleiton", "intentos" => 6, "puntaje" => 0];
        $pa2 = ["palabraWordix" => "YUYOS", "jugador" => "briba", "intentos" => 6, "puntaje" => 0];
        $pa3 = ["palabraWordix" => "HUEVO", "jugador" => "zrack", "intentos" => 3, "puntaje" => 9];
        $pa4 = ["palabraWordix" => "TINTO", "jugador" => "cabrito", "intentos" => 4, "puntaje" => 8];
        $pa5 = ["palabraWordix" => "RASGO", "jugador" => "briba", "intentos" => 6, "puntaje" => 0];
        $pa6 = ["palabraWordix" => "VERDE", "jugador" => "cabrito", "intentos" => 5, "puntaje" => 7];
        $pa7 = ["palabraWordix" => "CASAS", "jugador" => "kleiton", "intentos" => 5, "puntaje" => 7];
        $pa8 = ["palabraWordix" => "GOTAS", "jugador" => "kleiton", "intentos" => 6, "puntaje" => 0];
        $pa9 = ["palabraWordix" => "ZORRO", "jugador" => "zrack", "intentos" => 4, "puntaje" => 8];
        $pa10 = ["palabraWordix" => "GOTAS", "jugador" => "cabrito", "intentos" => 6, "puntaje" => 0];
        $pa11 = ["palabraWordix" => "FUEGO", "jugador" => "cabrito", "intentos" => 2, "puntaje" => 10];
        $pa12 = ["palabraWordix" => "TINTO", "jugador" => "briba", "intentos" => 6, "puntaje" => 0];

array_push($coleccion, $pa1, $pa2, $pa3, $pa4, $pa5, $pa6, $pa7, $pa8, $pa9, $pa10, $pa11, $pa12);
return $coleccion;
    }

/** Función SeleccionarOpcion visualiza el menú de opciones y retorna la opción seleccionada, si esta es válida 
 * @return int
 * int $menuOpciones
 */
    function SeleccionarOpcion(){
        echo "\n1) Jugar al wordix con una palabra elegida. \n";
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

/** 4)
 *  Solicita y verifica que se ingresen palabras de 5 letras y las retorna en mayúscula
 * @return string
 */
function pedirPalabra5Letras(){
    //string $palabraPedida
    $palabraPedida = leerPalabra5Letras();
    return $palabraPedida;
}

/** 5) Función que solicita al usuario, las veces necesarias, un número entre un rango de valores. Retornando un número válido, es decir, que esté entre tal rango. 
 * 
 * @return int
 */
 
function pedirNumeroValido(){ 
    // int $numeroElegido
    $nroElegido= solicitarNumeroEntre(0,9);
    return $nroElegido;
 }

/** 6) Dado un nro de partida, da los datos de la partida
 * @param array $partidas
 * 
 */
function MostrarPartida($partidas){
    echo "Ingrese el número de partida: ";
    $nroPartida= solicitarNumeroEntre(0,count($partidas)-1);
    echo "********************************** \n";
    echo "Partida WORDIX ".$nroPartida. ": Palabra ".$partidas[$nroPartida]["palabraWordix"]. "\n";
    echo "Jugador: ".$partidas[$nroPartida]["jugador"]. "\n";
    echo "Puntaje: ".$partidas[$nroPartida]["puntaje"]. "\n";
    if ($partidas[$nroPartida]["puntaje"]==0){
        echo "Intento: No adivinó la palabra. \n";
    }
    if ($partidas[$nroPartida]["puntaje"]>0){
        print_r("Intento: Adivinó la palabra en ".$partidas[$nroPartida]["intentos"]. "\n");
    }    
    echo "**********************************\n";
}



 /** 7) Función que dada la colección de palabras y una palabra, retorna la colección con la nueva palabra en ella.
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra5
 * @return array
 */
function coleccionPalabrasModificada($coleccionPalabras, $nuevaPalabra5) {
    $palabraEnArreglo = false;

    foreach ($coleccionPalabras as $palabra) {
        if ($palabra == $nuevaPalabra5) {
            $palabraEnArreglo = true;
            echo "La palabra ya figura en Wordix:";
            break; // La palabra ya está en el arreglo, no es necesario continuar
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
function PrimerGanada($partidas, $nombreJugador){
    $i=0;
    $cantIndices= count($partidas);
   
    while($i<$cantIndices && (!($partidas[$i]["jugador"]==$nombreJugador) && !($partidas[$i]["puntaje"]>0))){
       
        $i++;
    }
    if ($i == $cantIndices){
        $indicePartida= -1;
    }else{
        $indicePartida= $i;
    }
    return $indicePartida;
}     

/** 9) Función que, tomando una colección de partidas y el nombre de un jugador, retorna el resumen de dicho jugador.
 * @param array $partidas
 * @param string $nombreJugador
 * @return array
 */
function resumenJugador($partidas, $nombreJugador) {
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

    foreach ($partidas as $partida) {
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


/** 10 Función que solicita el nombre del jugador y lo retorna en minúsculas, asegurándose siempre de que tal nombre comience con una letra.
 * @return string
 */
function solicitarJugador() {
    do {
        echo "Ingrese el nombre del jugador (debe comenzar con una letra): ";
        $nombreJugador = strtolower(trim(fgets(STDIN)));
    } while (!ctype_alpha($nombreJugador[0])); 

    return $nombreJugador;
}


/** funcion comparación
 * @param array $a, $b
 * @return int
 * int $orden
 */
function cmp($a,$b){
    $orden= 0;
    if ($a['jugador']==$b["jugador"]){
        if ($a['palabraWordix']==$b['palabraWordix']){
            $orden= 0;
        }
    }elseif ($a['jugador']<$b['jugador']){
        $orden= -1;
    }else{
        $orden= 1;
    }
    return $orden;
}

/** Inciso 11 ordena las partidas según jugador y palabra
 * @param array $partidas
 */
function mostrarPartidasOrdenadas($partidas) {
    uasort($partidas,'cmp');
    foreach($partidas as $partida){
        echo "Palabra: ". $partida['palabraWordix']."\n";
        echo "Jugador: ". $partida['jugador']."\n";
        echo "Intentos: ". $partida['intentos']."\n";
        echo "Puntaje: ". $partida['puntaje']."\n";
        echo "------------------------\n";
    }
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
            $palabras = count($estructurasPalabras);

            // Pedir al usuario un número de palabra
            do {
                echo "Ingrese un número entre 0 y " . ($palabras - 1) . ": ";
                $nroP = trim(fgets(STDIN));

                if ($nroP < 0 || ($nroP >= $palabras)){
                    echo "Número fuera de rango. Por favor, elija un número dentro del rango válido.\n";
                }

            } while ($nroP < 0 || ($nroP >= $palabras));

            // Agregar el número de palabra a las palabras jugadas por el jugador
            $palabrasJugadas[] = $nroP;

            // Iniciar partida de Wordix con la palabra seleccionada
            $partida = jugarWordix($estructurasPalabras[$nroP], $jugadorSolicitado);

            // Guardar los datos de la partida en la estructura de datos de partidas
            $estructuraPartidas[] = [
                "palabraWordix" => $estructurasPalabras[$nroP],
                "jugador" => $jugadorSolicitado,
                "intentos" => $partida['intentos'],
                "puntaje" => $partida['puntaje']
            ];

            break;
        case 2: 
            $jugadorSolicitado = solicitarJugador();
            $palabras = count($estructurasPalabras);
            $palabrasJugadas=[];
        
            // Obtener una palabra aleatoria que no haya sido jugada por el jugador
            do {
                $palabraAleatoria = rand(0, $palabras - 1);
        
                // Verificar si la palabra aleatoria ya ha sido jugada
                $encontrado = false;
                foreach ($palabrasJugadas as $palabraJugada) {
                    if ($palabraJugada == $palabraAleatoria) {
                        $encontrado = true;
                        break;
                    }
                }
            } while ($encontrado);
                    
            $palabrasJugadas[] = $palabraAleatoria;
                    
            $partida = jugarWordix($estructurasPalabras[$palabraAleatoria], $jugadorSolicitado);
                    
            $estructuraPartidas[] = [
                "palabraWordix" => $estructurasPalabras[$palabraAleatoria],
                "jugador" => $jugadorSolicitado,
                "intentos" => $partida['intentos'],
                "puntaje" => $partida['puntaje']
            ];

            break;
        case 3: 
            $cantidadPartidas = count($estructuraPartidas);
            $visualizarPartida = MostrarPartida($estructuraPartidas);

            break;
        case 4:
            
                        $nombreJugadorBusqueda = solicitarJugador();
                        $partidaEncontrada = false;
                    
                        // Buscar la primera partida ganadora del jugador
                        foreach ($estructuraPartidas as $partida) {
                            if ($partida['jugador'] === $nombreJugadorBusqueda && $partida['puntaje'] > 0) {
                                echo "**********************************\n";
                                echo "Partida WORDIX: palabra " . $partida['palabraWordix'] . "\n";
                                echo "Jugador: " . $partida['jugador'] . "\n";
                                echo "Puntaje: " . $partida['puntaje'] . " puntos\n";
                                echo "Adivinó la palabra en " . $partida['intentos'] . " intentos\n";
                                echo "**********************************\n";
                                $partidaEncontrada = true;
                                break;
                            }
                        }
                    
                        if ($partidaEncontrada && ($partida['jugador'] == $nombreJugadorBusqueda && $partida['puntaje'] == 0)){
                            echo "El jugador " .$nombreJugadorBusqueda. " no ganó ninguna partida. \n";
                            }
                        if (!$partidaEncontrada){
                            echo "El jugador " .$nombreJugadorBusqueda. " no existe. \n";
                        }
                    
            break;
        case 5:
           
            $nombreJugadorEstadisticas = solicitarJugador();
            $jugadorExiste = false;
        
            $estadisticasJugador = array(
                'jugador' => $nombreJugadorEstadisticas,
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
            foreach($estructuraPartidas as $partida){
                if ($partida['jugador'] == $nombreJugadorEstadisticas){
                    $jugadorExiste = true;
                    $estadisticasJugador['partidas']++;
                    $estadisticasJugador['puntaje'] += $partida['puntaje'];
            
                    if ($partida['puntaje'] > 0) {
                        $estadisticasJugador['victorias']++;
                    }
            
                    // Contar los intentos
                    $intentos = $partida['intentos'];
                    $estadisticasJugador['intentos'][$intentos]++;
                }
            }
            if($jugadorExiste){
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
            if (!$jugadorExiste){
                echo "*********************\n";
                echo "No hay registros del jugador " .$nombreJugadorEstadisticas. "\n";
                echo "*********************\n";
            }
        break;
        
        case 6:
            $partidasOrdenadas= mostrarPartidasOrdenadas($estructuraPartidas);
            print_r ($partidasOrdenadas);
        
        break;
        case 7:
            $palabraAgregada = leerPalabra5Letras();
            $estructurasPalabras = coleccionPalabrasModificada($estructurasPalabras, $palabraAgregada);

        break;
            //...
    }
} while ($opcion != 8);
