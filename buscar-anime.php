#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Anime\topAnime\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);

$crawler =  new Crawler();

$buscador= new Buscador($client, $crawler);

$animes=$buscador->buscar('https://myanimelist.net/topanime.php');

$i=1;
foreach ($animes as $anime){
    echo $i.' - '. $anime.PHP_EOL;
    $i++;
}