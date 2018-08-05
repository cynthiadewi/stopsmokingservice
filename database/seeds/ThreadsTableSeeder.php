<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Thread::class, 20)->create()->each(function($thread){factory(App\Reply::class, 10)->create(['thread_id'=>$thread->id]);});
        for($i=1; $i<15; $i++){
            factory(App\Group::class,1)->create()->each(function($group){factory(App\Member::class,1)->create(['user_id'=>$group->id]);});;
            DB::table('threads')->where('id','=',$i)->update(['group_id' => $i]);
        };
    }
}

