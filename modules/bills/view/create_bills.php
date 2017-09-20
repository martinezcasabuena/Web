<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">

<script type="text/javascript" src="modules/bills/view/js/bills.js"></script>
<section id="bills-page">
    <div class="container">
        <div class="center">
            <h2>Nueva Factura</h2>
            <p class="lead">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <form id="form_bill" method="post">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Nombre *</label>
                        <input id="name" type="text" name="name" placeholder="Nombre  " class="form-control" required="required" value="<?php
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
                        <input id="last_name" type="text" name="last_name" placeholder="Apellidos" class="form-control" required="required" value="<?php
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
                        <label>NIF *</label><br />
                        <input id="nif" type="text" name="nif" placeholder="NIF" required="required" class="form-control"value="<?php
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
                        <label>E-mail *</label>
                        <input id="email" type="email" name="email" placeholder="e-mail" class="form-control" required="required" value="<?php
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
                        <label>Fecha Servicio *</label><br />
                        <input id="service_date" type="text" name="service_date" placeholder="mm/dd/yyyy"  class="form-control"  value="<?php
                        if (!isset($error['service_date'])) {
                            echo $_POST ? $_POST['service_date'] : "";
                        }
                        ?>">
                        <div id="e_service_date"><?php
                            if (isset($error['service_date'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['service_date'] . "</span><br/>");
                            }
                            ?></div>
                    </div>

                    <div class="form-group">
                        <label>Forma de pago *</label><br />
                        <select name="paid_form" id="paid_form">
                            <option selected>Selecciona la forma de pago</option>
                            <option value="contado">Contado</option>
                            <option value="transferencia">Transferencia bancaria</option>
                            <option value="tarjeta">Tarjeta de crédito</option>
                            <option value="pagare">Pagaré</option>
                            <option value="cheque">Cheque</option>
                        </select>
                        <div id="e_paid_form"><?php
                            if (isset($error['paid_form'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['paid_form'] . "</span><br/>");
                            }
                            ?></div>
                    </div>

                </div>
                <div class="col-sm-5">
                    </div>
                    <div class="form-group">
                        <label>Tipo de servicio  *</label><br>

                        <br>Computing  <input type="checkbox" name="service[]" value="Computing"></br>
                        <br>History  <input type="checkbox" name="service[]" value="History"></br>
                        <br>Magic  <input type="checkbox" name="service[]" value="Magic"></br>
                        <br>Music   <input type="checkbox" name="service[]" value="Music"></br>
                        <div id="e_service"><?php
                            if (isset($error['service'])) {
                                print ("<BR><span style='color: #ff0000'>" . "* " . $error['service'] . "</span><br/>");
                            }
                            ?></div>
                    </div>
                    <br />
                    <div class="form-group" id="progress">
                        <div id="bar"></div>
                        <div id="percent">0%</div >
                    </div>

                    <div class="msg"></div>
                    <br/>
                    <div id="dropzone" class="dropzone"></div><br/>
                    <br/>
                    <br/>
                    <br/>

                    <div class="form-group">
                        <button type="button" id="submit_bill" name="submit_bill" class="btn btn-primary btn-lg" value="submit">Submit Message</button>
                    </div>
                </div>
            </form>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->
