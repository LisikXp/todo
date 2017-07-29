
<?php require_once "header.php";?>

<main class="main">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<label>Select Date: </label>
				<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
					<input id="picker" class="form-control" type="text" readonly />
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
				<ul class="list-date"></ul>
				<input type="submit" name="authorize" class="link button button-cta-green contest-button" id="open-popup" value="Добавить задание">
			</div>
			<div class="list-block col-md-4">

			</div>
			<div class="col-md-4">
				<ul class="list list-users" data-count="">
					<?php $user->get_user_list(); ?>
				</ul>
			</div>
		</div>
	</div>
</main>

<?php require_once "footer.php";?>