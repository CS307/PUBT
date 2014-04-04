@extends('base')

@section('base_link')
<link href="{{asset('css/sellingpage.css')}}" rel="stylesheet">
@stop


@section('base_content')
<div class="container">
  <div class="row">
    <div class = "col-md-5 leftpart"> 
     <section>

		@yield('bookcopyinfo')
		
	</section>
    </div>


  <div class = "col-md-6 rightpart"> 
    <h6 class = "sofia">You can either contact the seller to buy or add the book to your follow list</h6>
    <hr>
    <div class = "buyfollow">
      <div class = "row">
      <div class = "col-md-7">
        <h3 class = "subtitle">Contact & Buy</h3>
        
        <div class = "contactleft">
          <div class="controlgroup">
            <span class ="info " style = "padding-left:0;text-align: left;">Write down your questions toward the item at here*</span>
            <div class ="priceinput myinput">
            <textarea type="text" name="amount" placeholder="Hi, seller:"></textarea>
            </div>
          </div>
        </div>
      </div>


      <div class = "col-md-5">
        <div class="listprice">
          $20.00
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
          <a href="#" class="btn btn-contact" style="margin-top: 10px;"><i class="icon-white icon-plus"></i>Contact&Buy
          </a>
          <div class ="info info2">*we will send your offer together your contact information to the seller. You guys will get in touch soon!
          </div>
          </div>
          </div>  
          </form>
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
            <div class ="info info3">Add to your following list to catch up with this awesome book later!</div>
            
          </div>
        </div>
      </div>

      <div class = "col-md-5">
        <a href="#" class="btn btn-contact" style="margin-top: 100px;"><i class="icon-white icon-plus"></i>Add Follow
          </a>
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