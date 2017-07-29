
function fixBody(){
	$('body').css('overflow-y','hidden');

}
function unfixBody(){
	$('body').css('overflow-y','auto');
	var event = document.getElementById('new-event').value="";
}

$(document).ready(function() {

	$('a[href="#"]').on('click', function(e){
		e.preventDefault();
	});

	$(document).on('click','#close-popup', function() {
		$('.popups-wrapper').removeClass('flex-wrapper');
		unfixBody();
	});

	$(document).on('click', '.popups-wrapper', function(e){
		if ($(e.target).parents(".popup").length != 1){
			$('.popups-wrapper').removeClass('flex-wrapper');
			unfixBody();
		}
	});

	$(document).on('click','#add-user', function() {
		$('#user-popup').addClass('flex-wrapper');
		fixBody();
		document.getElementById('user-name').value='';
	});

	$(document).on('click','#save-user', function() {
		var name = document.getElementById('user-name').value;
		if (name != '') {
			get_users_list(name, "add_user");
		}
	});

	function get_users_list(name, ajax_event){
		var data =  new FormData();
		data.append(ajax_event, "true");
		data.append("name", name);
		$.ajax({
			url: "setpost",
			type: "POST",
			data: data,
			processData: false,
			contentType: false,
			success: function (data) {
				$('.popups-wrapper').removeClass('flex-wrapper');
				unfixBody();
				$('.list-users').empty();
				$('.list-users').append(data);
			}

		});
	}

	var newdate, fulldate, user;
	$(document).on('click','#open-popup', function() {
		$('#event-popup').addClass('flex-wrapper');
		fixBody();
		
	});
	$(document).on('change','#new-user', function() {
		user = $(this).val();
	})
	
	$(document).on('click','#save-event', function() {
		var event = document.getElementById('new-event').value;
		if (event != '' &&  newdate != undefined) {

			var data =  new FormData();
			data.append("add_event", "true");
			data.append("event", event);
			data.append("user", user);
			data.append("newdate", newdate);
			data.append("fulldate", fulldate);
			$.ajax({
				url: "setpost",
				type: "POST",
				data: data,
				processData: false,
				contentType: false,
				success: function (data) {
					$('.popups-wrapper').removeClass('flex-wrapper');
					unfixBody();
					$('.list-date').empty();
					$('.list-date').append(data);
					get_users_list(user, "update_user");
				}

			});
		} else {
			alert('Выберите дату');
			$('.popups-wrapper').removeClass('flex-wrapper');var event = document.getElementById('new-event').value;
			unfixBody();
			
		}
	});


	$("#datepicker").datepicker({ 
		autoclose: true, 
		todayHighlight: true,

	}).datepicker('update', new Date())
	.on("change", function (e) {
		newdate = e.target.value;
		var myDate = new Date( newdate.replace(/(\d+).(\d+).(\d+)/,"$3/$2/$1") );
		fulldate = ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"][myDate.getDay()];
		ajax_date(newdate, fulldate);
	});

	function ajax_date(newdate, fulldate){
		var data =  new FormData();
		data.append("ajax_date", "true");
		data.append("date", newdate);
		data.append("fulldate", fulldate);
		$.ajax({
			url: "setpost",
			type: "POST",
			data: data,
			processData: false,
			contentType: false,
			success: function (data) {
				$('.list-date').empty();
				$('.list-date').append(data);
			}

		});
	}
	var done = 0;
	$(document).on('click','.task-event', function() {
		if (done == 0) {
			done = 1;
		} else {
			done = 0;
		}
		var id = this.parentNode.id;
		var data =  new FormData();
		data.append("ajax_done", "true");
		data.append("id", id);
		data.append("done", done);
		$.ajax({
			url: "setpost",
			type: "POST",
			data: data,
			processData: false,
			contentType: false,
			success: function (data) {
				get_users_list(id, "update_user");
			}

		});
		if (newdate != undefined) {
			ajax_date(newdate, fulldate);
		}
	});
	$(document).on('click','.remove', function() {
		var id = this.parentNode.id;
		var data =  new FormData();
		data.append("ajax_remove", "true");
		data.append("id", id);
		$.ajax({
			url: "setpost",
			type: "POST",
			data: data,
			processData: false,
			contentType: false,
			success: function (data) {

				$('#'+id).remove();

			}

		});
	});

	$(document).on('click','.remove_tesk', function() {
		var id = this.parentNode.parentNode.parentNode.parentNode.id;
		var nuser = $(this).attr('data-user');
		var ndate = $(this).attr('data-ndate');
		var data =  new FormData();
		data.append("ajax_remove_task", "true");
		data.append("nuser", nuser);
		data.append("ndate", ndate);
		$.ajax({
			url: "setpost",
			type: "POST",
			data: data,
			processData: false,
			contentType: false,
			success: function (data) {
				get_users_list(id, "update_user");
				$('#'+id).remove();

			}

		});
	});

});
