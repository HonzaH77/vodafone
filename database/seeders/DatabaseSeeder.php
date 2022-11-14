<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\History;
use App\Models\Project;
use App\Models\Task;
use Database\Factories\CommentFactory;
use Database\Factories\HistoryFactory;
use Database\Factories\ProjectFactory;
use Database\Factories\TaskFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = UserFactory::make(15);
        foreach ($users as $user)
        {
            $projects = ProjectFactory::make(15, $user);
            foreach ($projects as $project)
            {
                $tasks = TaskFactory::make(15, $project, $user);
                foreach ($tasks as $task)
                    HistoryFactory::make(10, $task);
                foreach ($users as $user)
                    CommentFactory::make(1, $project, $user);
            }
        }

    }
}

