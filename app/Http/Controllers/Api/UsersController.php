<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;  
use Tymon\JWTAuth\Exceptions\JWTException;  
use Tymon\JWTAuth\Exceptions\TokenExpiredException;  
use Tymon\JWTAuth\Exceptions\TokenInvalidException; 

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with(['posts', 'level', 'department'])
                    ->where(function($query) use($request) {
                        if ($request->search) {
                            $query->where('name', 'like', '%' . $request->search . '%');
                        }
                    })->orderBy('created_at', 'desc')
                    ->orderBy('id', 'desc')
                    ->paginate();
        return $users;
    }

    public function usersList()
    {
        return User::get();
    }

    /**
     * 根据 request 中的 Authorization 获取登录用户的数据
     *
     * @return void
     */
    public function profile()  
    {  
        try {  
            if (!$user = JWTAuth::parseToken()->authenticate()) {  
                return response()->json(['user_not_found'], 404);  
            }  
        } catch (TokenExpiredException $e) {  
            return response()->json(['token_expired'], $e->getStatusCode());  
        } catch (TokenInvalidException $e) {  
            return response()->json(['token_invalid'], $e->getStatusCode());  
        } catch (JWTException $e) {  
            return response()->json(['token_absent'], $e->getStatusCode());  
        }  
        // the token is valid and we have found the user via the sub claim  
        return response()->json($user);  
    }  
}
