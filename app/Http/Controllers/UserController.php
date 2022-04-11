<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'user' => $this->UserModel->alldata(),
        ];
        return view('v_user', $data);
    }
}
