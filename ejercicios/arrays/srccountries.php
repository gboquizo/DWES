<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srccountries.php
 * @Date: 07/10/18
 * @Description: Guarda la información de continentes, sus países, capitales y banderas.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$continentes = [
    "África" => [
        "Angola" => ["capital" => "Luanda", "bandera" => "http://flags.fmcdn.net/data/flags/w580/ao.png"],
        "Argelia" => ["capital" => "Argel", "bandera" => "http://flags.fmcdn.net/data/flags/w580/dz.png"],
        "Benin" => ["capital" => "Porto Nuevo y Cotonú", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bj.png"],
        "Botswana" => ["capital" => "Gaborone", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bw.png"],
        "Burkina Faso" => ["capital" => "Uagadugú", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bf.png"],
        "Burundi" => ["capital" => "Buyumbura", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bi.png"],
    ],

    "América" => [
        "Antigua y Barbuda" => ["capital" => "St. John's", "bandera" => "http://flags.fmcdn.net/data/flags/w580/ag.png"],
        "Argentina" => ["capital" => "Buenos Aires", "bandera" => "http://flags.fmcdn.net/data/flags/w580/ar.png"],
        "Bahamas" => ["capital" => "Nasáu", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bs.png"],
        "Barbados" => ["capital" => "Bridgetown", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bb.png"],
        "Belice" => ["capital" => "Belmopán", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bz.png"],
        "Bolivia" => ["capital" => "Sucre", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bo.png"],
    ],

    "Asia" => [
        "Afganistán" => ["capital" => "Kabul", "bandera" => "http://flags.fmcdn.net/data/flags/w580/af.png"],
        "Arabia Saudita" => ["capital" => "Riad", "bandera" => "http://flags.fmcdn.net/data/flags/w580/sa.png"],
        "Armenia" => ["capital" => "Ereván", "bandera" => "http://flags.fmcdn.net/data/flags/w580/am.png"],
        "Azerbaiyán" => ["capital" => "Bakú", "bandera" => "http://flags.fmcdn.net/data/flags/w580/az.png"],
        "Bangladés" => ["capital" => "Daca", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bd.png"],
        "Baréin" => ["capital" => "Manama", "bandera" => "http://flags.fmcdn.net/data/flags/w580/bh.png"],

    ],

    "Europa" => [
        "Albania" => ["capital" => "Tirana", "bandera" => "http://flags.fmcdn.net/data/flags/w580/al.png"],
        "Alemania" => ["capital" => "Berlín", "bandera" => "http://flags.fmcdn.net/data/flags/w580/de.png"],
        "Andorra" => ["capital" => "Andorra La Vieja", "bandera" => "http://flags.fmcdn.net/data/flags/w580/ad.png"],
        "Austria" => ["capital" => "Viena", "bandera" => "http://flags.fmcdn.net/data/flags/w580/at.png"],
        "Bélgica" => ["capital" => "Bruselas", "bandera" => "http://flags.fmcdn.net/data/flags/w580/be.png"],
        "Bielorrusia" => ["capital" => "Minsk", "bandera" => "http://flags.fmcdn.net/data/flags/w580/by.png"],

    ],

    "Oceanía" => [
        "Australia" => ["capital" => "Camberra", "bandera" => "http://flags.fmcdn.net/data/flags/w580/au.png"],
        "Fiyi" => ["capital" => "Suva", "bandera" => "http://flags.fmcdn.net/data/flags/w580/fj.png"],
        "Islas Marshall" => ["capital" => "Majuro", "bandera" => "http://flags.fmcdn.net/data/flags/w580/mh.png"],
        "Islas Salomón" => ["capital" => "Honiara", "bandera" => "http://flags.fmcdn.net/data/flags/w580/sb.png"],
        "Kiribati" => ["capital" => "Tarawa", "bandera" => "http://flags.fmcdn.net/data/flags/w580/ki.png"],
        "Micronesia" => ["capital" => "Palikir", "bandera" => "http://flags.fmcdn.net/data/flags/w580/fm.png"],

    ],
];

$table = ['Continente', 'País', 'Capital', 'Bandera'];
?>