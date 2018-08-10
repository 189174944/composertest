<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href=" {{asset('libs/highlight/styles/default.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('libs/semanticui/semantic.min.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('libs/semanticui/semantic.min.js')}}"></script>
    <script src="{{asset('libs/highlight/highlight.pack.js')}}"></script>
    <style>
        div, body, html {
            margin: 0;
            padding: 0;
        }

        .ControPanel .ui.label {
            width: 100%;
        }
    </style>
</head>
<body class="ui container">
<div class="ui inverted menu">
    <div class="header item">AutoProgrammer</div>
    <div class="active item">首页</div>
    <a class="item">开发</a>
    <a class="item">教程</a>
    <a class="item">社区</a>
    <a class="item">充值</a>
    <div class="ui dropdown item" tabindex="0">
        常用插件
        <i class="dropdown icon"></i>
        <div class="menu" tabindex="-1">
            <div class="item">Action</div>
            <div class="item">Another Action</div>
            <div class="item">Something else here</div>
            <div class="divider"></div>
            <div class="item">Separated Link</div>
            <div class="divider"></div>
            <div class="item">One more separated link</div>
        </div>
    </div>
    <a class="item">个人/企业中心</a>
    <div class="right menu">
        <div class="item">
            <div class="ui transparent inverted icon input">
                <i class="search icon"></i>
                <input type="text" placeholder="Search">
            </div>
        </div>
        <a class="item">Link</a>
    </div>
</div>
<div>
    <img src="{{asset('ads/ads.png')}}" style="width: 100%">
</div>


<a class="ui red label">快捷生成表单</a>
<a class="ui orange label">快捷生成vue</a>
<a class="ui yellow label">快捷生成Android四大组件</a>
<a class="ui olive label">快捷生成连表查询</a>
<a class="ui olive label">快捷生成API接口</a>
<a class="ui olive label">常用业务逻辑复用</a>
<a class="ui olive label">常用业务逻辑模版</a>


<h1>
    选择数据表：
</h1>

<div class="ui selection dropdown db_tables">
    <input type="hidden" name="gender">
    <i class="dropdown icon"></i>
    <div class="default text">选择数据表</div>
    <div class="menu">
        @foreach($allTable as $k)
            <div class="item" data-value="{{strtolower($k)}}">
                <i class="icon database"></i>
                {{strtolower($k)}}
            </div>
        @endforeach
    </div>
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
    <code contentEditable="true">
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


<div style="width: 300px;height: 100%;border: 1px solid black;background-color: white;position: fixed;bottom:0;right: 0"
     class="ControPanel">
    <div class="ui top attached tabular menu">
        <a class="item active" data-tab="file">
            <i class="icon file"></i>
        </a>
        <a class="item" data-tab="api">Interface</a>
        <a class="item" data-tab="method">{}</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="file">
        <div class="ui list">
            <div class="item">
                <a class="ui orange label">
                    <i class="icon file"></i>
                    Blade
                </a>
            </div>
            <div class="item">
                <a class="ui red label">
                    <i class="icon file"></i>
                    Model
                </a>
            </div>
            <div class="item">
                <a class="ui yellow label">
                    <i class="icon file"></i>
                    Controller
                </a>
            </div>
            <div class="item">
                <a class="ui green label">
                    <i class="icon file"></i>
                    View
                </a>
            </div>
        </div>
    </div>
    <div class="ui bottom attached tab segment" data-tab="api">
        <div class="ui list">
            <div class="item">
                <a class="ui orange label">JSON统一格式</a>
            </div>
            <div class="item">
                <a class="ui red label">.php</a>
            </div>
            <div class="item">
                <a class="ui yellow label">Yellow</a>
            </div>
            <div class="item">
                <a class="ui green label">Yellow</a>
            </div>
        </div>
    </div>
    <div class="ui bottom attached tab segment" data-tab="method">
        <div class="ui list">
            <div class="item">
                <a class="ui orange label">foreach</a>
            </div>
            <div class="item">
                <a class="ui red label">2131</a>
            </div>
            <div class="item">
                <a class="ui yellow label">Yellow</a>
            </div>
            <div class="item">
                <a class="ui green label">Yellow</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.menu .item').tab();

        $('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
        $(".db_tables").dropdown({
            action: function (text, value) {
                window.location.href = "{{url('fullstackvalley/views/explore?name=')}}" + value
            }
        })
    });
    //    不付费，5次以后自动弹出广告
    //     setTimeout(function () {
    //         alert("***项目外包，0定金，先做项目，后收费。")
    //         alert("开通会员免除所有广告，每月送3000次接口请求!")
    //     },5000)
</script>
</body>
</html>
