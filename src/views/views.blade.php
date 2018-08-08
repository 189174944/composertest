<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href=" {{asset('libs/highlight/styles/rainbow.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('libs/highlight/highlight.pack.js')}}"></script>
    <style>
        div,body,html{
            margin: 0;
            padding: 0;
        }
        .hljs {
            font-size: 1.1rem;
        }

        .link {
            text-decoration: none;
            display: block;
            line-height: 30px;
            min-width: 100px;
            text-align: center;
            height: 30px;
            background-color: green;
            float: left;
            clear: right;
            margin: 2px;
            color: white;
        }
    </style>
</head>
<body>
<h1>
    选择数据表：
</h1>
<div style="height:200px">

    @foreach($allTable as $k)
        <a href="{{url('fullstackvalley/views/explore?name='.$k)}}" class="link">{{$k}}</a>
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

<div>
    <pre>
    <code>
        {{  $code }}
    </code>
    </pre>
</div>
<script>
    $(document).ready(function () {
        $('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>
</body>
</html>
