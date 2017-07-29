		<div id="user-popup" class="popups-wrapper">
			<div class="popup" >
				<div class="tile">
					<div class="settings">
						<h3>Добавте нового пользователя</h3>
						<form id="new-user" method="post">
							<div class="signin-row tasks-row-half">
								<input type="text" name="user-name" class="input task-input" id="user-name" placeholder="Имя пользователя">
							</div>
						</form>
						<hr class="hr-full-width hr-body">
						<div class="signin-action-button">
							<a href="#" class="link link-gray" id="close-popup">
								Отмена
							</a>
							<input type="submit" name="authorize" class="link button button-cta-green contest-button" id="save-user" value="Сохранить">
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="event-popup" class="popups-wrapper">
			<div class="popup" >
				<div class="tile">
					<div class="settings">
						<h5>Выберите пользователя и введите задание</h5>
						<form id="form-event" method="post">
							<div class="signin-row tasks-row-half">
								<select type="text" class="input task-input" id="new-user" name="serch_breed">

									<option value="Select a breed" disabled selected>Имя</option>
									<?php $class_event->get_popup();?>
								</select>
								
							</div>
							<div class="signin-row tasks-row-half">
								<input type="text" class="input task-input" id="new-event" placeholder="Задание">
							</div>
						</form>
						<hr class="hr-full-width hr-body">
						<div class="signin-action-button">
							<a href="#" class="link link-gray" id="close-popup">
								Отмена
							</a>
							<input type="submit" name="authorize" class="link button button-cta-green contest-button" id="save-event" value="Сохранить">
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
	</html>
