<?php

use Illuminate\Database\Seeder;

use App\User;

class UtentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d=new User;
        $d->name='Simone Ciccia';
        $d->email='simone.ciccia@mainte.it';
        $d->password=bcrypt('Arshesnei999!');
        $d->save();

        $d=new User;
        $d->name='Luciano Scussolini';
        $d->email='luciano.scussolini@mainte.it';
        $d->password=bcrypt('Lusi6389!');
        $d->save();
    }
}
