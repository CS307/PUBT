<?php

class BookCopy extends Eloquent{
	protected $table = 'book_copys';
	protected $fillable = array('book_id','price','seller_id','condition','detail','expire_date');
}