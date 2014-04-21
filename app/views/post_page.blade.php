@extends('base')

@section('base_link')
<link href="{{asset('css/sellingpage.css')}}" rel="stylesheet">
@stop


@section('base_content')
<div class="container">
  <div class="row">
    <div class = "col-md-5 leftpart"> 
     <section>

		<h2>Title: {{ $book->title }}</h2>
      <h4>corresponding course:
        <span class="label label-info">{{$book->subject.' '.$book->course_id}}</span>
      </h4>
      <div class = "row">
        <div class = "col-md-7">
           <a href="#" class="thumbnail">
           @if($book->pic_url == "NO_URL" || $book->pic_url == "")
            <img data-src="holder.js/100%x180" alt="Sorry, No Cover" src="http://www.slugbooks.com/images/notavail2.png">
           @else
            <img data-src="holder.js/100%x180" alt="Sorry, No Cover" src="{{$book->pic_url}}"> 
           @endif
           </a>
        
        <h3 class="heading bold">Item details:</h3>
        </div>
      <table id="table_item">
        <tr>
          <td class="name">Author: </td>
          <td class="value">{{ $book->author }}</td>
        </tr>
        <tr>
          <td class="name">ISBN: </td>
          <td class="value">{{ $book->isbn }}</td>
        </tr>
      </table>
      </div>
		
	</section>
    </div>



  <div class = "col-md-6 rightpart" style ="margin-top: 20px;"> 
    <h6 class = "sofia">You can either contact the seller to buy or add the book to your follow list</h6>
    <hr>

    <div class = "buyfollow">
     <div class = "row">
      <div class = "col-md-12">
        <h3 class = "subtitle">Post Book</h3>
        <div class = "contactleft" style="margin-top: 0px;">
          <div class="controlgroup">

            <table id="table_item">
              {{ Form::open(array('url'=>'postBook','method'=>'post')) }}
              <tr>
              <td class="name">List Price: </td>
              <td class="value">
                  <div class ="priceinput">
                   <span class="add-on sofia">$</span>
                    <input name="price" type="text" placeholder="30.00" style = "line-height: 25px; vertical-align: center;">
                  </div>
              </td>
              </tr>
        
              <tr>
              <td class="name">Condition: </td>
              <td class="value">
               <select name="condition">
                  <option value="New With Tags">New With Tags</option>
                  <option value="Like New">Like New</option>
                  <option value="Good Condition">Good Condition</option>
                  <option value="Fair Condition">Fair Condition</option>
               </select>

              </td>
              </tr>

              <tr>
              <td class="name">Description: </td>
              <td class="value">
                  <div class ="priceinput myinput">
            <textarea name="detail" type="text" placeholder="Why you sell it? Detail of the condition etc.."></textarea>
            </div>
              </td>
              </tr>

              <input type="hidden" name="book_id" value=" {{ $book->id }} ">
              </table>
            
          </div>
        </div>
        <button type="submit" id="btnPostBook" class="btn btn-contact" style="margin-top: 10px;"><i class="icon-white icon-plus"></i>Post Book
        </button>

        			{{ Form::close() }}

      </div>
     </div>
    </div>
<!--
    <div class = "buyfollow">
     <div class = "row">
      <h3 class = "subtitle" style = "padding-left: 14px;">Similar Items</h3>
     </div>
    </div>
  </div>
-->

</div>
</div>
</div>
</body>
</html>
@stop