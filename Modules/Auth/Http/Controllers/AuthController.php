<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Resources\AccessTokenResource;
use Modules\Auth\Http\Resources\OperatorResource;
use Modules\Auth\Interfaces\OperatorRepositoryInterface;

class AuthController extends Controller
{
    public function __construct(
        protected OperatorRepositoryInterface $operatorRepository
    )
    {
    }

    public function login(LoginRequest $request): object
    {
        $operator = $this->operatorRepository->findByInternalCode($request->internal_code);
        if ($operator) {
            if (Hash::check($request->password, $operator->password)) {
                if ($operator->status == 'suspended') {
                    abort(401, 'Operator is suspended.');
                }
                if ($operator->status != 'active') {
                    abort(401, 'Operator is not active.');
                }

                $accessToken = $operator->createToken($request->ip())->plainTextToken;
                return response()->success(AccessTokenResource::make($accessToken));
            }
        }
        abort(401, 'The internal code or password is wrong.');
    }

    public function currentOperator(Request $request): object
    {
        $operator = $request->user();
        return response()->success(OperatorResource::make($operator));
    }

    public function logout(Request $request): object
    {
        $request->user()->tokens()->delete();
        return response()->justMessage('Logged out successfully.');
    }
}
