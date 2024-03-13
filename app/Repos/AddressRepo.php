<?php

namespace App\Repos;

class AddressRepo extends BaseRepos
{
    const TABLE = 'address';
    const COLUMN = [
        'address' ,
        'ward_id' ,
        'district_id' ,
        'city_id' ];

    protected function table()
    {
        return self::TABLE;
    }

    protected function column()
    {
        return self::COLUMN;
    }

}