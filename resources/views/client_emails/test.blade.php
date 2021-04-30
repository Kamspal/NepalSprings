<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @Yogendra-->
<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://www.rasanmart.com">
                            <img src="https://www.rasanmart.com/wp-content/uploads/2017/12/cropped-lpgo.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                           Rasan Mart Pvt. Ltd.
                            </a>
                        </h2>
                        <div>Kalimati</div>
                        <div>(123) 456-789</div>
                        <div>company@example.com</div>
                    </div>
                </div>
            </header>
            <main>
            @foreach($order as $orders)
            <?php 
        $user=DB::table('users')->where('id',$orders['user_id'])->first();
         
        
            ?>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{$user->name}}</h2>
                        <div class="address">{{$user->address}}</div>
                        <div class="email"><a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
                    </div>

                
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 3-2-1</h1>
                        <div class="date">Date of Invoice: 01/10/2018</div>
                        
                    </div>
                </div>
              
                
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th class="text-left">Product Name</th>
                            <th class="text-right">Regular PRICE</th>
                            <th class="text-right">Sale Price</th>
                            <th class="text-right">QTY</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                   <tr>
                   <?php
                           
                           $o=json_decode($orders['product_id']);
                           $oder_qty=json_decode($orders['order_qty']);
                           $total_amount_calculated=json_decode($orders['total_amount_calculated']);
                           $total_regular=0;
                              ?>

                               
                              @foreach($o as $key=>$or)
                                   {{$or}}
                                   <?php $product=DB::table('products')->select('product_name','product_image','regular_price','sale_price')->where('id',$or)->first();
                               ?>
                       <td class="no">{{'0RAS2021'.$orders['user_id']}}</td>
                       <td class="text-left"><h3>
                           <a target="_blank">
                           <?php
                               echo $product->product_name; ?>
                           </a>
                           </h3>
                          <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                              Useful videos
                          </a> 
                          to improve your Javascript skills. Subscribe and stay tuned :)
                       </td>
                       <td class="unit">$<?php
                               echo $product->regular_price; ?></td>
                               <td class="unit">$<?php
                               echo $product->sale_price;
                           
                               $discount[$key]=$product->regular_price-$product->sale_price;
                               $product_with_qty=$product->regular_price*$oder_qty[$key];
                               $total_regular=$total_regular+$product_with_qty;
                              
                           ?></td>
                       <td class="qty">{{$oder_qty[$key]}}</td>
                       <td class="total">${{$total_amount_calculated[$key]}}</td>
               
                   </tr>
                   
         
               </tbody>
               @endforeach
                   
                   
                    
                    
                </table>
                @endforeach
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">You have received the free delivery with the shopping exceeding NPR 999.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>