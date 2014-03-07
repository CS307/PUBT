<html>
<body>
@foreach($books as $book)
<p>{{ $book->id }}</p>
<p>{{ $book->title }}</p>
<p>{{ $book->author }}</p>
<p>{{ $book->course_id }}</p>
@endforeach
</body>
</html>