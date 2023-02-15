<?php
	function get_creator_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ems");
		$creator_count = 0;
		$query = "select count(*) as creator_count from creators";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$creator_count = $row['creator_count'];
		}
		return($creator_count);
	}

	function get_user_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ems");
		$user_count = 0;
		$query = "select count(*) as user_count from users";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$user_count = $row['user_count'];
		}
		return($user_count);
	}

	function get_event_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ems");
		$event_count = 0;
		$query = "select count(*) as event_count from events";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$event_count = $row['event_count'];
		}
		return($event_count);
	}

	function get_issue_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ems");
		$issue_count = 0;
		$query = "select count(*) as issue_count from issued_events";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$issue_count = $row['issue_count'];
		}
		return($issue_count);
	}

	function get_category_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ems");
		$cat_count = 0;
		$query = "select count(*) as cat_count from category";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$cat_count = $row['cat_count'];
		}
		return($cat_count);
	}
?>