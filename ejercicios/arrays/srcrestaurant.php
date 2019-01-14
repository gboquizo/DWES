<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srcrestaurant.php
 * @Date: 07/10/18
 * @Description: Almacena la carta de un restaurante con menús.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$carta = [
    "primeros" => [
        ["nombre" => "Lentejas",
            "foto" => "/~qbsagu/images/restaurante/lentejas.jpg", "precio" => 5.25],
        ["nombre" => "Ensalada mixta", "foto" => "/~qbsagu/images/restaurante/ensalada.jpg", "precio" => 4.5],
        ["nombre" => "Albóndigas", "foto" => "/~qbsagu/images/restaurante/albondigas.jpeg",
            "precio" => 5],
    ],

    "segundos" => [
        ["nombre" => "Calamares fritos", "foto" => "/~qbsagu/images/restaurante/calamares.jpg", "precio" => 6],
        ["nombre" => "Filete empanado", "foto" => "/~qbsagu/images/restaurante/filete.jpg", "precio" => 6],
        ["nombre" => "Flamenquín", "foto" => "/~qbsagu/images/restaurante/flamenquin.jpg",
            "precio" => 6],
        ["nombre" => "Sardinitas fritas", "foto" => "/~qbsagu/images/restaurante/sardinas.jpg", "precio" => 6],
        ["nombre" => "Solomillo ibérico", "foto" => "/~qbsagu/images/restaurante/solomillo.jpeg",
            "precio" => 8],

    ],

    "postres" => [
        ["nombre" => "Arroz con leche", "foto" => "/~qbsagu/images/restaurante/arroz.jpg",
            "precio" => 2.5],
        ["nombre" => "Tarta de 3 chocolates", "foto" => "/~qbsagu/images/restaurante/tarta.jpg",
            "precio" => 3.5],
        ["nombre" => "Crema catalana", "foto" => "/~qbsagu/images/restaurante/crema.jpg",
            "precio" => 3],

    ]
];

$tabla = [
    'Menú número', 'Primer plato', 'Foto', 'Precio',
    'Segundo plato', 'Foto', 'Precio',
    'Postre', 'Foto', 'Precio', "Total (20% desc.)"
];