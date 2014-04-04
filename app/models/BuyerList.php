<?php

class BuyerList extends Eloquent{
	protected $table = 'buyer_list';
	protected $fillable = array('buyer_id','copy_id');
}