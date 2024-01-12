<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Create sample tasks
          Task::create([
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'status' => 'To Do',
        ]);

        Task::create([
            'title' => 'Task 2',
            'description' => 'Description for Task 2',
            'status' => 'In Progress',
        ]);

        Task::create([
            'title' => 'Task 3',
            'description' => 'Description for Task 3',
            'status' => 'Completed',
        ]);

    }
}
