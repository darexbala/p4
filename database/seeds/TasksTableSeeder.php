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
        $user_id = \Auth::where('name','=','Jill')->pluck('id')->first();
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Do the Laundry',
            'author_id' => $user_id,
            'is_complete' =>false
        ]);
        $user_id = \Auth::where('name','=','Jill')->pluck('id')->first();;
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Grocery shopping',
            'author_id' => $user_id,
            'is_complete' => false
        ]);
        $user_id = \Auth::where('name','=','Jamal')->pluck('id')->first();;
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Car wash',
            'author_id' => $user_id,
            'is_complete' => false
        ]);
    }
}
