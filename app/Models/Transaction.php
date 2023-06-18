<?php

namespace App\Models;

use App\Exceptions\NotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function getTransactionByIdOrFail(Builder $query)
    {
        $result = $query->first();
        if (!$result) {
            throw new NotFoundException("Not Found!");
        }

        return $result;
    }
}
