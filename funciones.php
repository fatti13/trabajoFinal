<?php

  function extraer($texto, $numPalabras){
    $palabras = explode(' ', $texto);
    $palabrasLimite = array_slice($palabras, 0, $numPalabras);
    $resultado = implode(' ', $palabrasLimite);
    return $resultado;
  }
//   $frase = "Hola amigo de la tierra";
//   echo extraer($frase, 2);

