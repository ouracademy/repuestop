@extends('InProcess.layoutReporter')
@section('content')
			
		

			<!-- main-container start -->
			<!-- ================ -->
			<section class="reporter-container">
				<div class="container head-report">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="info-bussines text-center">
								<div id="logo" class="info-image">  
	                           	 <img src="{{asset('assets/images/logos/main.PNG')}}" class="img-responsive" alt="Cinque Terre" width="100%" height="100%"> 
	                        	</div>
	                        	<p>Cesar Antonio Medina</p>
	                        	<p><i class="fa fa-map-marker pr-5 pl-10"></i>Inversiones Medina Bussines E.I.R.L</p>
								</div>
								
						</div>
						<div class="col-xs-6 col-sm-6  col-md-6">
							<div class="report-pay text-center">
								<div  class="report-square text-center">
									<h4>R.U.C 101010</h4>
									<h4>FACTURA</h4>
									<h4>N³ 12525</h4>
	                          	</div>
							</div>
						</div>
					</div>
				</div>

				<div class="container">

					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">
								<table class="table">
								<thead>
									<tr>
										<th colspan="2">Informacion del Cliente </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Señor(es)</td>
										<td class="information">YYYYYXXXX</td>
									</tr>
									<tr>
										<td>Telefono</td>
										<td class="information">+00 123 123 1234</td>
									</tr>
									<tr>
										<td>Direccion</td>
										<td class="information">One infinity loop, 54100, United States</td>
									</tr>
									<tr>
										<td>Informacion de Venta</td>
										<td class="information">
											<table class="table">
												<tbody>
											<td>RUC:</td>
											<td></td>
											<td>Nro. Cheque</td>
											<td></td>
										</tbody>
										    </table>
										</td>
											
									</tr>
								</tbody>
							</table>
							<table class="table cart">
								<thead>
									<tr>
										<th>Producto </th>
										<th>Precio </th>
										<th>Cantidad</th>
										<th>Unidad</th>
										<th class="amount">Total </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="product"><a href="shop-product.html">Product Title 1</a> <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas inventore modi.</small></td>
										<td class="price">$99.50 </td>

										<td class="quantity">
											<div class="form-group">
												<input type="text" class="form-control" value="2" disabled>
											</div>											
										</td>
										<td >Docenas </td>
										<td class="amount">$199.00 </td>
									</tr>
									<tr>
										<td class="product"><a href="shop-product.html">Product Title 2</a> <small>Quas inventore modi</small></td>
										<td class="price"> $99.66 </td>
										<td class="quantity">
											<div class="form-group">
												<input type="text" class="form-control" value="3" disabled>
											</div>											
										</td>
										<td >Unidades </td>
										
										<td class="amount">$299.00 </td>
									</tr>
									<tr>
										<td class="product"><a href="shop-product.html">Product Title 3</a> <small>Fugiat nemo enim officiis repellendus</small></td>
										<td class="price"> $499.66 </td>
										<td class="quantity">
											<div class="form-group">
												<input type="text" class="form-control" value="3" disabled>
											</div>											
										</td>
										<td >Unidades </td>
										
										<td class="amount">$1499.00 </td>
									</tr>
									<tr>
										
										<td class="total-quantity" colspan="4">Subtotal</td>

										<td class="amount">$1997.00</td>
									</tr>
									<tr>										
										<td class="total-quantity" colspan="3">Descuento</td>
										<td class="price">Promocion R1</td>
										<td class="amount">-20%</td>
									</tr>
									<tr>
										<td class="total-quantity" colspan="4">Total 8 Items</td>
										<td class="total-amount">$1597.00</td>
									</tr>
								</tbody>
							</table>
							<div class="space-bottom"></div>
						
							<div class="space-bottom"></div>
							<table class="table">
								<thead>
									<tr>
										<th colspan="2">Adicional </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Condicion</td>
										<td class="information">A cuenta </td>
									</tr>
									
								
								</tbody>
							</table>
							<div class="space-bottom"></div>
						
							<div class="text-right">	
								<a href="shop-checkout-payment.html" class="btn btn-group btn-default"><i class="icon-left-open-big"></i> Regresar</a>
								<a href="shop-checkout-completed.html" class="btn btn-group btn-default"><i class="icon-check"></i> Imprimir</a>
							</div>

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>	

@endsection
@section('ownerScript')

		$(document).ready(function() {
			
			//TableManageResponsive.init();
		});
@endsection
		

