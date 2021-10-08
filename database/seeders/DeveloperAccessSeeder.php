<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class DeveloperAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->line('Seeding Users from DeveloperAccess file...');
        $user = User::where('name', 'Leonard Selvaraja')->first();
        if (!$user) {
            //If you need to add an account for yourself, add it below this.
            $user = new User;
            $user->name = 'Leonard Selvaraja';
            $user->email = 'kashrayks@gmail.com';
            $user->email_verified_at = now();
            $user->password = "$2y$10$8CfoYn2vturcIeuGRQfzfuUb1XOT2G3aSvZZBiISMbz80hxfAHM7.";
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Leonard Selvaraja created.");
        }

        $user = User::where('name', 'Thirumalai')->first();
        if (!$user) {
            $user = new User;
            $user->name = 'Thirumalai';
            $user->email = 'm.thirurahul@gmail.com';
            $user->email_verified_at = now();
            $user->password = '$2y$10$gp5aizeQoP2mLDCPj.utb.xXS1rQaM3PkXd.Z1XliBWTxQcdXqqUC';
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Thirumalai created.");
        }

        $user = User::where('name', 'Dinesh Kumar')->first();
        if (!$user) {
            $user = new User;
            $user->name = 'Dinesh Kumar';
            $user->email = 'john.doe@test.com';
            $user->email_verified_at = now();
            $user->password = '$2y$10$RufvOqmxVVsmvWA0w9P2DuMhbfxLt8lQQrxZNCB1nu7NtpJDj1jvi';
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Dinesh Kumar created.");
        }


        $user = User::where('name', 'Mehal Sakthi M S')->first();
        if (!$user) {
            $user = new User;
            $user->name = 'Mehal Sakthi M S';
            $user->email = 'mehalsakthi@gmail.com';
            $user->email_verified_at = now();
            $user->password = '$2y$10$345gC1Ea/2iKTp/t/8Q1g.tiTGm5eR0C3aJduh3Q/WvRkT2KboBf2';
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Mehal Sakthi M S created.");
        }

        $user = User::where('name', 'Rishi Kataria')->first();
        if (!$user) {
            $user = new User;
            $user->name = 'Rishi Kataria';
            $user->email = 'rishikataria@outlook.com';
            $user->email_verified_at = now();
            $user->password = '$2y$10$Ku.suEJp61lveGrzAJmu0.24KM40ficf/sAvJTlzUwU7pAp8bGoPC';
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Rishi Kataria created.");
        }

        $user = User::where('name', 'Shreya Rani')->first();
        if (!$user) {
            $user = new User;
            $user->name = 'Shreya Rani';
            $user->email = 'shreyaaa03@gmail.com';
            $user->email_verified_at = now();
            $user->password = '$2y$10$1HMdt.0HtoB0TsF8DsdWkOMrL0a.pSWxYROEHpDL4a2qyyF1hnlom';
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Shreya Rani created.");
        }

        $user = User::where('name', 'Samay Bhattacharyya')->first();
        if (!$user) {
            //If you need to add an account for yourself, add it below this.
            $user = new User;
            $user->name = 'Samay Bhattacharyya';
            $user->email = 'lyrakerman@gmail.com';
            $user->email_verified_at = now();
            $user->password = '$2y$10$Z2fX/TDd7hIjBnamBhW9/eiffpxiVddzY/Kyihap2A074PXHMb2jG';
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Samay Bhattacharyya created.");
        }

        $user = User::where('name', 'Hafiz Mutalib')->first();
        if (!$user) {
            //If you need to add an account for yourself, add it below this.
            $user = new User;
            $user->name = 'Hafiz Mutalib';
            $user->email = 'hafizmutalib01@gmail.com';
            $user->email_verified_at = now();
            $user->password = 'badcurry01';
            $user->role = 'superadmin';
            $user->save();
            $this->command->info("User: Hafiz Mutalib created.");
        }

    }

}

