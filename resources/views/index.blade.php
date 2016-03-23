<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$xml->channel->title}}</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        function generate() {
            url = $('#url').val();
            window.location = '/?url=' + url;
        }
    </script>
</head>
<body>
<div class="container">
    <div style="text-align:center;">
        <label>Feed URL:</label>
        <input type="text" id="url">
        <button onclick="generate()">Generate</button>
    </div>
    @for($i=0;$i<count($xml->channel->item);$i++)
    <article>
        <img src="img/rss-feed.jpg" alt="Some image">
        <div class="content">
            <a href="{{$xml->channel->item[$i]->link}}"><h1>{{$xml->channel->item[$i]->title}}</h1></a>
            <p>{{$xml->channel->item[$i]->description}} </p>
        </div>
    </article>
    @endfor
</div>
</body>
</html>