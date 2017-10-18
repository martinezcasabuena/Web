<br><br><br><br><br><br><br><br><br>

<script src="<?php echo CONTACT_LIB_PATH; ?>bootstrap-button.js"></script>
<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.min.js"></script>
<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.extended.js"></script>
<script src="<?php echo CONTACT_JS_PATH; ?>contact.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

<div class="container">
    <form id="contact_form" name="contact_form" class="form-contact">
        <h2 class="form-contact-heading">Contact Us</h2>

        <div class="control-group">
            <input type="text" id="inputName" name="inputName" placeholder="Name" dir="auto" maxlength="100">
        </div>
        <br>
        <div class="control-group">
            <input type="text" id="inputEmail" name="inputEmail" placeholder="Email *" maxlength="100">
        </div>
        <br>
        <div class="control-group">
              <textarea class="input-block-level" rows="4" name="inputMessage" placeholder="Message *" style="max-width: 100%;" dir="auto"></textarea>
        </div>

        <input type="hidden" name="token" value="contact_form" />

        <input class="btn btn-primary" type="submit" name="submit" id="submitBtn" disabled="disabled" value="send" />

        <img src="<?php echo CONTACT_IMG_PATH; ?>ajax-loader.gif" alt="ajax loader icon" class="ajaxLoader" /><br/><br/>

        <div id="resultMessage" style="display: none;"></div>
    </form>
</div> <!-- /container -->
