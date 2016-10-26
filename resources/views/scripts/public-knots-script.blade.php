<script>
	// Vue.http.headers.common['X-CSRF-TOKEN'] = 
	// 	document.querySelector('#token').getAttribute('value');
	console.log("linked");
	Vue.component('groups',{
		template: '#groups-template',

		data: function(){
			return {
				groups: [],
				group: {},
				groupObject:{},
				//arrays for individual group data
				groupPosts:[],
				groupEvents:[],

				displayGroups:true,
				displayGroupData:false
			};
		},

		created: function(){
			this.fetchGroups();
			
		},

		methods:{
			fetchGroups: function(){
				this.$http.get('api/groups').then((response) => {
					var array = response.body;
					var result=[];
					//filter the result array to just display public posts
					for(var i=0; i < array.length; i++){
						if(array[i].is_private == 0)//if that element is not private
							result.push(array[i]);
					}
					this.$set('groups', result);

				});	
			},

			goToPost: function(group){
				//display the groups data
				this.displayGroupData = true;
				//hide the groups views
				this.displayGroups = false;
				//alignment
				$('.logoLine').css('left', '60%');
			    $('.nbarGuest').css('left', '60%');
			    
			    var component = this;
			   	this.$http.get('api/groups/'+group.id).then((response) => {	
			   		
					this.$set('groupObject', response.body);
					this.$set('groupPosts', response.body.post);
					this.$set('groupEvents', response.body.event);
		
			   	});

			   	//scroll bottom animation
			    $('.publicGroupLeft').stop().animate({
			          scrollTop: $('.publicGroupLeft')[0].scrollHeight
			    }, 10);	
			},

				
		}

	});


	new Vue({
		el: '#group-body'


	});
	new Vue({
		el: '#home',
		methods:
		{
			displayHome: function(){
				
				
			}
		}

	});


</script>


