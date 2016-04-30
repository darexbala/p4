<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = \App\User::where('name','=','Jill')->pluck('id')->first();
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Do the Laundry',
            'user_id' => $user_id,
            'is_complete' =>false,
            'task_type_id' => 1
        ]);
        $user_id = \App\User::where('name','=','Jill')->pluck('id')->first();;
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Grocery shopping',
            'user_id' => $user_id,
            'is_complete' => false,
            'task_type_id' => 2
        ]);
        $user_id = \App\User::where('name','=','Jamal')->pluck('id')->first();;
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Car wash',
            'user_id' => $user_id,
            'is_complete' => false,
            'task_type_id' => 1
        ]);
    }
}
