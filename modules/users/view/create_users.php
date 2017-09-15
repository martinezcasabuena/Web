<section id="contact-page">
    <div class="container">
        <div class="center">
            <h2>Nueva Factura</h2>
            <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <form id="form" method="post" action="index.php?module=users">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Nombre *</label>
                        <input type="text" name="name" placeholder="Nombre  " class="form-control" required="required" value="<?php
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
                        <label>Apellidos *</label>
                        <input type="text" name="last_name" placeholder="Apellidos" class="form-control" required="required" value="<?php
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
                        <label>Fecha Factura *</label><br />
                        <input id="bill_date" type="text" name="bill_date" placeholder="mm/dd/yyyy"  class="form-control"  value="<?php
                        if (!isset($error['bill_date'])) {
                            echo $_POST ? $_POST['bill_date'] : "";
                        }
                        ?>">
                        <div id="e_bill_date"><?php
                            if (isset($error['bill_date'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['bill_date'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Dirección*</label><br />
                        <input id="address" type="text" name="address" placeholder="Dirección" required="required" class="form-control"value="<?php
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
                        <label>Forma de pago</label><br />
                        <select name="en_lvl" id="en_lvl">
                            <option selected>Selecciona la forma de pago</option>
                            <option value="contado">Contado</option>
                            <option value="transferencia">Transferencia bancaria</option>
                            <option value="tarjeta">Tarjeta de crédito</option>
                            <option value="pagare">Pagaré</option>
                            <option value="cheque">Cheque</option>
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
                        <label>NIF *</label>
                        <input type="text" name="nif" placeholder="NIF" class="form-control" required="required" value="<?php
                        if (!isset($error['nif'])) {
                            echo $_POST ? $_POST['nif'] : "";
                        }
                        ?>">
                        <div id="e_nif"><?php
                            if (isset($error['nif'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['nif'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input type="password" name="pass" placeholder="pass" class="form-control" required="required">
                        <div id="e_pass"><?php
                            if (isset($error['pass'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['pass'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password *</label>
                        <input type="password" name="conf_pass" placeholder="confirm pass" class="form-control" required="required">
                        <div id="e_conf_pass"><?php
                            if (isset($error['conf_pass'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['conf_pass'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <div class="form-group">
                        <label>E-mail *</label>
                        <input type="email" name="email" placeholder="e-mail" class="form-control" required="required" value="<?php
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
                        <input type="email" name="conf_email" placeholder="confirm e-mail" class="form-control" required="required" value="<?php
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
                        <button type="submit" name="submit_user" class="btn btn-primary btn-lg" value="submit">Submit Message</button>
                    </div>
                </div>
            </form>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->
