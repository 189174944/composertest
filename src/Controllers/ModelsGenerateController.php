<?php

namespace Hello\Controllers;

use Illuminate\Support\Facades\DB;

class ModelsGenerateController extends Controller
{
    public function index()
    {
        $tableName = \request('name');
        $result = DB::table("information_schema.COLUMNS")->where("table_name", $tableName)->select('COLUMN_NAME')->get();
        $arr = [];
        foreach ($result as $k) {
            $x = &$k->COLUMN_NAME;
            array_push($arr, '"' . $x . '"');
        }

        $fillable = implode(',', array_values(array_unique($arr)));

        $code = sprintf('

    protected $table=\'%s\';
    protected $fillable =[%s]
    ;', $tableName, $fillable);

        dd($code);

//用wordpress用的那个的高亮代码插件
//        echo "Hello World!";
//        return view('fullstackvalley::index');
    }

    public function explore()
    {
        return view('fullstackvalley::code');
    }
}
