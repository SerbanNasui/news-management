<h2>Your comment was approved!</h2>

<h4>{{ $comment->title }}</h4>
<br>
<p>{{ $comment->body }}</p>
<br>

To access article, please click the link below:
<br>
<a href="{{ route('display.article', $comment->article_id) }}">{{ $comment->article->title }}</a>
