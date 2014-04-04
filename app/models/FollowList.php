<?php

class FollowList extends Eloquent{
	protected $table = 'follow_list';
	protected $fillable = array('follower_id','copy_id');
}