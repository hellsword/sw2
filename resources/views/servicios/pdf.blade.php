<!DOCTYPE html>
<head>




<!--Estilos y JS de la plantilla katniss -->

</head>

<body>

<div class="mainwrapper">
    
   
<div class="logopanel">
            <h1>Cupón de Pago <span></h1>
        </div><!--logopanel-->
        
        <div class="maincontent">
            <div class="contentinner">
                
                <div class="row-fluid">
                
                <div class="span6">

                  
                  <table class="table table-bordered table-invoice">
                      <tr>
                          <td class="width30">RUT CLIENTE:</td>
                          <td class="width70"><strong>{{ Auth::user()->rut}}</strong></td>
                      </tr>
                      <tr>
                        <td>Nombre:</td>
                        <td>{{ Auth::user()->nombre}} {{ Auth::user()->apellido}}</td>
                    </tr>

                     @foreach($anuncio as $an)
                    
                        <tr>
                          <td>Anuncio: </td>
                          <td>{{$an->titulo}}</td>
                      </tr>
                  </table>
                </div><!--span6-->
            
                <div class="span6">
               
                  <br />
                  <table class="table table-bordered table-invoice">
                      <tr>
                          <td class="width30">N° Comprobante:</td>
                          <td class="width70"><strong>{{$comprobante}}</strong></td>
                      </tr>
                      <tr>
                        <td>Fecha emisión:</td>
                        <td><strong>{{$fecha}}</strong></td>
                    </tr>
                        <tr>
                          <td>Convenio de recaudación:</td>
                          <td><strong>SERVIPAG| BANCO SANTANDER</strong></td>
                      </tr>
                  </table>
                </div><!--span6-->
                
            </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
            
            <table class="table table-bordered table-invoice-full">
                    <colgroup>
                        <col class="con0 width15" />
                        <col class="con1 width45" />
                        <col class="con0 width5" />
                        <col class="con1 width15" />
                        <col class="con0 width20" />
                    </colgroup>
                    <thead>

                        <tr>
                            <th class="head0">N° Cuenta</th>
                            <th class="head1">Duración del Anuncio</th>
                            <th class="head0 right">Vencimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>890</td>
                            <td>{{$duracion}} Meses</td>
                            <td class="right">{{$fechaV}}</td>
                        </tr>
            
         @endforeach

                    </tbody>
                </table>
                                
                <table class="table invoice-table">
                    <colgroup>
                        <col class="con0 width60" />
                        <col class="con0 width20" />
                        <col class="con1 width20" />
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="msg-invoice">
                                <h4>Mensaje:</h4>
                                <p>El pago de nuestros servicios por medio de cupones es una facilidad que entrega MUMEFLET para nuestros clientes, sino cumple con el plazo definido en el cupon este ya no sera util y su aviso no se publicara. </p>
                            </td>
                            <!---
                            <td class="right">
                                <strong>Subtotal</strong> <br />
                                <strong>Tax (5%)</strong> <br />
                                <strong>Discount</strong>
                            </td>
                            <td class="right"><strong>$6,000 <br />$600 <br />$50</strong></td>
                            -->
                        </tr>
                    </tbody>
          </table>
            
          <div class="amountdue">
            <h1><span>Monto Pesos:</span> {{$total}}</h1> <br />
           
          </div>
          
          
                
                
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    <table>
    <tr>
       <td>
            <img src='https://barcode.tec-it.com/barcode.ashx?translate-esc=off&data=ABC-1234&code=Code39&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' alt='Barcode Generator TEC-IT'/>
        </td>
    </tr>
</table>
 
</body>
</html>
