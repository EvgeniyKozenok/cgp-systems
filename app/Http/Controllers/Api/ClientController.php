<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function companyClientList($companyId): JsonResponse
    {
        $query = User::whereHas('companies', function($q) use ($companyId) {
            $q->where('id', $companyId);
        });
        return responder()->success($query->paginate($this->getPaginate()))->respond();
    }

    public function clientCompanyList($clientId): JsonResponse
    {
        return responder()->success(User::find($clientId)->companies())->respond();
    }
}
