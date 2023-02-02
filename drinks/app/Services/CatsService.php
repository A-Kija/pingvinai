<?php

namespace App\Services;

use App\Models\Type;

class CatsService
{

    public function test()
    {
        return 'Hello this is Cats Service';
    }

    public function get()
    {
        return Type::all();
    }

}