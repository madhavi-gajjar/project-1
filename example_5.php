<?php
	class Post{
		public $title;
		public $published;
		
		public function __construct($title, $published){
			$this->title= $title;
			$this->published= $published;
			
		}
		
	}
	$posts= [
		new Post("first post", true),
		new Post("second post", true),
		new Post("third post", true),
		new Post("fourth post", true),
		new Post("fifth post", false)
		
	];	
	$unpublished= array_filter($posts, function($check_unpub){
		return !$check_unpub->published;
	});
	
	var_dump($unpublished);
?>