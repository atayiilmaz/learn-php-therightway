<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class TransactionController extends HomeController
{
    public function transactions(): View
    {
        return View::make('transactions');
    }

    public function uploadTransaction(): View
    {
        return View::make('upload-transaction');
    }
}