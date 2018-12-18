<?php
session_start();
define("NFILAS", 10);
define("NCOLUMNAS", 10);
define("NMINAS", 2);

if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array();
    $_SESSION['visible'] = array();
    $_SESSION['gameover'] = false;
    $_SESSION['winner'] = false;
    crearTablero();
    colocaMinas();
}

if (isset($routes[4]) && isset($routes[5])) {
    pulsarCasilla($routes[4], $routes[5]);
    header('Location: http://cpd.iesgrancapitan.org:9119/~qbsagu/ejercicios/sesiones/buscaminas');
}

function crearTablero() {
    for ($fila = 0; $fila < NFILAS; $fila++) {
        for ($columna = 0; $columna < NCOLUMNAS; $columna++) {
            $_SESSION["tablero"][$fila][$columna] = 0;
            $_SESSION["visible"][$fila][$columna]= 0;
        }
    }
}

function colocaMinas() {
    for ($n = 0; $n < NMINAS; $n++) {
        //Busca una posición aleatoria donde no hay otra bomba
        do {
            $fila = mt_rand(0, NFILAS - 1);
            $columna = mt_rand(0, NCOLUMNAS - 1);
        } while ($_SESSION["tablero"][$fila][$columna] == 9);

        $_SESSION["tablero"][$fila][$columna] = 9;

        $inicioFila = max($fila - 1, 0);
        $inicioColumna = max($columna - 1, 0);
        $finFila = min($fila + 1, NFILAS - 1);
        $finColumna = min($columna + 1, NCOLUMNAS - 1);

        for ($f = $inicioFila; $f <= $finFila; $f++) {
            for ($c = $inicioColumna; $c <= $finColumna; $c++) {
                if ($_SESSION["tablero"][$f][$c] != 9)
                    $_SESSION["tablero"][$f][$c]++;
            }
        }
    }
}

function pulsarCasilla($fila, $columna) {
    if ($_SESSION["visible"][$fila][$columna] == 0) {
        $_SESSION["visible"][$fila][$columna] = 1;
        if ($_SESSION["tablero"][$fila][$columna] == 9) {
            $_SESSION['gameover'] = true;
            for ($i = 0; $i < NFILAS; $i++) {
                for ($j = 0; $j < NCOLUMNAS; $j++) {
                    if ($_SESSION['tablero'][$fila][$columna] == 9) {
                        $_SESSION['visible'][$fila][$columna] = 1;
                    } else {
                        if ($_SESSION['visible'][$fila][$columna] == 0)
                            $_SESSION['visible'][$fila][$columna] = 2;
                    }
                }
            }
        } else {
            if (comprobarGanador()) {
                //Si llega a las 90 casillas descubiertas gana
                for ($i = 0; $i < NFILAS; $i++) {
                    for ($j = 0; $j < NCOLUMNAS; $j++) {
                        if ($_SESSION['visible'][$fila][$columna] == 0)
                            $_SESSION['visible'][$fila][$columna] = 2;
                    }
                }
            } else {
                if ($_SESSION["tablero"][$fila][$columna] == 0) {

                    $inicioFila = max($fila - 1, 0);
                    $inicioColumna = max($columna - 1, 0);
                    $finFila = min($fila + 1, NFILAS - 1);
                    $finColumna = min($columna + 1, NCOLUMNAS - 1);

                    for ($j = $inicioFila; $j <= $finFila; $j++) {
                        for ($k = $inicioColumna; $k <= $finColumna; $k++) {
                            pulsarCasilla($j, $k);

                        }
                    }
                }
            }
        }
    }
}

function comprobarGanador() {
    $lganador = $_SESSION['winner'];
    $numOcultos = 0;
    $numVisibles = 0;

    foreach ($_SESSION['visible'] as $indice => $valf) {
        foreach ($valf as $indice2 => $valor) {
            if ($valor == 1) {
                $numVisibles++;
            } else {
                $numOcultos++;
            }
        }
    }
    if ($numVisibles == (NFILAS * NCOLUMNAS) - NMINAS) {
        $lganador = true;
    }
    return $lganador;
}

function mostrarBombas(){
    foreach ($_SESSION['tablero'] as $key => $value) {
        foreach ($value as $key2 => $value2) {

            if ($value2 == 9 &&  $_SESSION['visible'][$key][$key2] !=2) {
                $_SESSION['visible'][$key][$key2]=1;
            }

        }
    }
    $_SESSION['gameover']=true;
}

