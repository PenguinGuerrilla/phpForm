<?php

$cep = $_POST['CEP'];

$retorno = json_decode(file_get_contents("https://viacep.com.br/ws/$cep/json/"));

//var_dump($retorno);

print("<h1>Resultado da consulta</h1>");
print("Logradouro: ".$retorno->logradouro."<br>");

if($retorno->complemento <> "") {
   print("Complemento: ".$retorno->complemento."<br>");
}


print("Bairro: ".$retorno->bairro."<br>");
print("Cidade: ".$retorno->localidade."<br>");
print("Estado: ".$retorno->uf);

?>