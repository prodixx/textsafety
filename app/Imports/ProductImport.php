<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings, WithBatchInserts, WithChunkReading
{

    public function __construct($language)
    {
        $this->language     = $language;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows->chunk('1000') as $row_chunk) {
            foreach ($row_chunk as $entry) {
                $row = $entry->toArray();

                $code = explode(" -", $row['text']);

                // dd($row);
                Product::updateOrCreate(
                    [
                        'code' => $code[0]
                    ],
                    $this->productArray($row)
                );
            }
        }
    }

    public function productArray($row)
    {
        if ($this->language === 'ro') {
            $data['title_ro']   = str_replace(array("\r", "\n"), '', $row['text']);
            $data['details_ro'] = $row['descriere'];
            $data['technic_ro'] = $row['tehnice'];
            $data['colors_ro']  = $row['culoare'];
        }
        if ($this->language === 'en') {
            $data['title_en']   = str_replace(array("\r", "\n"), '', $row['text']);
            $data['details_en'] = $row['descriere'];
            $data['technic_en'] = $row['tehnice'];
            $data['colors_en']  = $row['culoare'];
        }
        if ($this->language === 'es') {
            $data['title_es']   = str_replace(array("\r", "\n"), '', $row['text']);
            $data['details_es'] = $row['descriere'];
            $data['technic_es'] = $row['tehnice'];
            $data['colors_es']  = $row['culoare'];
        }
        if ($this->language === 'fr') {
            $data['title_fr']   = str_replace(array("\r", "\n"), '', $row['text']);
            $data['details_fr'] = $row['descriere'];
            $data['technic_fr'] = $row['tehnice'];
            $data['colors_fr']  = $row['culoare'];
        }
        if ($this->language === 'it') {
            $data['title_it']   = str_replace(array("\r", "\n"), '', $row['text']);
            $data['details_it'] = $row['descriere'];
            $data['technic_it'] = $row['tehnice'];
            $data['colors_it']  = $row['culoare'];
        }
        if ($this->language === 'de') {
            $data['title_de']   = str_replace(array("\r", "\n"), '', $row['text']);
            $data['details_de'] = $row['descriere'];
            $data['technic_de'] = $row['tehnice'];
            $data['colors_de']  = $row['culoare'];
        }

        return $data;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

}
