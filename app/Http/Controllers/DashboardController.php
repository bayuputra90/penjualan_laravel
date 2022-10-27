<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $sql = "SELECT MONTHNAME(trx_date) month, count(*) total FROM transactions ".
        "GROUP BY MONTHNAME(trx_date) ".
        "ORDER BY MONTH(trx_date)";

        // menggunakan query sql
        $transactions = \Illuminate\Support\Facades\DB::select($sql);

        $months = [];
        $totals = [];

        foreach($transactions as $transaction) {
            $months[] = $transaction->month;
            $totals[] = $transaction->total;
        }

        $chart = [
            'months' => $months,
            'totals' => $totals,
        ];

        return view('admin.dashboard', $chart);
    }
}
