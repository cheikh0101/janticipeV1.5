<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_documents')->insert([
            [
                'code' => 'CM',
                'nom' => 'Cours Magistral',
            ],
            [
                'code' => 'TP',
                'nom' => 'Travaux Pratiques',
            ],
            [
                'code' => 'TD',
                'nom' => 'Travaux Dirigés',
            ],
            [
                'code' => 'DV',
                'nom' => 'Devoir',
            ],
            [
                'code' => 'EX',
                'nom' => 'Examen',
            ],
            [
                'code' => 'EPR',
                'nom' => 'Ennoncé Projet',
            ],
            [
                'code' => 'EXP',
                'nom' => 'Exposé',
            ],
            [
                'code' => 'CTP',
                'nom' => 'Correction Travaux Pratiques',
            ],
            [
                'code' => 'CTD',
                'nom' => 'Correction Travaux Dirigés',
            ],
            [
                'code' => 'CDV',
                'nom' => 'Correction Devoir',
            ],
            [
                'code' => 'CEX',
                'nom' => 'Correction Examen',
            ],
        ]);
    }
}
