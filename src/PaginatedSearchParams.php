<?php


namespace Lacuna\Amplia;


class PaginatedSearchParams
{
    const DEFAULT_LIMIT = 10;

    public $q;
    public $limit;
    public $offset;
    public $order;

    public function __construct($model = null)
    {
        $this->q = '';
        $this->offset = self::DEFAULT_LIMIT;
        $this->offset = 0;
        $this->order = null;

        if (isset($model)) {
            $this->q = $model['q'] ?: '';
            $this->limit = $model['limit'] ?: self::DEFAULT_LIMIT;
            $this->offset = $model['offset'] ?: 0;

            if (isset($model['order'])) {
                if ($model['order'] == PaginationOrders::ASC || $model['order'] == PaginationOrders::DESC) {
                    $this->order = $model['order'];
                } else {
                    throw new \RuntimeException("Unsupported \"order\" field on model for PaginatedSearchParams: {$model['order']}");
                }
            }
        }
    }
}