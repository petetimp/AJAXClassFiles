<?php
	include 'header.php';
?>	
	<h1>Search Actors By Last Name</h1>
    <form id="letterForm" action='index.php' method='post'>
    	<select name='q' id='q'>
        	<?php
            	$alphabet=str_split('abcdefghijklmnopqrstuvwxyz');
				
				foreach($alphabet as $letter){
					echo "<option value='$letter'>$letter</option>";	
				}
			?>
        </select>
        <button type="submit">Go!</button>
    </form>
    
    	<ul class='actors_list'>
    	<?php 
        	if (isset($actors)){ 
    			foreach($actors as $actor){
					echo "<li data-actor_id='$actor->actor_id'><a href='actor.php?actor_id={$actor->actor_id}'>{$actor->first_name} {$actor->last_name}</a></li>";
        		}
			} 
		?>
			<script id="actor_list_template" type="text/x-handlebars-template">
				{{#each this}}
        			<li data-actor_id={{actor_id}}>
						<a href='actor.php?actor_id={{actor_id}}'>{{fullName this}}</a>
					</li>
				{{/each}}
    		</script>
    		<!--fullName is a helper method. See scripts319.js for more info-->  
    	</ul>
        <div class='actor_info'>
        	<script id="actor_info_template" type="text/x-handlebars-template">
				<p id='aInfo'>
					<span class='close'>X</span>
					{{info}}
				</p>
            </script>
        </div>    
<?php	
	include 'footer.php';
?>