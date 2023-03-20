$( document ).ready(function(){
	$('input[name="Login"]').on('click',
		function(e){
			e.preventDefault();
			if($('input[name="USER_LOGIN"]').val().length == 0 ){
				$('.bx-auth-note').text('Поле Логин не может быть пустым.');
				$('.bx-auth-note').css('color', 'red');
			} else if ($('input[name="USER_PASSWORD"]').val().length == 0 ){
				$('.bx-auth-note').text('Поле Пароль не может быть пустым.');
				$('.bx-auth-note').css('color', 'red');
			} else {
				let login = $('input[name="USER_LOGIN"]').val();
				let pass = $('input[name="USER_PASSWORD"]').val();
				$.post( "local/ajax/check_user.php", { login: login, pass: pass },
					function( data ) {
						let answ = JSON.parse(data);
						if(answ.pass == 1){
							$('form[name="form_auth"]').submit();
						} else {
							$('.bx-auth-note').text('Не верный Логин или Пароль.');
							$('.bx-auth-note').css('color', 'red');
						}
					});
			}
		});
});