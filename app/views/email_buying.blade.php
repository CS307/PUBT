<h1>Hi, {{$username}}!</h1>
 
<h2>Information of buyer:</h2>
<p>Email: {{ $buyer->email }}</p>
<p>Cell: {{ $buyer->cell }}</p>
<h2>Information of book:</h2>
<p>Title: {{ $book->title }}</p>
<p>Author: {{ $book->author }}</p>
<p>Edition: {{ $book->edition }}</p>
<p>Condition: {{ $book_copy->condition }}</p>
<p>Listed Price: {{ $book_copy->price }}</p>
<p>Detail: {{ $book_copy->detail }}</p>
<h2>Information from buyer:</h2>
<p>Offering price:{{ $offer_price }}</p>
<p>Comment: {{ $comment }}</p>