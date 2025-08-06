<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiManagement;

class ApiManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = [           

            ['id' => 38, 'vendor' => 'anthropic', 'vendor_model' => 'Claude 4 Opus', 'model' => 'claude-opus-4-20250514', 'new' => false, 'title' => 'Claude 4 Opus', 'description' => 'Our most powerful models yet, pushing the frontier for coding and AI agents—and enabling Claude to handle hours of work across Claude and Claude Code.', 'input_token' => 1.0, 'output_token' => 1.0, 'logo' => ' <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 inline-block h-4 w-4 align-text-top" aria-hidden="true"><path fill="currentColor" fill-rule="evenodd" d="M3.512 6.065c-.777 1.87-1.772 4.262-2.212 5.317l-.8 1.92 1.229.017c.676.01 1.24.006 1.255-.008.015-.014.221-.505.459-1.09l.431-1.066h4.718l.117.293.44 1.089.321.797h1.258c.98 0 1.25-.018 1.224-.082a3382.243 3382.243 0 0 1-3.78-9.073l-.625-1.512H4.924L3.512 6.065ZM9.68 2.788c.018.066 1.007 2.466 2.198 5.332l2.165 5.213h1.244c.684 0 1.23-.021 1.213-.048-.047-.074-4.3-10.303-4.354-10.472-.047-.144-.061-.146-1.274-.146-1.16 0-1.224.006-1.192.12ZM6.576 6.195c.178.439.515 1.265.75 1.838l.425 1.04-.739.019c-.406.01-1.089.01-1.517 0l-.78-.019.358-.878.748-1.837c.215-.528.4-.96.41-.96.012 0 .167.36.345.797Z" clip-rule="evenodd"></path></svg>'],
            ['id' => 39, 'vendor' => 'anthropic', 'vendor_model' => 'Claude 4 Sonnet', 'model' => 'claude-sonnet-4-20250514', 'new' => false, 'title' => 'Claude 4 Sonnet', 'description' => 'Our most powerful models yet, pushing the frontier for coding and AI agents—and enabling Claude to handle hours of work across Claude and Claude Code.', 'input_token' => 1.0, 'output_token' => 1.0, 'logo' => ' <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="none" class="mr-1 inline-block h-4 w-4 align-text-top" aria-hidden="true"><path fill="currentColor" fill-rule="evenodd" d="M3.512 6.065c-.777 1.87-1.772 4.262-2.212 5.317l-.8 1.92 1.229.017c.676.01 1.24.006 1.255-.008.015-.014.221-.505.459-1.09l.431-1.066h4.718l.117.293.44 1.089.321.797h1.258c.98 0 1.25-.018 1.224-.082a3382.243 3382.243 0 0 1-3.78-9.073l-.625-1.512H4.924L3.512 6.065ZM9.68 2.788c.018.066 1.007 2.466 2.198 5.332l2.165 5.213h1.244c.684 0 1.23-.021 1.213-.048-.047-.074-4.3-10.303-4.354-10.472-.047-.144-.061-.146-1.274-.146-1.16 0-1.224.006-1.192.12ZM6.576 6.195c.178.439.515 1.265.75 1.838l.425 1.04-.739.019c-.406.01-1.089.01-1.517 0l-.78-.019.358-.878.748-1.837c.215-.528.4-.96.41-.96.012 0 .167.36.345.797Z" clip-rule="evenodd"></path></svg>'],

        ];

        foreach ($ads as $ad) {
            ApiManagement::updateOrCreate(['id' => $ad['id']], $ad);
        }
    }
}
