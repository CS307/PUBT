<html>
<body>
@foreach($users as $user)
<p>{{ $user->email }}</p>
<p>{{ $user->password }}</p>
<p>{{ $book->cell }}</p>
@endforeach
</body>
</html>