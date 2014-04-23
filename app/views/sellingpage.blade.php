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




@if(Auth::check())<!--when user is logged in-->
    
  @if(Auth::user()->id==$book_copy->seller_id)<!--when user is the seller-->

  <div class = "col-md-6 rightpart"> 
    <h6 class = "sofia">You can contact buyers, edit price and change item status at here</h6>
    <hr>
    <div class = "buyfollow">
      <div class = "row">


      <div class = "col-md-7">
        <h3 class = "subtitle">Contact buyers</h3>



        {{ Form::open(array('url'=>'join_buyerlist','method'=>'post')) }}
        <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
        <input type="hidden" name="buyer_id" value=" {{ Auth::user()->id }} ">
        <input type="hidden" name="email" value=" {{ DB::table('users')->where('id', $book_copy->seller_id)->first()->email }} ">
        <input type="hidden" name="actual_buyer" value=" {{ DB::table('book_copy')->where('id', $book_copy->id)->first()->actual_buyer }} ">

        <div class = "contactleft controlgroup" style = "margin-top: 0px">
          <!--
            <span class ="info " style = "padding-left:0;text-align: left;">User who are interested in your book*</span>
            <div class ="priceinput myinput">

            @for($count=0;$count < count($buyer_list); $count++)
                @if($count%4==0)
                    @if($count!=0)
                        </div>
                    @endif
                    <div class="row">
                @endif
                <div>{{ DB::table('users')->where('id',$buyer_list[$count]->buyer_id)->first()->email }}@purdue.edu</div>
                <span>{{ $buyer_list[$count]->offer_price }}</span>
            @endfor
            </div>
          -->
          <p class="info" >
            Once you hit the select button, we will send an e-mail to let that lucky guy 
            know!
          </p>
          <div id="buyer-list">
            @if($book_copy->soldout)<!--if the book is sold-out, then display the buyer's email-->
                <table id="users" class="ui-widget-content">
                  <thead>
                    <tr class="ui-widget-header ">
                      <th>Actual buyer e-mail</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr class="ui-widget-content">
                        <td>$book_copy->actual_buyer</td>
                      </tr>
                  </tbody>
                </table>  
            @elseif<!--when the book is not sold-out, then display all the potential buyers -->
                <table id="users" class="ui-widget-content">
                  <thead>
                    <tr class="ui-widget-header ">
                      <th>Email</th>
                      <th>Offer</th>
                      <th>Confirm</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(count($buyer_list)==0)
                        <tr class="ui-widget-content">
                          <td>Nobody is buying</td>
                          <td>your book.</td> 
                          <td>Be patient!</td>
                        </tr>
                      @endif
                      @for($count=0;$count < count($buyer_list); $count++)
                        <tr class="ui-widget-content">
                          <td>{{ DB::table('users')->where('id',$buyer_list[$count]->buyer_id)->first()->email }}@purdue.edu</td>
                          <td><span>$</span>{{ $buyer_list[$count]->offer_price }}</td>
                          <td>
                            @if($book_copy->soldout)<!--do not display the button if seld-out-->
                            @else
                            {{ Form::open(array('url'=>'/soldout', 'method'=>'post')) }}
                              <button type="submit" class="btn btn-contact btn-xs">
                                <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
                                <input type="hidden" name="actual_buyer_email" value=" {{ DB::table('users')->where('id',$buyer_list[$count]->buyer_id)->first()->email }} ">
                                soldTo
                              </button>
                            {{ Form::close(); }}
                            @endif
                          </td>
                        </tr>
                      @endfor

                  </tbody>
                </table>
            @endif
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
            
            <div class="pricefield">  
              <button id="edit-price" class="btn btn-contact" style="margin-top: 10px;"><i class="icon-white icon-plus"></i>Change Price
              </button>
            </div>
          </div>  
          </form>
        </div>
        <!-- <div class ="contactright">
            <div class="controlgroup">
              <span class ="info">Offer your price to seller*</span>
                <div class ="priceinput">
                  <span class="add-on sofia">$</span>
                  <input type="text" name="amount" placeholder="-">
                </div>

            <div class="pricefield">  
              <button type="submit"class="btn btn-contact" style="margin-top: 10px;"><i class="icon-white icon-plus"></i>Contact&Buy</button>
              <div class ="info info2">*we will send your offer together your contact information to the seller. You guys will get in touch soon!
              </div>
            </div>
          </div>  
          {{ Form::close() }}
        </div> -->
          {{ Form::close() }}
      </div>

  @else<!--when user is logged in as buyer-->

  <div class = "col-md-6 rightpart"> 
    <h6 class = "sofia">You can either contact the seller to buy or add the book to your follow list</h6>
    <hr>
    <div class = "buyfollow">
      <div class = "row">


      <div class = "col-md-7" style = "height: 200px;">
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
          {{ Form::close() }}
        </div>
      </div>
  @endif



@else<!--when user is not logged in-->
  
  <div class = "col-md-6 rightpart"> 
    <h6 class = "sofia">You can either contact the seller to buy or add the book to your follow list</h6>
    <hr>
    <div class = "buyfollow">
      <div class = "row">


      <div class = "col-md-7" style = "height: 200px;">
        <h3 class = "subtitle">Contact & Buy</h3>

        
        <div class = "contactleft controlgroup">
            <span class ="info " style = "padding-left:0;text-align: left;">Write down your questions toward the item at here*</span>
            <div class ="priceinput myinput">
              <textarea type="text" name="comment" placeholder="">
              </textarea>
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
            <div class="controlgroup">
              <span class ="info">Offer your price to seller*</span>
                <div class ="priceinput">
                  <span class="add-on sofia">$</span>
                  <input type="text" name="amount" placeholder="-">
                </div>

            <div class="pricefield">  
              <button type="submit" class="btn btn-contact" style="margin-top: 10px;"><i class="icon-white icon-plus"></i>Log in to contact
              </button>
              <div class ="info info2">*we will send your offer together your contact information to the seller. You guys will get in touch soon!
              </div>
            </div>
          </div>  
        
        </div>
      </div>
@endif



    </div>
  </div>








    <div class = "buyfollow">
     <div class = "row">
      <!-- <div class = "col-md-7">
        <h3 class = subtitle>Add to Follow List</h3>
        <div class = "contactleft">
          <div class="controlgroup">
            <?php $followers = DB::table('follow_list')->where('copy_id',$book_copy->id)->get(); ?>
            <div class ="info info3">Add to your following list to catch up with this awesome book later! 
              <p>Current followers: {{ count($followers) }}</p></div>
            
          </div>
        </div>
      </div> -->

        @if(Auth::check())
          @if(Auth::user()->id==$book_copy->seller_id)<!--when user is seller-->
            <div class = "col-md-7">
              <h3 class = subtitle>Status</h3>
              <div class = "contactleft" style="margin-top:10px;">
                <div class="controlgroup">
                  <?php $followers = DB::table('follow_list')->where('copy_id',$book_copy->id)->get(); ?>
                  <div class ="info info3">
                    <p>Current followers: {{ count($followers) }}</p>
                    <p>Expire date: {{ $book_copy->expire_date }}</p>
                  </div>
                  
                </div>
              </div>
            </div>

           <div class = "col-md-5">
                @if(!$book_copy->soldout)
                  <!-- {{ Form::open(array('url'=>'/soldout', 'method'=>'post')) }}
                    <button type="submit" class="btn btn-contact" style="margin-top: 100px;">
                      <input type="hidden" name="book_copy_id" value=" {{ $book_copy->id }} ">
                      <input type="hidden" name="follower_id" value=" {{ Auth::user()->id }} ">
                      Sold Out
                    </button>
                  {{ Form::close(); }}
 -->                @else
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
            @else<!--when user is not logged in-->
              <a href="#" class="btn btn-contact" style="margin-top: 100px;">
                Log in to follow
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