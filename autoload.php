<?php

// spl_autoload_register é uma função que recebe uma função de autoload.
// Para cada comando "use" usado para importar uma classe, a função anônima
// fornecida para a função spl_autoload_register será chamada.

spl_autoload_register(function ($classe) {
    $prefixo = 'App\\';

    $diretorio = __DIR__ . '\\src\\';

    if (strncmp($prefixo, $classe, strlen($prefixo)) !== 0) // Compara duas strings até o limite de um número inteiro.
    {
        return;
    }

    // var_dump($classe); // App\Alura\Usuario
    $namespace = substr($classe, strlen($prefixo)); // Remove o número de caracteres do prefixo a partir do início da string da clase.
    // var_dump($namespace); // Alura\Usuario
    $namespace_arquivo = str_replace("\\", DIRECTORY_SEPARATOR, $namespace);
    $arquivo  = $diretorio . $namespace_arquivo . ".php";

    // var_dump($arquivo); <diretorio_raiz>\src\Alura\Usuario.php
    require_once $arquivo;
});
