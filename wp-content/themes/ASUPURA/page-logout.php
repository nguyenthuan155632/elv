<?php
/*
Template Name: Logout
*/
session_destroy();
// API::logout();
?>

<?php get_header(); ?>
<style type="text/css">
	.logout-box-information {
	    margin: 0 auto;
	    height: 75px;
	    width: 500px;
	    background-color: #e9e7c9;
	    color: #263228;
	    text-align: center;
	    line-height: 75px;
	    border-radius: 3px;
	}
</style>
<main id="logout-page">
<div class="logout-box-information">
	ログアウトが完了しました 
</div>
</main>

<?php get_footer(); ?>
