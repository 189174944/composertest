<?php

namespace Hello\Controllers;

use Illuminate\Support\Facades\DB;

class ViewsGenerateController extends Controller
{
    /**
     * 根据表结构自动生成Laravel视图
     *
     */
    public function explore()
    {
        $tableName = \request('name');
        $code = sprintf('<table>
        <tr>
        %s
        </tr>
        
        @foreach($data as $k=>$v)
        <tr>%s</tr>
        @endforeach
        
     </table>
     
     <script>
     $(document).ready(function() {
         $(".delete").click(function() {
           var id = $(this).data(\'id\');
           $.ajax({
           
           })
         })
     })
</script>
    ', $this->generateTableHeader($tableName), $this->generateTableBody($tableName));

        $allTable = $this->getAllTable();

        return view('fullstackvalley::views', compact('code', 'allTable'));
    }

    public function getInput()
    {

    }

    public function getCheckBox()
    {

    }

    public function getDeleteButton($btnName = '默认按钮', $cssClass = "btn btn-danger")
    {
        return sprintf("<td><Button class=\"%s delete\" data-id=\"\">%s</Button></td>", $cssClass, $btnName);
    }

    /**
     * 根据表结构自动生成表头
     */
    public function generateTableHeader($tableName)
    {

        $htmlCode = '';
        $arr = [];
        foreach ($this->getColumn($tableName) as $k) {
            array_push($arr, sprintf("<th>%s</th>", $k));
        };
        return implode(PHP_EOL, $arr);
    }

    public function generateTableBody($tableName)
    {

        $htmlCode = '';
        foreach ($this->getColumn($tableName) as $k) {

            $htmlCode .= sprintf("<td>
{{%s->%s}}
</td>" . PHP_EOL, '$k', $k);
        }


        $tableBody = sprintf("
%s
%s
", $htmlCode, $this->getDeleteButton());
        return $tableBody;

    }

//    获取数据表的所有列名，并且转换为一维数组
    public function getColumn($tableName): array
    {
        $headerColumn = [];
        foreach (DB::select('desc ' . $tableName) as $k) {
            array_push($headerColumn, $k->Field);
        }
        return $headerColumn;
    }

    public function getAllTable(): array
    {
        $tableNameArray = [];
        foreach (DB::select("show tables") as $k) {
            array_push($tableNameArray, $k->{'Tables_in_' . $this->getDatabaseName()});
        }
        return $tableNameArray;
    }

    public function getDatabaseName()
    {
        return DB::select("select database() as db")[0]->db;
    }
}
