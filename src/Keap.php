<?php

namespace Azzarip\Keap;

class Keap
{
    public static function token()
    {
        return new Services\Token();
    }

    public static function contact()
    {
        return new Services\Contact();
    }
}
