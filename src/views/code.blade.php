<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href=" {{asset('libs/highlight/styles/default.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('libs/highlight/highlight.pack.js')}}"></script>
</head>
<body>

<pre>
    <code class="php">
        {{  $code }}
    </code>
</pre>
<script>
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>
</body>
</html>
