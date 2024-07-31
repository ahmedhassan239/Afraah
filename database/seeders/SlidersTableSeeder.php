<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 7,
                'country_id' => 1,
                'image' => 'sliders/2copy.jpg',
                'alt' => '{"en":null}',
                'title' => '{"ar":"\\u0625\\u0633\\u062a\\u0639\\u062f \\u0644\\u062d\\u0641\\u0644 \\u0632\\u0641\\u0627\\u0641\\u0643 \\u0645\\u0639 \\u0623\\u0641\\u0631\\u0627\\u062d","en":null}',
                'small_text' => '{"ar":"\\u0643\\u0644 \\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641 \\u0641\\u0649 \\u0645\\u0643\\u0627\\u0646 \\u0648\\u0627\\u062d\\u062f","en":null}',
                'created_at' => '2022-05-12 17:51:08',
                'updated_at' => '2022-05-12 19:30:19',
            ),
            1 => 
            array (
                'id' => 8,
                'country_id' => 1,
                'image' => 'sliders/4copy_GH66f5W.jpg',
                'alt' => '{"en":null}',
                'title' => '{"ar":"\\u0625\\u0633\\u062a\\u0639\\u062f \\u0644\\u062d\\u0641\\u0644 \\u0632\\u0641\\u0627\\u0641\\u0643 \\u0645\\u0639 \\u0623\\u0641\\u0631\\u0627\\u062d","en":null}',
                'small_text' => '{"ar":"\\u0643\\u0644 \\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0632\\u0641\\u0627\\u0641 \\u0641\\u0649 \\u0645\\u0643\\u0627\\u0646 \\u0648\\u0627\\u062d\\u062f","en":null}',
                'created_at' => '2022-05-12 17:51:31',
                'updated_at' => '2022-05-15 16:19:44',
            ),
            2 => 
            array (
                'id' => 9,
                'country_id' => 1,
                'image' => 'sliders/1copy.jpg',
                'alt' => '{"en":null}',
                'title' => '{"en":null}',
                'small_text' => '{"en":null}',
                'created_at' => '2022-05-12 17:51:58',
                'updated_at' => '2022-05-12 19:50:52',
            ),
            3 => 
            array (
                'id' => 10,
                'country_id' => 1,
                'image' => 'sliders/3.jpg',
                'alt' => '{"en":null}',
                'title' => '{"en":null}',
                'small_text' => '{"en":null}',
                'created_at' => '2022-05-12 17:52:22',
                'updated_at' => '2022-05-12 19:52:05',
            ),
        ));
        
        
    }
}