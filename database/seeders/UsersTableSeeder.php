<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'arabic_name' => 'أدمن',
                'is_admin' => 2,
                'phone' => '101000154545',
                'country_id' => NULL,
                'city_id' => NULL,
                'category_id' => NULL,
                'service_id' => NULL,
                'gender' => 'male',
                'email' => 'admin@admin.com',
                'photo' => '1649158555.png',
                'email_verified_at' => '2021-10-26 13:37:22',
                'password' => bcrypt('1'),
                'api_token' => NULL,
                'remember_token' => '5usVXf5Pj97P1nUxHiRjsavIpVukt5vzCbq2zjjbIrkSbAX1BezzwTWnC2Bf',
                'verification_code' => NULL,
                'created_at' => '2021-10-26 13:37:22',
                'updated_at' => '2022-04-05 18:35:55',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'user',
                'arabic_name' => 'user',
                'is_admin' => 0,
                'phone' => '01010949209',
                'country_id' => 1,
                'city_id' => 1,
                'category_id' => NULL,
                'service_id' => 1,
                'gender' => NULL,
                'email' => 'user@user.com',
                'photo' => NULL,
                'email_verified_at' => '2021-10-26 13:37:22',
                'password' => '$2y$10$sC2m.78PC8Zxwr6yuDqOcOpvDKl4Lk/Co9Hm8G8gEJCGnDGq/Qxay',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2021-10-26 13:39:24',
                'updated_at' => '2021-10-26 13:39:24',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Car Vendor',
                'arabic_name' => 'Car Vendor',
                'is_admin' => 0,
                'phone' => '01010949209',
                'country_id' => 1,
                'city_id' => 1,
                'category_id' => NULL,
                'service_id' => 2,
                'gender' => NULL,
                'email' => 'car@vendor.com',
                'photo' => NULL,
                'email_verified_at' => '2021-10-26 13:37:22',
                'password' => '$2y$10$C.4XE22KksteTODF5cuBtOx3o1tq/hUNHXb/tTndMV49PZnj4AriC',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2021-10-31 06:31:56',
                'updated_at' => '2021-10-31 06:31:56',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Ahmed Adel',
                'arabic_name' => NULL,
                'is_admin' => 0,
                'phone' => NULL,
                'country_id' => NULL,
                'city_id' => NULL,
                'category_id' => NULL,
                'service_id' => NULL,
                'gender' => NULL,
                'email' => 'a.adel@afraah.com',
                'photo' => NULL,
                'email_verified_at' => '2021-10-26 13:37:22',
                'password' => '$2y$10$1ndNEwO.Sd3vSdDKtHqvFuk.PU5h8M05ThTwlbNRr9wVCra817P8y',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2021-11-07 19:11:39',
                'updated_at' => '2021-11-07 19:11:39',
            ),
            4 =>
            array (
                'id' => 8,
                'name' => 'ahmed sultan',
                'arabic_name' => 'ابو عادل',
                'is_admin' => 0,
                'phone' => NULL,
                'country_id' => 1,
                'city_id' => 1,
                'category_id' => NULL,
                'service_id' => 4,
                'gender' => NULL,
                'email' => 'a.adel@digitalexperts.ae',
                'photo' => '1648722181.png',
                'email_verified_at' => '2021-10-26 13:37:22',
                'password' => '$2y$10$s4dQ5JcAHhhZtc4It6q8cONlxx2joEEEs8K.CTlOqsici3eM5fHpK',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2021-11-08 21:50:32',
                'updated_at' => '2022-03-31 17:23:01',
            ),
            5 =>
            array (
                'id' => 9,
                'name' => 'hossam elharery',
                'arabic_name' => NULL,
                'is_admin' => 0,
                'phone' => NULL,
                'country_id' => NULL,
                'city_id' => NULL,
                'category_id' => NULL,
                'service_id' => NULL,
                'gender' => NULL,
                'email' => 'h.elharery@digitalexperts.ae',
                'photo' => NULL,
                'email_verified_at' => '2021-10-26 13:37:22',
                'password' => '$2y$10$jthiqcTSOLweVvgds9L83.FUH15a4oYLzJE5/VQDcBY5MQLztjw6u',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2021-11-11 16:04:38',
                'updated_at' => '2021-11-11 16:04:38',
            ),
            6 =>
            array (
                'id' => 76,
                'name' => 'Ahmed Mamdouh',
                'arabic_name' => 'Ahmed Mamdouh',
                'is_admin' => 1,
                'phone' => '12345687787',
                'country_id' => 1,
                'city_id' => 1,
                'category_id' => NULL,
                'service_id' => 10,
                'gender' => NULL,
                'email' => 'a.mamdouh@digitalexperts.ae',
                'photo' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$8tsDNaWbT8SfS6samByFQ.TrWFrbhlTKCXkeP3jDj7NN88/k5yYU6',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2022-03-14 20:11:53',
                'updated_at' => '2022-03-14 20:13:22',
            ),
            7 =>
            array (
                'id' => 77,
                'name' => 'nariman',
                'arabic_name' => 'nariman',
                'is_admin' => 1,
                'phone' => '1212121212',
                'country_id' => 1,
                'city_id' => 1,
                'category_id' => NULL,
                'service_id' => 4,
                'gender' => NULL,
                'email' => 'nariman@afraah.com',
                'photo' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$w.3yEq.mQ6xWVBaxTYzRUuK/O1e7e6e5/4IVQ7IY2TkIDVsIOVPzu',
                'api_token' => NULL,
                'remember_token' => 'aH3Qdx6yp20iDooBqDCWFd0ZpawoQr9Vr1vJkzMA6byasN1nRmhjNRkmQMBm',
                'verification_code' => NULL,
                'created_at' => '2022-03-20 14:29:26',
                'updated_at' => '2022-03-20 14:31:50',
            ),
            8 =>
            array (
                'id' => 78,
                'name' => 'marwa',
                'arabic_name' => 'marwa',
                'is_admin' => 1,
                'phone' => '10101010110',
                'country_id' => 1,
                'city_id' => 1,
                'category_id' => NULL,
                'service_id' => 16,
                'gender' => NULL,
                'email' => 'marwa@afraah.com',
                'photo' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$4XJgS3OtiC0YlOlGycYPJe2b8kAlfV2kVZHBUzvyi6NfYmhlpmyAu',
                'api_token' => NULL,
                'remember_token' => 'LOw7imxgu3NocbQuGwVvdUgv9zQcMlNG1Gan07H6KcaH34TWCCDEkg8GAVB6',
                'verification_code' => NULL,
                'created_at' => '2022-03-22 17:29:01',
                'updated_at' => '2022-03-22 17:29:01',
            ),
            9 =>
            array (
                'id' => 79,
                'name' => 'ahmed adel',
                'arabic_name' => NULL,
                'is_admin' => 0,
                'phone' => '01024778845',
                'country_id' => NULL,
                'city_id' => NULL,
                'category_id' => NULL,
                'service_id' => NULL,
                'gender' => 'male',
                'email' => 'a.adel9@digitalexperts.ae',
                'photo' => '1648736777.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/bgmwFPFQGwAd3UO4yFaHeEq.NzFG8wHUY/ptxhBf2PQFQNk3YjYS',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2022-03-28 03:50:11',
                'updated_at' => '2022-03-31 21:26:17',
            ),
            10 =>
            array (
                'id' => 80,
                'name' => 'test',
                'arabic_name' => NULL,
                'is_admin' => 0,
                'phone' => '1221212',
                'country_id' => NULL,
                'city_id' => NULL,
                'category_id' => NULL,
                'service_id' => NULL,
                'gender' => 'male',
                'email' => 'test@mail.com',
                'photo' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$LYGekkR7aNJIzPgMM55gWO0a/LRqAGZ2heFNiq1WwT7BFnk3r6rjC',
                'api_token' => NULL,
                'remember_token' => NULL,
                'verification_code' => NULL,
                'created_at' => '2022-04-17 20:43:59',
                'updated_at' => '2022-04-17 20:43:59',
            ),
            11 =>
            array (
                'id' => 81,
                'name' => 'haitham',
                'arabic_name' => 'haitham',
                'is_admin' => 1,
                'phone' => '12212222222',
                'country_id' => 1,
                'city_id' => 1,
                'category_id' => NULL,
                'service_id' => 8,
                'gender' => NULL,
                'email' => 'haytham@digitalexperts.ae',
                'photo' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$kcYl236xgwlzPOXEjdknu.z.oaTw1gFFIPxffs4OCjy5o7f55nnfC',
                'api_token' => NULL,
                'remember_token' => '9SeMOQFlam8xFqEupjmDMT4wE1yZj2rXlK4ZIyAno5kLiUBMsmfJJN7aRijN',
                'verification_code' => NULL,
                'created_at' => '2022-04-25 17:42:05',
                'updated_at' => '2022-04-25 17:42:05',
            ),
        ));


    }
}
