<html>
<body>
	<h1>Book_Copy</h1>
@foreach($book_copys as $bookcopy)
<p>id: {{ $bookcopy->id }}</p>
<p>book_id: {{ $bookcopy->book_id }}</p>
<p>price: {{ $bookcopy->price }}</p>
<p>seller_id: {{ $bookcopy->seller_id }}</p>
<p>condition: {{ $bookcopy->condition }}</p>
<p>detail: {{ $bookcopy->detail }}</p>
<p>expire_date: {{ $bookcopy->expire_date }}</p>
<br>
@endforeach
</body>
</html>