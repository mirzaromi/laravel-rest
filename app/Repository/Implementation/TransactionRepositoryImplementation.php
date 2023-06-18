<?php

namespace App\Repository\Implementation;

use App\Exceptions\NotFoundException;
use App\Models\Transaction;
use App\Repository\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TransactionRepositoryImplementation implements TransactionRepository
{
    public function getAllTransaction(): Collection
    {
        return Transaction::all();
    }

    public function getTransactionById(int $id): Transaction
    {
        $transaction = Transaction::find($id)->getTransactionByIdOrFail();

        return $transaction;
    }

    public function createTransaction(Request $request): Transaction
    {
        $transaction = Transaction::create([
            'amount' => $request->amount,
            'invoice_number' => $request->invoiceNumber
        ]);

        return $transaction;

    }

    public function updateTransaction(Request $request, int $id): Transaction
    {
        $transaction = Transaction::where('id', $id)->first();

        $transaction->amount = $request->amount;
        $transaction->invoice_number = $request->invoiceNumber;
        $transaction->save();

        return $transaction;
    }

    public function deleteTransaction(int $id)
    {
        Transaction::where('id', $id)->delete();
    }
}
