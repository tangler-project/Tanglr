	<div class='cover' v-on:click='closeNbarGuest'></div>
	<div class='container-fluid landingView'>
		<div class='container-fluid landingLeft' v-on:mouseover='noScroll' v-on:mouseleave='yesScroll'>

			<div class='publicKnotParent' v-for="group in groups" id="content">
				<div class='publicKnot' v-on:click="goToPost(group)"><img class='groupBanner' src="http://placehold.it/1400x425">
					<div class='groupName'>
						@{{group.title}} @{{group.id}}
					</div>
				</div>
			</div>

		</div>
		<div class='landingRight'>>
			<div class='landingContent'>
			<h2 class='landingTitle'>Tangler</h2>
				Tangler is San Antonio's premiere Social Media Platform! Get tangled with 
				friends, family, colleagues and stay connected with what matters most! Scroll down or press Discover to learn more...
			<h4 class='actionDivBlack' v-on:click="toDiscover">Discover</h4>
			</div>
		</div>

	</div>


	<div class='publicGroupView'>
		<div class='publicGroupLeft'>
			<div class='posts list-group' v-for="post in groupPosts">
				{{-- <div v-for="post in groupPosts"> --}}
					<h5>@{{post.owner_id}}</h5>
					<p>@{{post.content}}<p>
					<img v-bind:src="post.img_url" alt=""><br>
					<strong>@{{post.created_at}}</strong>
				{{-- </div>	 --}}
			</div>	
		</div>

		<div class='publicGroupRight'>
			<div class="list-group">
				<div v-for="event in groupEvents">
				  	<div class="list-group-item list-group-item-action">
					  	<h5>@{{event.title}}</h5>
					  	<p>@{{event.content}}</p>
					  	<span>Starts: </span><strong>@{{event.start_date}}</strong>
					  	<span>Ends: </span><strong>@{{event.end_date}}</strong>
				  	</div>
				</div>
		  	</div>
		</div>
	</div>

