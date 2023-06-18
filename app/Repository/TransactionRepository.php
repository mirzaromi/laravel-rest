<?php

namespace App\Repository;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface TransactionRepository
{
    public function getAllTransaction(): Collection;

    public function getTransactionById(int $id): Transaction;

    public function createTransaction(Request $request): Transaction;

    public function updateTransaction(Request $request, int $id): Transaction;

    public function deleteTransaction(int $id);
}

