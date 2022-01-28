<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


class TitleCrawler
{
    public function getUrlTitle(string $url): string
    {
        try {
            $client = new Client();
            $response = $client->request('GET', $url);
            $html = $response->getBody()->getContents();

            $crawler = new Crawler($html);

            return $crawler->filter('title')->text() ?: '';
        } catch (\Exception $e) {

        }
    }
}
