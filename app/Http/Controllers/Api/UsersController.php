<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;

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
}
