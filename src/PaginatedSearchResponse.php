<?php


namespace Lacuna\Amplia;


class PaginatedSearchResponse
{
    public $items;
    public $totalCount;

    public function __construct($model, $itemConstructor)
    {
        $this->items = [];
        $this->totalCount = $model['totalCount'];

        if (!isset($itemConstructor)) {
            throw new \RuntimeException('No constructor was provided');
        }

        if (!isset($model['items'])) {
            $this->items = array_map($itemConstructor, $model['items']);
        }
    }
}