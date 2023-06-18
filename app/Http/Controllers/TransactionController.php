<?php

namespace App\Http\Controllers;

use App\BaseResponse\BaseResponse;
use App\Models\Transaction;
use App\Service\TransactionService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class TransactionController extends Controller
{
    use ApiResponse;

    public TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Display a listing of the resource.
     * @throws \HttpException
     */
    public function index()
    {
        $data = $this->transactionService->getAllTransactions();
        $response = BaseResponse::response(ResponseAlias::HTTP_OK, "Success", $data);
        return response($response, ResponseAlias::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->transactionService->createTransaction($request);
        $response = BaseResponse::response(ResponseAlias::HTTP_OK, "Success", $data);

        return response($response, ResponseAlias::HTTP_OK);

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {

        $data = $this->transactionService->getTransactionById($transaction->id);
        $response = BaseResponse::response(ResponseAlias::HTTP_OK, "Success", $data);

        return response($response, ResponseAlias::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $this->transactionService->updateTransaction($request, $id);
        $response = BaseResponse::response(ResponseAlias::HTTP_OK, "Success", $data);

        return response($response, ResponseAlias::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->transactionService->deleteTransaction($id);
        return response([], ResponseAlias::HTTP_ACCEPTED);
    }

    public function createTransaction(Request $request, String $requestId)
    {
        $data = $this->transactionService->createTransactionWithLink($request, $requestId);

        return $this->successResponse(
            Response::$statusTexts[201],
            "Success",
            $data,
            ResponseAlias::HTTP_CREATED
        );
    }
}
