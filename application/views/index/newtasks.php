
<?php require_once "header.php";?>
<script>
	function resize_photo(){
		var input = document.getElementById("add_userfile");
		file = input.files[0];
		if (file != undefined) {
			var data =  new FormData();
			if (!!file.type.match(/image.*/)) {
				data.append("crop", "true");
				/*data.append("w", rw);
				data.append("h", rh);*/
				data.append('img', file);
				$.ajax({
					url: "setpost",
					type: "POST",
					data: data,
					processData: false,
					contentType: false,
					success: function (data) {
						//console.log(data);
						$('#image').attr('src', data);
					}

				});
			}
		}
	}
</script>
<main class="main-tasks">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="form-add-tasks col-md-6">
				<form name="myForm" id="add_tasks" method="post" enctype="multipart/form-data">
					<div class="tasks-row tasks-row-half">
						<input type="text" class="input task-input" id="add-username" placeholder="Ваше имя">
					</div>
					<div class="tasks-row tasks-row-half">
						<input type="email" name="add-email" class="input task-input" id="add-email" placeholder="Ваш email">
					</div>
					<div class="tasks-row tasks-row-half">
						<textarea maxlength="400" rows="1" id="add-message" class="newpost-text input" placeholder="Текст сообщения"></textarea>
					</div>
					<label class="btn btn-default btn-sm center-block btn-file">
						<img id="image" class="image" src="img/add.svg" />   
						<i class="fa fa-upload fa-2x" aria-hidden="true"></i>
						<input id="add_userfile" type="file" name="filename" onchange="resize_photo();" size="5000" style="display: none;">
					</label>
				</form>
				<a href="#" class="link button button-cta-green contest-button" id="prewiew">
					Предварительный просмотр
				</a>
				<a href="#" class="link button button-cta-green contest-button" id="save-task">
					Сохранить
				</a>
			</div>
			<div class="right-block col-md-3">
				<div class="prewiew-task"></div>
			</div>
		</div>
	</div>
</main>

<?php require_once "footer.php";?>

