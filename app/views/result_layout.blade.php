@extends('base')

@section('base_content')
 <div class=container>
 <div class="row">
  <div class="col-md-2">
	<aside class=checkboxding>
		<p class=checkboxcolording>New Release:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book1
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book2
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book3
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book4
				</label>
				</div>
			</div>
			
			<p class=checkboxcolording>Math:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book1
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book2
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book3
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book4
				</label>
				</div>
			</div>
			
			<p class=checkboxcolording>Phys:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book1
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book2
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book3
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book4
				</label>
				</div>
			</div>
	</aside>
  </div>
  
  <div class="col-md-10">
  <div class=mainsectionding>
  <h1 class=h1ding>Search Result: </h1>
	<section>

		@yield('results')
		
	</section>
	</div>
	<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-6">
	<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
</div>
</div>
  </div>
</div>
</div>

<div class="row">
	<footer class=footerding>
		Copyright: Dingzhe Li-Zorak!
	</footer>
</div>


</body>
</html>
@stop