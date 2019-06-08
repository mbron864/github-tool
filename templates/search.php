<?php $this->layout('template', ['title' => 'Search']) ?>

<div class="ui container">
	<form class="ui grid two column form">
		<div class="row">
			<div class="field column">
				<input type="text" name="organization" placeholder="Organization">
			</div>
			<div class="field column">
				<input type="text" name="repository" placeholder="Repository">
			</div>
		</div>
		<div class="row one column">
			<div class="field column">
				<div class="ui action input">
					<input type="text" name="query" placeholder="Query">
					<button class="ui button">Search</button>
				</div>
			</div>
		</div>
	</form>
</div>