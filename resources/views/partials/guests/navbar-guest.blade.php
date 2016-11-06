
<div class='topNbarHover' v-on:mouseover='showTopNbar' v-on:mouseleave='hideTopNbar'>
	<div class="form-group searchBar">
      	<input type="text"  class="searchInput form-control" placeholder="Search group" id="searchBar">
    </div>
	<div class='topNbarGuest' id="home">
		<div class='linkParent'>
			{{-- <div class='linkSelector'></div> --}}
			<div class='guestTopLink homeLink' v-on:click="toHome">Home</div>
			<div class='guestTopLink midTopLink' v-on:click="toDiscover">Discover</div>
			<div class='guestTopLink' v-on:click="showSignUp">Sign Up</div>
		</div>
	</div>
	<div class='topNbarTab'>
		Navigation
		{{-- <img class="img-navbar" src="/img/navbarArrow.png" alt=""> --}}
	</div>
</div>

<div class='nbarGuest'>
	<div class='nbarGuestMain'>
		<div class='logLinks'>
			<div class='linkSignupReturn' v-on:click="returnSignUp">Sign up</div>
			<div class='linkLogin' v-on:click="showLogIn">Log in</div>
			<div class='linkOutline'></div>
		</div>
		<div>
			@include('auth.register')
			@include('auth.login')
		</div>
	</div>	
</div>
