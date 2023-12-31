<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\Transaction;

class TransactionController
{
    public function transactions(): View
    {
        $transactionModel = new Transaction();

        $transactions = $transactionModel->getTransactionDataFromCsv(STORAGE_PATH . '/transactions_sample.csv');
        $transactionModel->insertTransactionsIntoDatabase($transactions);

        return View::make('transactions');
    }

    public function uploadTransaction(): View
    {
        return View::make('upload-transaction');
    }

    public function upload(): void
    {

        // echo '<pre>';
        // var_dump($_FILES);
        // echo '</pre>';

        $filePath = STORAGE_PATH . '/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

        // echo '<pre>';
        // var_dump(pathinfo($filePath));
        // echo '</pre>';

    }
}