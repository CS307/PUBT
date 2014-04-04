@extends('postpage')


@section('postbookinfo')
<h2>Title: {{ DB::table('books')->where('id',$book_copy->book_id)->first()->title }}</h2>
      <h4>corresponding course:
        <span class="label label-info">{{$book_copy->course_id}}</span>
      </h4>
      <div class = "row">
        <div class = "col-md-7">
           <a href="#" class="thumbnail">
           <img data-src="holder.js/100%x180" alt="sampleimg.jpg" src="sampleimg.jpg">
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
      </table>
      </div>

@stop