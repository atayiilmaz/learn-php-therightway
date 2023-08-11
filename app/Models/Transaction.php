<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Transaction extends Model
{
 
    public function __construct() 
    {
        parent::__construct();
    }

    public function getTransactionDataFromCsv(string $filePath) : array
    {
        $handle = fopen($filePath, 'r');
        $transactions = [];
    
        while (($data = fgetcsv($handle, 10000, ',')) !== FALSE) {
            $transactions[] = [
                'date' => $data[0],
                'check_number' => $data[1],
                'description' => $data[2],
                'amount' => $data[3],
            ];
        }
    
        fclose($handle);
    
        return $transactions;
    }

    public function insertTransactionsIntoDatabase(array $transactions): void
    {
   
        foreach ($transactions as $transaction) {

            $stmt = $this->db->prepare(
                'INSERT INTO transactions (date, check_number, description, amount) 
                VALUES (?,?,?,?)'
            );

            $stmt->execute([$transaction['date'], $transaction['check_number'], $transaction['description'], $transaction['amount']]);
        }

    }

}
