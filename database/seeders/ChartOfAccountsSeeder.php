<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChartOfAccount;

class ChartOfAccountsSeeder extends Seeder
{
    public function run()
    {
        $accounts = [

            // A. Assets (1000–1999)
            ['1101', 'Kas', 'asset', 'current_asset'],
            ['1102', 'Bank', 'asset', 'current_asset'],
            ['1201', 'Piutang Usaha', 'asset', 'current_asset'],
            ['1301', 'Persediaan Sparepart', 'asset', 'current_asset'],
            ['1501', 'Aset Kendaraan (Mobil)', 'asset', 'fixed_asset'],
            ['1502', 'Akumulasi Penyusutan Kendaraan', 'asset', 'contra_asset'],
            ['1601', 'Peralatan Kantor', 'asset', 'fixed_asset'],

            // B. Liabilities (2000–2999)
            ['2101', 'Utang Usaha', 'liability', 'current_liability'],
            ['2201', 'Utang Bank / Leasing', 'liability', 'long_term_liability'],

            // C. Equity (3000–3999)
            ['3101', 'Modal Pemilik', 'equity', 'equity'],
            ['3201', 'Prive', 'equity', 'equity'],

            // D. Revenue (4000–4999)
            ['4101', 'Pendapatan Sewa Mobil', 'revenue', 'revenue'],
            ['4201', 'Pendapatan Sopir', 'revenue', 'revenue'],

            // E. Expenses (5000–5999)
            ['5101', 'Biaya Bensin', 'expense', 'expense'],
            ['5102', 'Biaya Service / Maintenance', 'expense', 'expense'],
            ['5103', 'Biaya Penyusutan Kendaraan', 'expense', 'expense'],
            ['5201', 'Gaji Sopir', 'expense', 'expense'],
            ['5301', 'Biaya Administrasi', 'expense', 'expense'],
            ['5401', 'Biaya Asuransi Kendaraan', 'expense', 'expense'],
        ];

        foreach ($accounts as $acc) {
            ChartOfAccount::create([
                'code'          => $acc[0],
                'name'          => $acc[1],
                'type'          => $acc[2],
                'category'      => $acc[3],
                'start_balance' => 0,
                'balance_type'  => in_array($acc[2], ['asset','expense']) ? 'debit' : 'credit',
                'description'   => $acc[1],
            ]);
        }

    }
}
