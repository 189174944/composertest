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
    }

    public function explore()
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
        
        class %s extends Model 
        {
            protected $table=%s;
            protected $fillable =[%s];
        }
    ', $tableName, $tableName, $fillable);
        return view('fullstackvalley::code', compact('code'));
    }
}
