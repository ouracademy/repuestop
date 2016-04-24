<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;


class AccountController extends Controller {

    
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('AccessPrivate/order/create');
    }

    public function index() {
        return view('AccessPrivate/accounts/index');
    }

    public function show($id) {

        return view('AccessPrivate/order/show')->with('id',$id);
    }


}
