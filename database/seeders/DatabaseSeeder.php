<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\History;
use App\Models\Project;
use App\Models\Task;
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
        $users = User::factory(5)->create();
        foreach ($users as $user)
        {
            $projects = Project::factory(5)->create(['user_id' => $user->id]);
            foreach ($projects as $project)
            {
                $tasks = Task::factory(10)->create(['project_id' => $project->id, 'user_id' => $user->id]);
                foreach ($tasks as $task)
                    History::factory(5)->create(['task_id' => $task->id]);
                foreach ($users as $user)
                    Comment::factory(1)->create(['project_id' => $project->id, 'user_id' => $user->id]);

            }
        }

    }
}

