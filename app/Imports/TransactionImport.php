<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionImport implements ToModel
{
    public function model(array $row)
    {
        return new Transaction([
           'product_id'  => $row[0],
           'trx_date'    => $row[1],
           'price'       => $row[2],
        ]);
    }
}



