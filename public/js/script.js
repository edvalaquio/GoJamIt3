$(document).ready(function(){
	$(document).on("click", ".like-post", likePost);
	$(document).on("click", ".follow-user", followUser);
});

function likePost(){
	var post_id = $(this).attr("data-pg");
	$.ajax({
		url: "/posts/like/"+post_id,
		type: "get",
		success:function(data){
			console.log(data);
			var like_count = data.length;

			$("#like-count-"+post_id).html(like_count+" likes");

			var likers = "";
			$.each(data, function(key, value){
				likers += "<div><a href='/profile/"+value['username']+"'>"+value['name']+"</a></div>";
			});
			$("#myModal_"+post_id+" .modal-body").html(likers);
		}
	});
}

function followUser(){
	document.getElementById('follow-unfollow').innerHTML="Unfollow";
	document.getElementById('follow-unfollow').className="unfollow-user";
	
	console.log("hello");
	var user_name = $(this).attr("data-pg");
	console.log(user_name);
	$.ajax({
		url: "/profile/follow/"+user_name,
		type: "get",
		success:function(data){
			console.log("Data: " + data);
			var followers_count = data.length;
			console.log("Followers count " + followers_count);
			$("#followers-count-"+user_name).html(followers_count+" followers");

			var followers = "";
			 $.each(data, function(key, value){
				followers += "<div><a href='/profile/"+value['username']+"'>"+value['name']+"</a></div>";
			 });
			 $("#followerModal_"+user_name+" .modal-body").html(followers);
		}
	});
}
