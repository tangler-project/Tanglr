<div class='container-fluid publicUserGroupView'>

<div id="post-body">
	<div >
		<posts></posts>	
	</div>

	<template id="posts-template">
		<div class="publicUserGroupLeft">
			<div v-for="post in posts">
				<div class="posts">
					<h5>@{{ post.owner_id }}</h5>
					@{{post.content}}
				</div>
				
			</div>
			<div class='creatNewPost'>
				<form method='POST'>
					<textarea class='form-control' type='text' name='post'></textarea>
					<button type='submit' class='btn signupButton'>Post</button>
				</form>
			</div>
		</div>
	</template>
</div>


	
	<div class='publicUserGroupRight'>
		<div class="list-group listOfEvents">
		<button class='btn createEventButton'>New Event</button>
		  	<div class="list-group-item list-group-item-action">
		    	<h5 class="list-group-item-heading">Event</h5>
		    	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		  	</div>
		  	<div class="list-group-item list-group-item-action">
		    	<h5 class="list-group-item-heading">Event</h5>
		    	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		  	</div>
		  	<div class="list-group-item list-group-item-action">
		    	<h5 class="list-group-item-heading">Event</h5>
		    	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		  	</div>
		  	<div class="list-group-item list-group-item-action">
		    	<h5 class="list-group-item-heading">Event</h5>
		    	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		  	</div>
		  	<div class="list-group-item list-group-item-action">
		    	<h5 class="list-group-item-heading">Event</h5>
		    	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
		  	</div>
		</div>
		<div class='createNewEvent'>
			<button class='btn eventBackButton'>Back</button>
    		<form method='POST'>
    			<input class='form-control' type='text' name='name' placeholder='Title'>
    			<input class='form-control' type='text' name='email' placeholder='Description'>
    			<input class='form-control' type='datetime-local' name='password' placeholder='Start Date/Time'>
    			<input class='form-control' type='datetime-local' name='confirmPassword' placeholder='End Date/Time'>
    			<button type='submit' class='btn createEventButton'>Create Event</button>
    		</form>
    	</div>
	</div>
</div>