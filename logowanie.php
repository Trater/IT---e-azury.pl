

<!DOCTYPE html>

<html>
<?php

echo<<<END

<div class="cd-signin-modal js-signin-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-signin-modal__container"> <!-- this is the container wrapper -->
			<ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
				<li><a href="#0" data-signin="login" data-type="login">Logowanie</a></li>
				<li><a href="#0" data-signin="signup" data-type="signup">Nowe konto</a></li>
			</ul>

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="login"> <!-- log in form -->
				<form class="cd-signin-modal__form" action="login.php" method="post">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signin-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signin-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">1Error message here!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signin-password">Hasło</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signin-password" type="password"  placeholder="Hasło">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Pokaż</a>
						<span class="cd-signin-modal__error">2Error message here!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input type="checkbox" id="remember-me" checked class="cd-signin-modal__input ">
						<label for="remember-me">Zapamiętaj mnie</label>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" value="Zaloguj">
					</p>
				</form>
				
				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="reset">Zaspomniałeś hasła?</a></p>
			</div> <!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="signup" > <!-- sign up form -->
				<form class="cd-signin-modal__form" action="rejestracja.php" method="post">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace" for="signup-username">Nazwa użytkownika</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signup-username" id="signup-username" type="text" placeholder="Nazwa użytkownika">
						<span class="cd-signin-modal__error">To pole powinno zawierać od 3 do 20 znaków!</span>		
						
    

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signup-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signup-email" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Error message here!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signup-password">Hasło</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" name="signup-password" type="text"  placeholder="Hasło">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Ukryj</a>
						<span class="cd-signin-modal__error">Error message here!</span>

					
					</p>
					
					<p class="cd-signin-modal__fieldset" id="check2">
						<input type="checkbox" id="check" name="accept-terms" class="cd-signin-modal__input">
						<label for="accept-terms"> I agree to the  <a href="#0">Terms</a></label>
					</p>

					
					
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Stwórz konto">
					</p>
				</form>
			</div> <!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="reset"> <!-- reset password form -->
				<p class="cd-signin-modal__message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="reset-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Error message here!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="login">Back to log-in</a></p>
			</div> <!-- cd-signin-modal__block -->
			<a href="#0" class="cd-signin-modal__close js-close">Zamknij</a>
		</div> <!-- cd-signin-modal__container -->
	</div> <!-- cd-signin-modal -->

END;

?>

</html>