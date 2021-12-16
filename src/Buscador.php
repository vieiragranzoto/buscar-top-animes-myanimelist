<?php

namespace Anime\topAnime;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }
    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url);

        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $anime = $this->crawler->filter('.anime_ranking_h3');
        $listaAnimes = [];
        foreach ($anime as $elemento) {
            $listaAnimes[] = $elemento->textContent;
        }
        return $listaAnimes;
    }
}
