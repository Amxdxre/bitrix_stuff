<?php

namespace amadare\example\controller;

use amadare\example\entity\Subwoofer;
use DOMDocument;
use DOMXPath;

class SubwooferParser
{
    public $url;

    public function __construct($url = 'https://dl-audio.ru/subwoofers/')
    {
        $this->url = $url;
    }

    public function getHtmlData()
    {
        $DOMDocument = new DOMDocument();
        $DOMDocument->loadHTMLFile($this->url);
        return $DOMDocument;
    }

    public function getUrlSubwoofer()
    {
        $DOMDocument = $this->getHtmlData();
        $DOMXPath = new DOMXPath($DOMDocument);
        $query = $DOMXPath->query('//a[@class="product-item"]');
        $subwoofers = array();
        foreach ($query as $subwoofer) {
            $currentItem = array();
            $currentItem['URL'] = $subwoofer->getAttribute('href');
            $subwoofers[] = $currentItem;
        }
        return $subwoofers;
    }

    public function getDOMItem($expression, $DOMXPath, int $nodeIndex = 0)
    {
        $query = $DOMXPath->query($expression);
        if (!$query) {
            return 'Иди нахуй';
        }
        $DOMNode = $query->item($nodeIndex);
        return $DOMNode->textContent;
    }

    public function getSubwoofers()
    {
        $subwoofers = $this->getUrlSubwoofer();

        $subwoofersInfo = array();

        foreach ($subwoofers as $info) {
            $DOMDocument = new DOMDocument();
            $DOMDocument->loadHTMLFile($info['URL']);
            $subwoofer = new Subwoofer();

            $DOMXPath = new DOMXPath($DOMDocument);
            $subwoofer->name = $this->getDOMItem('//h1', $DOMXPath);

            $subwoofer->desc = $this->getDOMItem('//p[@class="product-slogan"]', $DOMXPath);

            $subwoofer->price = (int)str_replace(array(' ', ' '), '', $this->getDOMItem('//div[@class="product-price"]/div', $DOMXPath));

            $subwoofer->power = (int)$this->getDOMItem('//p[@class="param-value h2"]', $DOMXPath,1);

            $subwoofersInfo[] = $subwoofer;
        }
        var_dump($subwoofersInfo);
        return $subwoofersInfo;
    }
}