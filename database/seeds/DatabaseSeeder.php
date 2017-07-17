<?php

use Illuminate\Database\Seeder;
use App\Models\TwilioNumber;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TwilioNumberTableSeeder);
    }

}

class TwilioNumberTableSeeder extends Seeder {

    public function run()
    {
        DB::table('twilio_numbers')->delete();

        TwilioNumber::create(array('account_id' => 1, 'number' => '+815012345678', 'created_at' => now(), 'updated_at' => now()));
    }

}

