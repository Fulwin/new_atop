<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Post;
use App\Models\Level;

class CommonController extends Controller
{
    public function departments()
    {
        return Department::orderBy('name')->get();
    }

    public function posts()
    {
        return Post::orderBy('name')->get();
    }

    public function levels()
    {
        return Level::get();
    }
}
