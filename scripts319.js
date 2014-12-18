var Actors={
	
	init:function(configuration){
			this.config=configuration;
			config=this.config;	
			this.setupTemplates();
			this.bindEvents();
			$('button').remove();
		},
	
	bindEvents:function(){
			config.letterSelection.on('change', this.fetchActors);
			config.actorsList.on('click','li',this.displayAuthorInfo);
			config.actorInfo.on( 'click', 'span.close', this.closeOverlay );
		
		},
	
	setupTemplates:function(){
			config.actorListTemplate=Handlebars.compile(config.actorListTemplate);
			config.actorInfoTemplate=Handlebars.compile(config.actorInfoTemplate);
			Handlebars.registerHelper('fullName',
				function(actor){
					return actor.first_name+ " " +actor.last_name;
				}
			);
		},
	
	fetchActors:function(){
			$.ajax(
				{
					url:'index.php',
					type:'POST',
					data:config.form.serialize(),
					dataType:"json",
					success: function(JSONdata){
						if (JSONdata[0]){
							config.actorsList.empty().append(config.actorListTemplate(JSONdata));
						}else{
							config.actorsList.empty().append('<li>No results. Please try again.</li>');	
						}
					}
				}
			);
		},
	
	displayAuthorInfo:function(event){
		
			$.ajax(
				{
					url:'index.php',
					type:'POST',	
					data:{actor_id: $(this).data('actor_id')}
				}
			).done(
				function(JSONdata){
					config.actorInfo.html(config.actorInfoTemplate({info: JSONdata})).show();
				}
			);
			event.preventDefault();	
		},
		
	closeOverlay: function() {
			config.actorInfo.fadeOut(300);
		}
};

Actors.init(
	{
		letterSelection: $('#q'),
		form:$('#letterForm'),
		actorListTemplate: $('#actor_list_template').html(),
		actorInfoTemplate: $('#actor_info_template').html(),
		actorsList: $('ul.actors_list'),
		actorInfo:$('div.actor_info')
	}
);