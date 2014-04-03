<?php

class Book extends Eloquent{
	protected $table = 'books';
	protected $fillable = array('title','author','isbn','publisher','edition','course_id','course_number','pic_url');
}