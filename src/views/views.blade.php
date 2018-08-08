<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href=" {{asset('libs/highlight/styles/rainbow.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('libs/semanticui/semantic.min.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('libs/semanticui/semantic.min.js')}}"></script>
    <script src="{{asset('libs/highlight/highlight.pack.js')}}"></script>
    <style>
        div,body,html{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="ui container">
<a class="ui red label">快捷生成表单</a>
<a class="ui orange label">快捷生成vue</a>
<a class="ui yellow label">快捷生成Android四大组件</a>
<a class="ui olive label">快捷生成连表查询</a>
<a class="ui olive label">快捷生成API接口</a>
<a class="ui olive label">常用业务逻辑复用</a>


<h1>
    选择数据表：
</h1>
<div style="height:220px">

    @foreach($allTable as $k)
        <a href="{{url('fullstackvalley/views/explore?name='.$k)}}" class="ui label">{{$k}}</a>
    @endforeach
</div>
<br>
<div>
    生成代码：<span style="width: 100px;height:50px;clear: both">
    <a>增</a>
    <a>删</a>
    <a>改</a>
    <a>查</a>
</span>
</div>



<div class="ui top attached tabular menu">
    <a class="item active" data-tab="first">{{request('name').'.blade.php'}}</a>
    <a class="item" data-tab="second">{{request('name').'Model.php'}}</a>
    <a class="item" data-tab="third">{{request('name').'.blade.php'}}</a>
</div>
<div class="ui bottom attached tab segment active" data-tab="first">
    <div>
    <pre>
    <code>
        {{  $code }}
    </code>
    </pre>
    </div>
</div>
<div class="ui bottom attached tab segment" data-tab="second">
    Second
</div>
<div class="ui bottom attached tab segment" data-tab="third">
    Third
</div>


<script>
    $(document).ready(function () {
        $('.menu .item').tab();

        $('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
    });
//    不付费，5次以后自动弹出广告
//     setTimeout(function () {
//         alert("***项目外包，0定金，先做项目，后收费。")
//         alert("开通会员免除所有广告，每月送3000次接口请求!")
//     },5000)
</script>
</body>
</html>
