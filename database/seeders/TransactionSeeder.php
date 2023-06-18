<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::factory()->create([
            "amount" => 10000,
            "invoice_number" => "INV-001"
        ]);

        Transaction::factory()->create([
            "amount" => 12000,
            "invoice_number" => "INV-002"
        ]);

        Transaction::factory()->create([
            "amount" => 16000,
            "invoice_number" => "INV-003"
        ]);
    }
}
