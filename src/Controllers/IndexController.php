<?php

namespace Hello\Controllers;


class IndexController
{
    public function index(){
        echo "Hello World!";
        return view('fullstackvalley::index');
    }
}
