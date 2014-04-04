<h1>Hi, {{$username}}!</h1>
 
<p> The book you followed is sold out</P

<h2>Detailed information of book:</h2>
<p>Title: {{ $book->title }}</p>
<p>Author: {{ $book->author }}</p>
<p>Edition: {{ $book->edition }}</p>
<p>Owner: {{ $seller }}</p>
<p>Condition: {{ $book_copy->condition }}</p>
<p>Listed Price: {{ $book_copy->price }}</p>
<p>Detail: {{ $book_copy->detail }}</p>
