@extends('pages.master')

@section('title')
Add-Purchases
@endsection

@section('homecontent')
        <link rel="icon" href="{{asset('public/stock/')}}/Knight/favicon.png" type="image/png">
        <link href="{{asset('public/stock/')}}/Knight/css/style.css" rel="stylesheet" type="text/css">
    
        <script src="{{asset('public/stock/')}}/lib/jquery.ajaxQueue.js"></script>
        <script src="{{asset('public/stock/')}}/js/jquery.js"></script>
        <script type="text/javascript" src="{{asset('public/stock/')}}/js/jquery.js"></script>
        <script src="{{asset('public/stock/')}}/js/jquery.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="{{asset('public/stock/')}}/css/date_input.css" type="text/css">
        <script type="text/javascript" src="{{asset('public/stock/')}}/js/jquery.date_input.js"></script>

        <script type="text/javascript">$(function() {
                $("#datefield").date_input();
                $("#due").date_input();});
        </script>
        
        <script type='text/javascript' src='{{asset('public/stock/')}}/lib/jquery.bgiframe.min.js'></script>
        <script type='text/javascript' src='{{asset('public/stock/')}}/js/jquery.autocomplete.js'></script>
        <link rel="stylesheet" type="text/css" href="{{asset('public/stock/')}}/css/jquery.autocomplete.css" />
        <script type="text/javascript" src="{{asset('public/stock/')}}/js/jquery-dynamic-form.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#duplicate").dynamicForm("#plus", "#minus", {limit:50, createColor: 'yellow',removeColor: 'green'});
            });
        </script>

        <script type="text/javascript">
            $().ready(function() {
                function log(event, data, formatted) {
                    $("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
                }
                function formatItem(row) {
                    return row[0] + " (<strong>id: " + row[1] + "</strong>)";
                }
                function formatResult(row) {
                    return row[0].replace(/(<.+?>)/gi, '');
                }
                $("#supplier").autocomplete("supplier1.php", {
                    width: 160,
                    autoFill: true,
                    mustMatch: true,
                    selectFirst: false
                });
            });
        </script>

        <script src="{{asset('public/stock/')}}/js/jquery.validationEngine.js" type="text/javascript"></script>
        <script src="{{asset('public/stock/')}}/js/jquery.hotkeys-0.7.9.js"></script>
        <script type='text/javascript' src='{{asset('public/stock/')}}/lib/jquery.ajaxQueue.js'></script>
        <script>
            function callAutoComplete(idname)
            {
                $("#"+idname).autocomplete("", {
                    width: 160,
                    autoFill: true,
                    mustMatch: false,
                    selectFirst: false
                });
            }
            function checkDublicateName()
            {	var k=0;
                for (i=0;i<=400;i=i+6)
                {
                    if($("#0"+i).length>0)
                    {		$k=0;
                        for (j=0;j<=400;j=j+6)
                        {
                            if($("#0"+j).length>0 && $("#0"+i).val()==$("#0"+j).val())
                            {
                                $k++;
                            }
                        }
                        if($k>1)
                        {
                            alert("Dublicate stock Entry. please remove new and add stock in existing one !");
                        }
                    }
                }
            }

            function callAutoAsignValue(idname)
            {
                var name1 = parseInt(idname,10);
                var quantity1 = name1+1;
                var brate1 =  quantity1+1;
                var srate1 =  brate1+1;
                var avail1 = srate1+1;
                var total1 = avail1+1;
                if(parseInt(idname)>0)
                {
                    quantity1="00"+quantity1;
                    brate1="000"+brate1;
                    srate1="0000"+srate1;
                    avail1="00000"+avail1;
                    total1="000000"+total1;
                }
                else
                {
                    quantity1="00";
                    brate1="000";
                    srate1="0000";
                    avail1="00000";
                    total1="000000";
                }
                $.post('', {stock_name: $("#"+idname).val() },
                    function(data){
                        $("#"+brate1).val(data.buyingrate);
                        $("#"+srate1).val(data.sellingprice);
                        $("#"+avail1).val(data.available);
                        $("#quantity").focus();
                    }, 'json');
                checkDublicateName();

            }
            function callQKeyUp(Qidname)
            {
                var quantity = parseInt(Qidname,10);
                var brate =  quantity+1;
                var srate =  brate+1;
                var avail = srate+1;
                var total = avail+1;
                var rowcount = parseInt((total+1)/5);
                if(rowcount==0)
                    rowcount=1;

                if(parseInt(Qidname)>0)
                {
                    quantity="00"+quantity;
                    brate="000"+brate;
                    srate="0000"+srate;
                    avail="00000"+avail;
                    total="000000"+total
                }
                else
                {
                    quantity="00";
                    brate="000";
                    srate="0000";
                    avail="00000";
                    total="000000";
                }
                var result= parseFloat($("#"+quantity).val()) * parseFloat( $("#"+brate).val() );
                result=result.toFixed(2);
                $("#"+total).val(result);
                updateSubtotal();
            }
            function balanceCalc()
            {		if(parseFloat($("#payment").val()) > parseFloat($("#subtotal").val()))
                $("#payment").val(parseFloat($("#subtotal").val()));
                var result= parseFloat($("#subtotal").val()) - parseFloat( $("#payment").val() );
                result=result.toFixed(2);
                $("#balance").val(result);
            }
            function updateSubtotal()
            {
                var temp=0;
                for (i=5;i<=400;i=i+6)
                {
                    if($("#000000"+i).length>0)
                    {
                        temp=parseFloat(temp)+parseFloat($("#000000"+i).val());
                    }
                }
                var subtotal=parseFloat(temp);

                if($("#000000").length>0)
                {
                    var firstrowvalue=$("#000000").val();
                    subtotal=parseFloat(subtotal)+parseFloat(firstrowvalue);
                }
                subtotal=subtotal.toFixed(2);
                $("#subtotal").val(subtotal);
            }

            function callRKeyUp(Ridname)
            {
                var brate = parseInt(Ridname,10);
                var quantity =  brate-1;
                var srate =  brate+1;
                var avail = srate+1;
                var total = avail+1;
                callQKeyUp(brate-1)

            }
            $(document).ready(function() {
                // SUCCESS AJAX CALL, replace "success: false," by:success : function() { callSuccessFunction() },
                $("#billnumber").focus();
                $("#supplier").blur(function()
                {
                    $.post('',{stock_name1: $(this).val() },
                        function(data){
                            $("#address").val(data.address);
                            $("#contact1").val(data.contact1);
                            $("#contact2").val(data.contact2);
                            if(data.address!=undefined)
                                $("#0").focus();

                        }, 'json');
                });
            });
        </script>

<div class="row">
<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
<hr/>
<div class="col-lg-12">
<div class="panel panel-primary">
<div class="panel-heading" align="center">
<h1 class="panel-title">Add Purchases Stock</h1>
</div>
<div class="panel-body">
<div class="row">

<div class="col-lg-10 col-md-offset-2">
{!! Form::open( [ 'url'=>'/purchases/save', 'method' =>'POST', 'class' =>'form-horizontal' ] ) !!}

<table   border="0" cellspacing="0" cellpadding="0"  id="dynamictable">

  
    
    <tr>
        <div class="form-group-md" align="center">
           
            <td><strong>Supplier Name</strong></td>
            <td><input class="form-control" name="supplier" type="text" id="supplier"  value="" style="width:100px;" autocomplete="off" required></td>
            <td>&nbsp;</td>

            <td><strong>Address</strong></td>
            <td><textarea class="form-control" name="address1" id="address" style="width:100px;"></textarea></td>
            <td>&nbsp;</td>
            <td>
                <strong>Phone</strong>
                <br><br><br>
                <strong>Email</strong>
            </td>
            <td><input name="phone" class="form-control" type="text" id="phone"  value="" style="width:100px;">
                <br>
                <input name="email" class="form-control" type="text" id="email"  value="" style="width:100px;" >
            </td>
        </div>
    </tr>
    <tr>
        <td width="105">&nbsp;</td>
        <td width="105">&nbsp;</td>
        <td width="105">&nbsp;</td>
    </tr>
</table>
<table  border="0" cellspacing="0" cellpadding="0"  id="duplicate" style="">

    <tr>
        <div class="form-group-md" align="right">
            <td ><div align="left"><strong>Name</strong></div></td>
            <td ><input name="name" class="form-control" type="text"  id="0" style="width:120px;" onFocus="callAutoComplete(this.id)"  onBlur="callAutoAsignValue(this.id)" autocomplete="off"></td>

            <td><div align="right"><strong>Qty</strong></div></td>

            <td><input name="quantity" class="form-control" type="text" id="00" style="width:50px;" onKeyUp="callQKeyUp(this.id)"></td>

            <td><div align="left"><strong>Buy Rate:</strong></div></td>

            <td><input name="brate" class="form-control" type="text" id="000" style="width:80px;" onKeyUp="callRKeyUp(this.id)"  ></td>

            <td><strong>Sales Rate</strong> </td>

            <td><input name="srate" class="form-control" type="text" id="0000" style="width:80px;"  ></td>

        
            <td><div align="left"><strong>Total:</strong></div></td>
            <td><input name="total" class="form-control" type="text" id="000000" readonly="" value="" style="width:120px;text-align:right;"></td>
            <td width="50"><p><span><a id="minus" href="">[-]</a> <a id="plus" href="">[+]</a></span></p></td>
        </div>
    </tr>

    <tr>
        <td width="105">&nbsp;</td>
        <td width="105">&nbsp;</td>
        <td width="105">&nbsp;</td>
    </tr>

</table>
<tr>
    <td width="105">&nbsp;</td>
    <td width="105">&nbsp;</td>
    <td width="105">&nbsp;</td>
</tr>


<table  border="0" align="left" cellpadding="0" cellspacing="0"  id="duplicate" style="">
    <div class="form-group-md">
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>

        </tr>
        <tr>
            <td><strong>Payment:</strong></td>
            <td><input type="text" class="form-control" name="payment" style="width:100px; " id="payment" class="validate[required,custom[onlyFloat],lengthCheck[6]] text-input" onKeyUp="balanceCalc()"></td>
            <td><div align="left"><strong>Description</strong></div></td>
            <td rowspan="2"><textarea class="form-control" name="description" style="width:150px; height:70px; "></textarea></td>

            <td><strong>Sub Total </strong></td>
            <td>&nbsp;</td>
            <td><input name="subtotal" class="form-control" id="subtotal" type="text" readonly="" style="width:100px; text-align:right; color:#333333; font-weight:bold; font-size:16px;"></td>
            <td><img src="{{asset('public/stock/')}}/images/refresh.png" alt="Refresh" align="absmiddle" onClick="updateSubtotal()"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="105">&nbsp;</td>
            <td width="105">&nbsp;</td>
            <td width="105">&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Balance:</strong></td>
            <td><input name="balance" class="form-control" type="text" id="balance" style="width:100px; " value="0.00" readonly=""></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="center"></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>

            <td width="55"><strong>Mode:</strong></td>

            <td >
                <select class="btn btn-default dropdown-toggle" name="mode">
                    <option value="1">Cheque</option>
                    <option value="0">Cash</option>
                   

                </select>
            </td>

          
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="center">
                   <input class="btn btn-primary" type="reset" name="Reset" value="Reset">
                </div></td>
            <td>&nbsp;</td>
            <td><input type="submit" class="btn btn-primary" name="Submit" value="Save" onClick="updateSubtotal()" ></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </div>
</table>
  {!! Form::close() !!}

</div>

</div>
</div>
</div>
</div>
</div>


@endsection


