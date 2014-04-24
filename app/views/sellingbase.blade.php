@extends('base')

@section('base_link')
<link href="{{asset('css/sellingpage.css')}}" rel="stylesheet">
@stop


@section('base_content')
<div class="container">
  <div class="row">
    <div class = "col-md-5 leftpart"> 
     <section>

		<h2>Title: {{ DB::table('books')->where('id',$book_copy->book_id)->first()->title }}</h2>
      <h4>corresponding course:
        <span class="label label-info">{{ DB::table('books')->where('id',$book_copy->book_id)->first()->subject.' '.DB::table('books')->where('id',$book_copy->book_id)->first()->course_id }}</span>
      </h4>
      <div class = "row">
        <div class = "col-md-7">
          <a href="#" class="thumbnail">

          @if(DB::table('books')->where('id',$book_copy->book_id)->first()->pic_url == "NO_URL")
            <img data-src="holder.js/100%x180" alt="Sorry, No Cover" src="http://www.slugbooks.com/images/notavail2.png">
          @else
            <img data-src="holder.js/100%x180" alt="Sorry, No Cover" src="{{ DB::table('books')->where('id',$book_copy->book_id)->first()->pic_url }}">
          @endif
          </a>
        
        <h3 class="heading bold">Item details:</h3>
        </div>
      <table id="table_item">
        <tr>
          <td class="name">Author: </td>
          <td class="value">{{ DB::table('books')->where('id',$book_copy->book_id)->first()->author }}</td>
        </tr>
        <tr>
          <td class="name">ISBN: </td>
          <td class="value">{{ DB::table('books')->where('id',$book_copy->book_id)->first()->isbn }}</td>
        </tr>
        <tr>
          <td class="name">Condition: </td>
          <td class="value">{{ $book_copy->condition }}</td>
        </tr>
        <tr>
          <td class="name">Owner: </td>
          <td class="value">{{ DB::table('users')->where('id',$book_copy->seller_id)->first()->email }}</td>
        </tr>
        <tr>
          <td class="name">Description: </td>
          <td class="value">{{ $book_copy->detail }}</td>
        </tr>
      </table>
      </div>
		
	</section>
    </div>

 @stop
    @yield('selling_content')

  

</div>
</div>
</div>
</body>
</html>