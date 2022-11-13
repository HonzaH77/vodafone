<?php

namespace App\Console\Commands;

use App\Driver\MySQL\UserItem;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Command\Command as CommandAlias;

class CreateUserAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {username} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $attributes = [
            'username' => $this->argument('username'),
            'email' => $this->argument('email'),
            'password' => $this->argument('password')
        ];

        User::create($attributes);
        return CommandAlias::SUCCESS;
    }
}
