<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">

<script type="text/javascript" src="<?php echo BILLS_JS_PATH ?>bills.js" ></script>
<section id="contact">
    <div class="container">
        <div class="center">
            <h2 align="center">Contact</h2>

            <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
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
            	<input id="submit_button" type="submit" value="Send email" />
  </form>

        </div>
    </div><!--/.container-->
</section><!--/#contact-page-->
