<?php

class Book extends Eloquent{
	protected $table = 'books';
	protected $fillable = array('title','author','course_id');
}