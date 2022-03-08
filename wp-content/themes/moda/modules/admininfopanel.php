<!--CleverSnags: start-->

<!--Copy paste the following into your website header-->

<script type="text/javascript">

function openFeedbackForm(){

	var $docurl = document.location.href;	

	myWindow=window.open('http://app.cleversnags.com/trelloform.php?client=moda&url=' + $docurl,'','width=420,height=600');

	myWindow.focus();		

}

</script>

<style>

#admintab{
	position: fixed;
	top: 30px;
	left: 0;
	z-index: 10000;
	display: scroll;
	height: 25px;
	width: 200px;
	padding: 3px;
	font-size: 12px;	  
	font-weight: bold;
	background: #900;
	color: #fff;	  	  
}

#admintab a{
	color: #fff;
}

#admintab p{
	text-align: center;		
	font-weight: normal;
	font-size: 12px;
}

#admintab h4{
	margin-bottom: 10px;
	margin-top: 10px;
	font-size: 14px;
	border-bottom: 1px dotted #ccc;
}

</style>

<div id="admintab">

	<p>
		<a href="javascript:openFeedbackForm()">Submit new snag</a>
		&nbsp;|&nbsp;
		<a target="_blank" href="https://trello.com/b/aYGQ52ZC/moda-website-snags">See all snags</a>			
	</p>
	
</div>

<!--CleverSnags: end-->