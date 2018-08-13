<?php

namespace Hello\Controllers;

use Illuminate\Support\Facades\DB;

class ModelsGenerateController extends Controller
{
    /**
     * 自动生成模型类别
     *
     */
    public function explore()
    {
        $tableName = \request('name') or 'Undefined';
        $result = DB::table("information_schema.COLUMNS")->where("table_name", $tableName)->select('COLUMN_NAME')->get();
        $arr = [];
        foreach ($result as $k) {
            $x = &$k->COLUMN_NAME;
            array_push($arr, '"' . $x . '"');
        }
        $fillable = implode(',', array_values(array_unique($arr)));
        $code = sprintf('
        <?php

        namespace App\Models;
        use Illuminate\Database\Eloquent\Model;
        
        class %s extends Model 
        {
            protected $table=\'%s\';
            protected $fillable =[%s];
            public $timestamps = false;
            
            /*
             *添加数据
             */
            public function add($data){
                $result = $this->fill($data);
                if($result->save){
                    
                }else{
                
                }
            }
            
            /*
             *
             *删除数据
             *
             */
            public function delete($id){
                $result = $this->where(\'id\',$id)->delete();
                if($result){
                    
                }else{
                
                }
            }
            
            /*
             *
             *删除数据
             *
             */
            public function Other($id)
            {
                $result = $this->where(\'id\',$id)->delete();
                if($result){
                    
                }else{
                
                }
            }
            
            public function page()
            {
                $this->paginate()
            }
            
        }
    ', $tableName, $tableName, $fillable);

        $artisan = 'php artisan make:model Models\\'.$tableName;
        return view('fullstackvalley::code', compact('code','artisan'));
    }
}
