<br><br><br>
<script src="<?php echo CONTACT_LIB_PATH; ?>bootstrap-button.js"></script>
<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.min.js"></script>
<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.extended.js"></script>
<script src="<?php echo CONTACT_JS_PATH; ?>contact.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

<section id="contact-page">
<div class="container">
    <form id="contact_form" name="contact_form" class="form-contact">
        <h2 class="form-contact-heading" align="center">Contact Us</h2>

        <div class="control-group">
            <input type="text" id="inputName" name="inputName" placeholder="Name" dir="auto" maxlength="100">
            <div id="e_inputName"><?php
                if (isset($error['inputName'])) {
                    print ("<BR><span style='color: #ff0000'>" . "* " . $error['inputName'] . "</span><br/>");
                }
                ?></div>
        </div>
        <br>
        <div class="control-group">
            <input type="text" id="inputEmail" name="inputEmail" placeholder="Email *" maxlength="100">
            <div id="e_inputEmail"><?php
                if (isset($error['inputEmail'])) {
                    print ("<BR><span style='color: #ff0000'>" . "* " . $error['inputEmail'] . "</span><br/>");
                }
                ?></div>
        </div>
        <br>
        <div class="control-group">
              <textarea id="inputMessage" class="input-block-level" rows="4" name="inputMessage" placeholder="Message *" style="max-width: 100%;" dir="auto"></textarea>
              <div id="e_inputMessage"><?php
                  if (isset($error['inputMessage'])) {
                      print ("<BR><span style='color: #ff0000'>" . "* " . $error['inputMessage'] . "</span><br/>");
                  }
                  ?></div>
        </div>

        <input type="hidden" name="token" value="contact_form" />

        <button type="button" id="submitBtn" name="submitBtn" class="btn btn-primary btn-lg" value="submit" disabled="disabled">Submit Message</button>


        <img src="<?php echo CONTACT_IMG_PATH; ?>ajax-loader.gif" alt="ajax loader icon" class="ajaxLoader" /><br/><br/>

        <div id="resultMessage" style="display: none;"></div>
    </form>
</div> <!-- /container -->
</section>
