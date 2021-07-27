<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Postblogs;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // User::truncate();
        // Category::truncate();
        // Postblogs::truncate();

        $user =User::factory()->create();
        $posts=Postblogs::factory(5)->create();
        
    //    $personal= Category::create([
    //         'name'=>'Personal',
    //         'slug'=>'personal'
    //     ]);

    //    $home= Category::create([
    //         'name'=>'Home',
    //         'slug'=>'home'
    //     ]);

    //    $work= Category::create([
    //         'name'=>'Work',
    //         'slug'=>'work'
    //     ]);

    //    $posts= Postblogs::create([
    //        'user_id'=>$user->id,
    //        'category_id'=>$personal->id,
    //        'title'=>'My First Post',
    //        'slug'=>'My-first-post',
    //        'excerpt'=>'loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur',
    //        'body'=>'loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur'
    //    ]);

    //    $posts= Postblogs::create([
    //     'user_id'=>$user->id,
    //     'category_id'=>$home->id,
    //     'title'=>'My Second Post',
    //     'slug'=>'My-second-post',
    //     'excerpt'=>'loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur',
    //     'body'=>'loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur'
    // ]);

    // $posts= Postblogs::create([
    //     'user_id'=>$user->id,
    //     'category_id'=>$work->id,
    //     'title'=>'My Third Post',
    //     'slug'=>'My-third-post',
    //     'excerpt'=>'loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur',
    //     'body'=>'loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur loream libero id commodi aperiam architecto quod, asperiores totam nam aspernatur'
    // ]);
       
       

        




        // $gender = $faker->randomElement(['male', 'female']);

    	// foreach (range(1,10) as $index) {
        //     DB::table('students')->insert([
        //         'name' => $faker->name($gender),
        //         'email' => $faker->email
        //     ]);
        // }
    }
}
