<?php

require 'vendor/autoload.php';
/*
Teste::metodo();
Teste2::metodo2();
exit();
*/
use GuzzleHttp\Client;
use Renan\PhpComposer\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);

$crawler =  new Crawler();

$buscador= new Buscador($client, $crawler);

$animes=$buscador->buscar('https://myanimelist.net/profile/vgranzs');

$i=1;
foreach ($animes as $anime){

    echo exibeMensagem($i.' - '. $anime);
    $i++;
}