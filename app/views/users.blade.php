<html>
<body>
@foreach($books as $book)
<p>{{ $book->email }}</p>
<p>{{ $book->password }}</p>
<p>{{ $book->cell }}</p>
@endforeach
</body>
</html>