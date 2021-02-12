<?php


namespace App\Http\Traits;

trait PaginatorLimitTrait
{
    public function getPaginate()
    {
        return request()->get('limit', 20);
    }
}
