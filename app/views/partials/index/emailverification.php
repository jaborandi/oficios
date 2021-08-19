<?php
	$data=$this->view_data;
	$user_email = $data["user_email"];
	$status = $data["status"];
?>
<div class="container">
	<?php 
		if($status==true){
			if(!empty($_GET['resend'])){
				?>
				<h4 class="text-info bold animated bounce"><i class="icon-envelope-open"></i> A confirmação por e-mail foi reenviada</h4>
				<?php
			}
			else{
				?>
				<h4 class="text-info bold"><i class="icon-envelope-open"></i> Link de confirmação de e-mail enviado</h4>
				<?php
			}
		?>
			<div class="text-muted">Por favor, verifique seu endereço de e-mail seguindo o link em sua caixa postal</div>
			<hr />
			<div>
				<a href="<?php print_link("index/send_verify_email_link/$user_email?resend=true") ?>" class="btn btn-primary"><i class="icon-envelope-open"></i> Reenviar email</a>
			</div>
			<?php
		}
		else{
			?>
			<div><i class="icon-envelope-open"></i> Por favor, verifique seu endereço de e-mail seguindo o link em sua caixa postal</div>
			<hr />
			<div>
				<a href="<?php print_link("index/send_verify_email_link/$user_email?resend=true") ?>" class="btn btn-primary"><i class="icon-envelope-open"></i> Reenviar email</a>
			</div>
			<?php
		}
	?>
	<?php
		if(DEVELOPMENT_MODE){
			$mailbody = $this->view_data["mailbody"];
			?>
			<hr />
			<div class="bg-light p-4 border">
				<div class="text-danger">
					<h3>
						<b>Disclaimer:</b> You are seeing this because you published under development mode.
						<br />We understand that sending email in localhost might be problematic.
					</h3>
					<div class="text-muted">To edit the email template, browse to :- <i>app/view/partials/index/emailverify_template.html</i></div>
				</div>
				<hr />
				<?php  echo $mailbody; ?>
			</div>
			
			<?php
		}
	?>
</div>


