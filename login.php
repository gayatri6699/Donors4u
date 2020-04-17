<?php require_once 'header.php';?>

<center>

<div class="container">
	<h2 class="w3-center" style="margin-top:60px;padding-top:20px;color:red;">Login into Blood Bank</h2>
	<div class="row">
		<div class="col-md-12">
			<div class="w3-light-grey w3-border w3-panel w3-padding-16">
				<h3>For Reciever/User</h3>
				<div class="form-group">
				    <label for="user_username">Username</label>
				    <input type="text" class="form-control user_login" id="user_username" placeholder="Enter username">
				</div>
				<div class="form-group">
				    <label for="user_password">Password</label>
				    <input type="password" class="form-control user_login" id="user_password" placeholder="Password must be atleast 6 characters long">
				</div>
			
				<center><a class="btn btn-outline-danger" href="#" id="user_login_btn">Login as Reciever</a></center>
			</div>
		</div>
		</div>
	</div></center>

<?php require_once 'footer.php'; ?>

<script>
$("document").ready(function(){
	$("#tab_login").addClass("active");
});

$('.user_login').keypress(function(e){
    if(e.which == 13){//Enter key pressed
        $('#user_login_btn').click();//Trigger search button click event
    }
});

$("#user_login_btn").click(function(){
	$.post("api/user/profile/login.php",
	{
		username:$("#user_username").val(),
		password:$("#user_password").val()
	},function(data){
		console.log(data);
		var arr=JSON.parse(data);
		if(arr["status"]=="success"){
			$(".msg").html(show_alert(arr["remark"],"success"));
			window.location="index.php";
		}else{
			$(".msg").html(show_alert(arr["remark"],"warning"));
		}
	})
});



</script>