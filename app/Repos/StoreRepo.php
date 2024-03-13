<?php

namespace App\Repos;

class StoreRepo extends BaseRepos
{
    const TABLE = 'store';
    const COLUMN = [
        'name' ,
        'phone',
        'address_id' ,
        'template_id' ,
        'store_type_id' ,
        'wifi_pass' ,
        'email' ,
        'status' ];

    protected function table()
    {
        return self::TABLE;
    }

    protected function column()
    {
        return self::COLUMN;
    }

}