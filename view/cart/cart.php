<section class="cart-section section-b-space" id="page-cart">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <button id="btnAgregar" class="btn btn-solid">Agregar Producto</button><br><br>
                </div>
                <div class="col-sm-12">
                    <div class="cart_counter">
                        <div class="countdownholder">
                            Su carrito expira en<span id="timer"></span> minutos!
                        </div>
                        <a href="checkout.html" class="cart_checkout btn btn-solid btn-xs">Pagar</a>
                    </div>
                </div>
                <div class="col-sm-12 table-responsive-xs">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Accion</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="listDetalle">
                            
                        </tbody>
                    </table>
                    <div class="table-responsive-md">
                        <table class="table cart-table ">
                            <tfoot>
                                <tr>
                                    <td>Total :</td>
                                    <td>
                                        <h2 id="vent_total_cart">MXN 00</h2>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"></div>
                <div class="col-6"><a href="#" class="btn btn-solid" id="btn-pay">Pagar</a></div>
            </div>
        </div>
    </section>