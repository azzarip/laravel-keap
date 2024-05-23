<?php

namespace KeapGeek\Keap\Commands;

use KeapGeek\Keap\Exceptions\InvalidTokenException;
use KeapGeek\Keap\Keap;
use Illuminate\Console\Command;

class RefreshToken extends Command
{
    public $signature = 'keap:refresh';

    public $description = 'Refresh Keap access and refresh tokens.';

    public function handle(): int
    {
        if (! Keap::token()->check()) {
            $this->error('Access and refresh tokens not found in cache. Please login at /keap/auth');
            (new InvalidTokenException)->report();

            return self::FAILURE;
        }

        Keap::token()->refresh();

        $this->info('Successfully refreshed access and refresh tokens.');

        return self::SUCCESS;
    }
}
