

<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Welcome to Rasan Mart Online Store</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 
    <style type="text/css">

#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px;
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #FF9324;
}

.invoice .company-details {
    text-align: right;
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0;
}

.company-details .name a {
    color: #AD0311;
}
.invoice .contacts {
    margin-bottom: 20px;
}

.invoice .invoice-to {
    text-align: left;
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0;
    color: #AD0311;
}

.invoice .invoice-details {
    text-align: right;
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #AD0311;
}

.invoice main {
    padding-bottom: 50px;
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px;
    color: #AD0311;
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #AD0311;
    color: #AD0311;
}

.invoice main .notices .notice {
    font-size: 1.2em;
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #FFB06A;
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px;
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #000;
    font-size: 1.2em;
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em;
}

.invoice table .no {
    color: #000;
    font-size: 1.6em;

}

.invoice table .total {
    color: #000;
}

.invoice table tbody tr:last-child td {
    border: none;
}

.invoice table tfoot td {
    background: 0 0;
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
    color: #AD0313;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #AD0313;
    border-top: 1px solid #FFBA78;
    padding: 8px 0
}

thead tr th {
    background-color: #AD0311 !important;
    color: #fff;
}
tr th {
    color: #AD0311;
}

.address {
    color: #AD0313;
}

.email a {
    color: #AD0313;
}

@media print {
   
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px;
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #FF9324;
}

.invoice .company-details {
    text-align: right;
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0;
}

.company-details .name a {
    color: #AD0311;
}
.invoice .contacts {
    margin-bottom: 20px;
}

.invoice .invoice-to {
    text-align: left;
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0;
    color: #AD0311;
}

.invoice .invoice-details {
    text-align: right;
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #AD0311;
}

.invoice main {
    padding-bottom: 50px;
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px;
    color: #AD0311;
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #AD0311;
    color: #AD0311;
}

.invoice main .notices .notice {
    font-size: 1.2em;
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #FFB06A;
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px;
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #000;
    font-size: 1.2em;
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em;
}

.invoice table .no {
    color: #000;
    font-size: 1.6em;

}

.invoice table .total {
    color: #000;
}

.invoice table tbody tr:last-child td {
    border: none;
}

.invoice table tfoot td {
    background: 0 0;
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
    color: #AD0313;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #AD0313;
    border-top: 1px solid #FFBA78;
    padding: 8px 0
}

thead tr th {
    background-color: #AD0311 !important;
    color: #fff;
}
tr th {
    color: #AD0311;
}

.address {
    color: #AD0313;
}

.email a {
    color: #AD0313;
}
thead tr th {
    background-color: #AD0311 !important;
    color: #fff;
}
}
</style>
</head>
<body>
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right" style="text-align: right !important;">
        <button id="printInvoice" class="btn btn-md" style="background-color:#AD0313; color:#fff;width:10%"><i class="fa fa-print"></i> Print</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://www.rasanmart.com">
                            <img src="http://rasanmart.nepyantra.com/images/logo.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://www.rasanmart.com">
                           Rasan Mart Pvt. Ltd.
                            </a>
                        </h2>
                        <div>Kalimati-14, Kathmandu, Nepal</div>
                        <div>01-5355000 | 9866551111</div>
                        <div>info@rasanmart.com</div>
                    </div>
                </div>
            </header>
            <main>
            @foreach($vendor as $key=>$vendors)
           
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Messaged BY:</div>
                        <h2 class="to">{{$vendors['client_name']}}</h2>
                        <div class="address">Vendor Type: RAS-{{$vendors['vendor_type']}}</div>
                        <div class="address">{{$vendors['email']}}</div>
                        <div class="address">{{$vendors['address']}}</div>
                        <div class="email"><a href="mailto:{{$vendors['email']}}">{{$vendors['email']}}</a></div>
                    </div>
  
                </div>
              
                
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>

                        <tr>
                            
                            <th class="text-left">Client Name</th>
                            <th class="text-right">Company Name</th>
                            <th class="text-right">Brand Name</th>
                            <th class="text-right">Vendor Type</th>
                            <th class="text-right">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <tr>
                      

                           
                            <td class="text-left">
                            {{$vendors['client_name']}}
                            </td>
                            <td class="unit">
                            {{$vendors['company_name']}}
                            </td>
                            <td class="qty">{{$vendors['brand_name']}}</td>
                            <td class="total"> {{$vendors['vendor_type']}}</td>
                            <td class="total"> {{$vendors['phone']}}</td>
                        </tr>
                        
              
                    </tbody>
                    
                    
                    
                </table>
                @endforeach
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">We have received the vendor intrest Message through the website.</div>
                </div>
            </main>
            <footer>
                Message was created on a computer and is valid without the signature and seal.
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
</body>
</html>