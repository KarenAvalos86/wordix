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
    echo "Ingrese el número de partida";
    $nroPartida= solicitarNumeroEntre(0,9);
    echo "Partida WORDIX".$nroPartida. ": palabras: ".$partidas[$nroPartida]["palabraWordix"]. "\n";
    echo "Jugador: ".$partidas[$nroPartida]["jugador"]. "\n";
    echo "Puntaje: ".$partidas[$nroPartida]["puntaje"]. "\n";
    echo "Intento: ".$partidas[$nroPartida]["intento"]. "\n";
}



 /** 7) Función que dada la colección de palabras y una palabra, retorna la colección con la nueva palabra en ella.
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra5
 * @return array
 */
function coleccionPalabrasModificada($coleccionPalabras, $nuevaPalabra5){
    // int $cantPalabras $i boolean $palabraEnArreglo
    $cantPalabras = count($coleccionPalabras);
    $palabraEnArreglo = false;
    $i = 0;
    while ($i < $cantPalabras){
    if (($coleccionPalabras[$i]) == $nuevaPalabra5){
    $palabraEnArreglo = true;
    $nuevaPalabra5 = leerPalabra5Letras();
    } else {
    $coleccionPalabras[$cantPalabras + 1] = $nuevaPalabra5;
    return ($coleccionPalabras);
}
}
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
    if ($i=$cantIndices){
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

$nombreJugador = solicitarJugador();
echo "El nombre del jugador ingresado es: " . $nombreJugador;

/** funcion comparación
 * @param string $a, $b
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
    print_r($partidas);
}
       
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELOM", strtolower("Majo"));
print_r($partida);
//imprimirResultado($partida);


/* */
do {
    $opcion = SeleccionarOpcion();

    
    switch ($opcion) {
        case 1: 
              $jugadorSolicitado= solicitarJugador();
		      $palabras= count($estructurasPalabras);
		      echo "Ingrese un nro entre 0 y ".$palabras;
		      $nroP= trim(fgets(STDIN));
		      $palabrasJugadas=[];
		      $encontrado = false;
		      $i=0;
		      $cantPalabrasJugadas= count($palabrasJugadas);
		      while ($i<$cantPalabrasJugadas){
			    if (($palabrasJugadas[$i])==$nroP){
				    $encontrado= true;
				break;
			    }
			    echo "Ingrese un nro entre 0 y ".$palabra ."que no incluya".$nroP;
			    $i++;
		        } 

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
            $jugadorSolicitado= solicitarJugador();
            $palabras= count($estructurasPalabras);
            $nroP= random_int(0, count($coleccionPalabras));
            $palabrasJugadas=[];
            $encontrado = false;
            $i=0;
            $cantPalabrasJugadas= count($palabrasJugadas);
            while ($i<$cantPalabrasJugadas){
              if (($palabrasJugadas[$i])==$nroP){
                  $encontrado= true;
              break;
              }
              $i++;
              } 

            break;
        case 3: 
            $cantidadPartidas = count($estructuraPartidas);
            $visualizarPartida = MostrarPartida($estructuraPartidas);

            break;
        case 4:
            $jugadorSolicitado = solicitarJugador();
            $indicePartidaGanada = PrimerGanada($estructuraPartidas, $jugadorSolicitado);
            if ($indicePartidaGanada == -1){
                echo "El jugador " .$jugadorSolicitado. " no ganó ninguna partida.";
            } else {
                echo "Partida WORDIX ".$indicePartidaGanada. ": palabra: ".$estructuraPartidas[$indicePartidaGanada]["palabraWordix"]. "\n";
                echo "Jugador: ".$estructuraPartidas[$indicePartidaGanada]["jugador"]. "\n";
                echo "Puntaje: ".$estructuraPartidas[$indicePartidaGanada]["puntaje"]. "\n";
                echo "Adivinó la palabra en ".$estructuraPartidas[$indicePartidaGanada]["intento"]. " intentos \n";
            }

            break;
        case 5:
            echo "Ingrese el nombre del jugador que desea obtener su resumen: \n";
            $nombreJugador = trim(fgets(STDIN));
            $partidas = cargarPartidas();

            $resumen = resumenJugador($partidas, $nombreJugador);

            echo "*********************";
            print_r($resumen['jugador']);
            print_r($resumen['partidas']);
            print_r($resumen['puntaje']);
            print_r($resumen['victorias']);
            echo "Porcentaje victorias", ($resumen['victorias']/$resumen['partidas']*100);
            echo "adivinadas";
            print_r($resumen['intento1']);
            print_r($resumen['intento2']);
            print_r($resumen['intento3']);
            print_r($resumen['intento4']);
            print_r($resumen['intento5']);
            print_r($resumen['intento6']);
            echo "*********************";
            break;
        
        case 6:
        
        
        
        case 7:
        
            $partidasOrdenadas= mostrarPartidasOrdenadas($partidas);
            print_r ($partidasOrdenadas);
            //...
    }
} while ($opcion != 8);
