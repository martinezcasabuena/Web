<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.min.js"></script>
<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.extended.js"></script>

<script type="text/javascript" src="<?php echo CONTACT_JS_PATH ?>contact.js" ></script>
<section id="bills-page">
    <div class="container">
        <div class="center">
            <h2 align="center">Contact</h2>

            <form id="contact_form" name="contact_form" class="form-contact">
              <div class="row">
            		<label for="name">Tu nombre:</label><br />
            		<input id="name" class="input" name="name" type="text" value="" size="30" /><br />
            	</div>
            	<div class="row">
            		<label for="email">Tu email:</label><br />
            		<input id="email" class="input" name="email" type="text" value="" size="30" /><br />
            	</div>
            	<div class="row">
            		<label for="message">Tu mensaje:</label><br />
            		<textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
            	</div>
              <br>
              <input type="hidden" name="token" value="contact_form" />

              <input class="btn btn-primary" type="submit" name="submit" id="submitBtn" disabled="disabled" value="send" />
              <div id="resultMessage" style="display: none;"></div>

  </form>

        </div>
    </div><!--/.container-->
</section><!--/#contact-page-->
