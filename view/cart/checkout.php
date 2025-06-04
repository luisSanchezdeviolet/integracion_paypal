 <!-- section start -->
    <section class="section-b-space" id="page-checkout">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Detalle de Pedido</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Nombres</div>
                                        <input type="text" id="vent_nom" name="vent_nom" value="Fernando" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Apellidos</div>
                                        <input type="text" id="vent_ape" name="vent_ape" value="cruz" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Telefono</div>
                                        <input type="text" id="vent_telf" name="vent_telf" value="2293209203" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email</div>
                                        <input type="text" id="vent_email" name="vent_email" value="bitepromos@gmail.com" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Pais</div>
                                        <select name="vent_pais" id="vent_pais">
                                            <option selected>Mexico</option>
                                            <option>Colombia</option>
                                            <option>Estados Unidos</option>
                                            <option>Peru</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Direccion</div>
                                        <input type="text" id="vent_dire" name="vent_dire" value="jagua 132" placeholder="Street address">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Ciudad</div>
                                        <input type="text" id="vent_depa" name="vent_depa" value="leon" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Estado</div>
                                        <input type="text" id="vent_provin" name="vent_provin" value="Guanajuato" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Codigo postal</div>
                                        <input type="text" id="vent_codpostal" name="vent_codpostal" value="35790" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Producto <span>Total</span></div>
                                        </div>
                                        <ul class="qty" id="listDetalleCheckout">
                                            <li>Pink Slim Shirt × 1 <span>$25.10</span></li>
                                            <li>SLim Fit Jeans × 1 <span>$555.00</span></li>
                                        </ul>
                                        <ul class="sub-total">
                                            <li>Subtotal <span class="count" id="subtotalCheckout">MXN 00.00</span></li>
                                        </ul>
                                        <ul class="total">
                                            <li>Total <span class="count" id="totalCheckout">MXN 00.00</span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" name="payment-group" id="payment-3" checked>
                                                            <label for="payment-3">PayPal<span class="image"><img src="../../assets/images/paypal.png" alt=""></span></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row cart-buttons">
                                            <div class="col-6">
                                                <a href="" class="btn-solid btn" id="returnPage">Regresar</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="btn-solid btn" id="btnPaypal">Realizar Pedido</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>