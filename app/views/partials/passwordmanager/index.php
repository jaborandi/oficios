<div class="container">
	<div>
		<h3>Gerenciador de redefinição de senha</h3>
		<small class="text-muted">
			Por favor, forneça o endereço de e-mail válido que você usou para se registrar
		</small>
	</div>
	<hr />
	<div class="row">
		<div class="col-md-8">
			<?php 
				$this :: display_page_errors(); 
			?>
			<form method="post" action="<?php print_link("passwordmanager/postresetlink?csrf_token=" . Csrf::$token); ?>">
				<div class="row">
					<div class="col-9">
						<input value="<?php echo get_form_field_value('email'); ?>" placeholder="Enter Your Email Address" required="required" class="form-control default" name="email" type="email" />
					</div>
					<div class="col-3">
						<button class="btn btn-success" type="submit"> Enviar <i class="icon-envelope-open"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<br />
	<div class="text-info">
		Um link será enviado para o seu e-mail contendo as informações necessárias para sua senha
	</div>
</div>




