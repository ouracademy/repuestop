<?php namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;

class OrderController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('AccessPrivate/order/create');
    }

    public function index() {
        return view('AccessPrivate/order/index');
    }

    public function show($id) {

        return view('AccessPrivate/order/show')->with('id',$id);
    }

}
