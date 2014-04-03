<html>
<body>
@foreach($books as $book)
<p>id: 			{{ $book->id }}</p>
<p>title:		{{ $book->title }}</p>
<p>author:		{{ $book->author }}</p>
<p>isbn:		{{ $book->isbn }}</p>
<p>publisher:	{{ $book->publisher }}</p>
<p>course_id:	{{ $book->course_id }}</p>
<p>course_num:	{{ $book->course_number }}</p>
<p>pic_URL：		{{ $book->pic_url }}</p>
<br>
@endforeach
</body>
</html>