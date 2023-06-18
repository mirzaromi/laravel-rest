<?php

namespace App\Service\Implementation;

use App\Models\Transaction;
use App\Repository\TransactionRepository;
use App\Service\TransactionService;
use App\Utils\DateUtils;
use App\Utils\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;


class TransactionServiceImplementation implements TransactionService
{
    public TransactionRepository $transactionRepository;
    public Signature $signature;
    public DateUtils $dateUtils;

    public function __construct(
        TransactionRepository $transactionRepository,
        Signature $signature,
        DateUtils $dateUtils
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->signature = $signature;
        $this->dateUtils = $dateUtils;
    }

    public function getAllTransactions(): Collection
    {
        return $this->transactionRepository->getAllTransaction();
    }

    public function getTransactionById(int $id): Transaction
    {
        return $this->transactionRepository->getTransactionById($id);
    }

    public function createTransaction(Request $request): Transaction
    {
        return $this->transactionRepository->createTransaction($request);
    }

    public function updateTransaction(Request $request, int $id): Transaction
    {
        return $this->transactionRepository->updateTransaction($request, $id);
    }

    public function deleteTransaction(int $id)
    {
        $this->transactionRepository->deleteTransaction($id);
    }

    public function createTransactionWithLink(Request $request, String $requestId): String
    {
        $timestamp = $this->dateUtils->generateDateNow();

        $signatureRequest = $this->signature->generateSignature(
            $requestId,
            $request->request->all(),
            $timestamp
        );

        $response = Http::withHeaders([
            "Client-Id" => "BRN-0288-1680445183182",
            "Request-Id" => $requestId,
            "Request-Timestamp" => $timestamp,
            "Signature" => $signatureRequest
        ])->post("https://api-sandbox.doku.com/checkout/v1/payment", $request->request->all());
        $json = $response->json();

        return $json["response"]["payment"]["url"];

    }
}
