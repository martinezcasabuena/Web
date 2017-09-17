<script type="text/javascript" src="modules/users/view/js/users.js" ></script>
<section id="contact-page">
    <div class="container">
        <div class="center">        
            <h2>ADD USER    </h2>
            <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div> 
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>
            <form id="form_user" method="post">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" id="name" name="name" placeholder="name" class="form-control" required="required" value="<?php
                        if (!isset($error['name'])) {
                            echo $_POST ? $_POST['name'] : "";
                        }
                        ?>" >
                        <div id="e_name"><?php
                            if (isset($error['name'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['name'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" id="last_name" name="last_name" placeholder="last name" class="form-control" required="required" value="<?php
                        if (!isset($error['last_name'])) {
                            echo $_POST ? $_POST['last_name'] : "";
                        }
                        ?>">
                        
                        <div id="e_last_name"><?php
                            if (isset($error['last_name'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['last_name'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth *</label><br />
                        <input id="birth_date" type="text" name="birth_date"   class="form-control" placeholder="mm/dd/yyyy"  value="<?php
                        if (!isset($error['birth_date'])) {
                            echo $_POST ? $_POST['birth_date'] : "";
                        }
                        ?>">
                        <div id="e_birth_date"><?php
                            if (isset($error['birth_date'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['birth_date'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Date of obtaining title *</label><br />
                        <input id="title_date" type="text" name="title_date" placeholder="mm/dd/yyyy"  class="form-control"  value="<?php
                        if (!isset($error['title_date'])) {
                            echo $_POST ? $_POST['title_date'] : "";
                        }
                        ?>">
                        <div id="e_title_date"><?php
                            if (isset($error['title_date'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['title_date'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Address*</label><br />
                        <input id="address" type="text" name="address" placeholder="Street nXX ptaX" required="required" class="form-control"value="<?php
                        if (!isset($error['address'])) {
                            echo $_POST ? $_POST['address'] : "";
                        }
                        ?>">
                        <div id="e_address"><?php
                            if (isset($error['address'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['address'] . "</span><br/>");
                            }
                            ?></div>
                    </div>


                    <div class="form-group">
                        <label>English level</label><br />
                        <select name="en_lvl" id="en_lvl">
                            <option selected>Select level</option>
                            <option value="a1">A1</option>
                            <option value="a2">A2</option>
                            <option value="b1">B1</option>
                            <option value="b2">B2</option>
                            <option value="c1">C1</option>
                        </select>
                        <div id="e_en_lvl"><?php
                            if (isset($error['en_lvl'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['en_lvl'] . "</span><br/>");
                            }
                            ?></div>
                    </div>

                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>User *</label>
                        <input type="text" id="user" name="user" placeholder="user" class="form-control" required="required" value="<?php
                        if (!isset($error['user'])) {
                            echo $_POST ? $_POST['user'] : "";
                        }
                        ?>">
                        <div id="e_user"><?php
                            if (isset($error['user'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['user'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input type="password" id="pass" name="pass" placeholder="pass" class="form-control" required="required">
                        <div id="e_pass"><?php
                            if (isset($error['pass'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['pass'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password *</label>
                        <input type="password" id="conf_pass" name="conf_pass" placeholder="confirm pass" class="form-control" required="required">
                        <div id="e_conf_pass"><?php
                            if (isset($error['conf_pass'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['conf_pass'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>E-mail *</label>
                        <input type="email" id="email" name="email" placeholder="e-mail" class="form-control" required="required" value="<?php
                        if (!isset($error['email'])) {
                            echo $_POST ? $_POST['email'] : "";
                        }
                        ?>">
                        <div id="e_email"><?php
                            if (isset($error['email'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['email'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Email *</label> 
                        <input type="email" id="conf_email" name="conf_email" placeholder="confirm e-mail" class="form-control" required="required" value="<?php
                        if (!isset($error['email'])) {
                            echo $_POST ? $_POST['email'] : "";
                        }
                        ?>">
                        <div id="e_conf_email"><?php
                            if (isset($error['conf_email'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['conf_email'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Interests  *</label><br>

                        Computing  <input type="checkbox" name="interests[]" value="Computing">
                        History  <input type="checkbox" name="interests[]" value="History">
                        Magic  <input type="checkbox" name="interests[]" value="Magic">
                        Music   <input type="checkbox" name="interests[]" value="Music">
                        <div id="e_interests"><?php
                            if (isset($error['interests'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['interests'] . "</span><br/>");
                            }
                            ?></div>
                    </div>

                    <div class="form-group">
                        <button type="button" id="submit_user" name="submit_user" class="btn btn-primary btn-lg" value="submit">Submit Message</button>
                    </div>
                </div>
            </form> 
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->