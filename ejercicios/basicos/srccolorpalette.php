<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srccolorpalette.php
 * @Date: 28/09/18
 * @Description: Genera una paleta de colores en hexadecimal o RGB.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function generateColorPalette() {
    $color = "";
    echo "<h3>Generando una paleta de colores RGB</h3>";
    echo "<table>";
    for ($r = 0; $r <= 255; $r += 16) {
        for ($g = 0; $g <= 255; $g += 32) {
            echo "<tr>";
            for ($b = 0; $b <= 255; $b += 64) {
                $color = "rgb($r,$g,$b)";
                echo "<td style=\"background-color:$color\">$color</td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
}

function generateSimpleColorPalette(){
    $r = array("00","10","20","33","55","77","AA","CC","FF");
    $g = array("00","10","20","33","55","77","AA","CC","FF");
    $b = array("00","10","20","33","55","77","AA","CC","FF");
    $color = "";
    echo "<h3>Generando una paleta de colores en hexadecimal</h3>";
    echo "<table>";
    for ($i = 0; $i < count($r); $i++) {
        for ($j = 0; $j < count($g); $j++) {
            echo "<tr>";
            for ($k = 0; $k < count($b); $k++) {
                $color = "#$r[$i]$g[$j]$b[$k]";
                echo "<td bgcolor=\"$color\">$color</td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
}