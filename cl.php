<?php require_once 'header.php';?>

<div class="container-fluid  ">
	<h2 class="w3-center" style="margin-top:60px;padding-top:20px;color:red;">Login into Blood Bank</h2>
	<div class="row">
		<div class="col-md-6">
			<div class="w3-light-grey w3-border w3-panel w3-padding-16">
				<center><h3 style="color:red">For Reciever/User</h3></center>
				<center><img src="images/banner4.png" height="100" width="100" alt=""></center>
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
		<div class="col-md-6">
			<div class="w3-light-grey w3-border w3-panel w3-padding-16">
				<center><h3 style="color:red">For Hospital</h3></center>
				<center><img src="images/banner4.png" height="100" width="100" alt=""></center>
				<div class="form-group">
				    <label for="hospital_username">Username</label>
				    <input type="text" class="form-control hospital_login" id="hospital_username" placeholder="Enter username">
				</div>
				<div class="form-group">
				    <label for="hospital_password">Password</label>
				    <input type="password" class="form-control hospital_login" id="hospital_password" placeholder="Password must be atleast 6 characters long">
				</div>
				<center><a class="btn btn-outline-danger" href="#" id="hospital_login_btn">Login as Hostpital</a></center>
			</div>
		</div>
	</div>
</div>

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

$('.hospital_login').keypress(function(e){
    if(e.which == 13){//Enter key pressed
        $('#hospital_login_btn').click();//Trigger search button click event
    }
});

$("#hospital_login_btn").click(function(){
	$.post("api/hospital/profile/login.php",
	{
		username:$("#hospital_username").val(),
		password:$("#hospital_password").val()
	},function(data){
		console.log(data);
		var arr=JSON.parse(data);
		if(arr["status"]=="success"){
			$(".msg").html(show_alert(arr["remark"],"success"));
			window.location="dashboard.php";
		}else{
			$(".msg").html(show_alert(arr["remark"],"warning"));
		}
	})
});

</script>