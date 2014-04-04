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
           <img data-src="holder.js/100%x180" alt="sampleimg.jpg" src="{{ DB::table('books')->where('id',$book_copy->book_id)->first()->pic_url }}">
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


  <div class = "col-md-6 rightpart"> 
    <h6 class = "sofia">You can either contact the seller to buy or add the book to your follow list</h6>
    <hr>
    <div class = "buyfollow">
      <div class = "row">
      <div class = "col-md-7">
        <h3 class = "subtitle">Contact & Buy</h3>
        {{ Form::open(array('url'=>'join_buyerlist','method'=>'post')) }}
        <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
        <input type="hidden" name="buyer_id" value=" {{ Auth::user()->id }} ">
        <input type="hidden" name="email" value=" {{ DB::table('users')->where('id', $book_copy->seller_id)->first()->email }} ">
        <div class = "contactleft">
          <div class="controlgroup">
            <span class ="info " style = "padding-left:0;text-align: left;">Write down your questions toward the item at here*</span>
            <div class ="priceinput myinput">
              <textarea type="text" name="comment" placeholder="">
              </textarea>
            </div>
          </div>
        </div>
      </div>


      <div class = "col-md-5">
        <div class="listprice">
          @if(!$book_copy->soldout)
            ${{ $book_copy->price }}
          @else
            Sold Out
          @endif
        </div>
        <div class ="contactright">
          <form action="#" method="post" class="priceform" autocomplete="off">
          <div class="controlgroup">
            <span class ="info">Offer your price to seller*</span>
            <div class ="priceinput">
            <span class="add-on sofia">$</span>
            <input type="text" name="amount" placeholder="-">
            </div>

          <div class="pricefield">  
            <button type="submit" class="btn btn-contact" style="margin-top: 10px;"><i class="icon-white icon-plus"></i>Contact&Buy
            </button>
          <div class ="info info2">*we will send your offer together your contact information to the seller. You guys will get in touch soon!
          </div>
          </div>
          </div>  
          </form>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

    <div class = "buyfollow">
     <div class = "row">
      <div class = "col-md-7">
        <h3 class = subtitle>Add to Follow List</h3>
        <div class = "contactleft">
          <div class="controlgroup">
            <?php $followers = DB::table('follow_list')->where('copy_id',$book_copy->id)->get(); ?>
            <div class ="info info3">Add to your following list to catch up with this awesome book later! 
              <p>Current followers: {{ count($followers) }}</p></div>
            
          </div>
        </div>
      </div>

      <div class = "col-md-5">
        @if(Auth::check())
          @if(Auth::user()->id==$book_copy->seller_id)
            @if(!$book_copy->soldout)
              {{ Form::open(array('url'=>'/soldout', 'method'=>'post')) }}
                <button type="submit" class="btn btn-contact" style="margin-top: 100px;">
                  <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
                  <input type="hidden" name="follower_id" value=" {{ Auth::user()->id }} ">
                  Sold Out
                </button>
              {{ Form::close(); }}
            @else
              {{ Form::open(array('url'=>'/recover', 'method'=>'post')) }}
                <button type="submit" class="btn btn-contact" style="margin-top: 100px;">
                  <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
                  <input type="hidden" name="follower_id" value=" {{ Auth::user()->id }} ">
                  Recover
                </button>
              {{ Form::close(); }}
            @endif
          @elseif(!DB::table('follow_list')->where('follower_id',Auth::user()->id)->where('copy_id', $book_copy->id)->first())
            {{ Form::open(array('url'=>'/follow/book_copy_id='.$book_copy->id, 'method'=>'post')) }}
            <button type="submit" class="btn btn-contact" style="margin-top: 100px;">
              <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
              <input type="hidden" name="follower_id" value=" {{ Auth::user()->id }} ">
              Add Follow
            </button>
            {{ Form::close(); }}
          @else
            {{ Form::open(array('url'=>'/unfollow/book_copy_id='.$book_copy->id, 'method'=>'post')) }}
            <button type="submit" class="btn btn-contact" style="margin-top: 100px;">
              <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
              <input type="hidden" name="follower_id" value=" {{ Auth::user()->id }} ">
              Unfollow
            </button>
            {{ Form::close(); }}
          @endif
        @else
          <a href="#" class="btn btn-contact" style="margin-top: 100px;">
            Log in for following
          </a>
        @endif
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