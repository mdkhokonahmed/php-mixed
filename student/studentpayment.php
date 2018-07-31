<?php include_once 'lib/Paymentsystem.php';?>
<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

 <?php
     $payment = new Paymentsystem();

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

       $insertpay = $payment->InsertPayment($_POST);  
      }

  ?>
  <div id="wrapper">
     <script type="text/javascript">$(function() {
                $("#datefield").date_input();
                $("#due").date_input();});
        </script>
    

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

      
        <script>
            function callAutoComplete(idname)
            {
                $("#"+idname).autocomplete("stock.php", {
                    width: 160,
                    autoFill: true,
                    mustMatch: false,
                    selectFirst: false
                });
            }
            function checkDublicateName()
            { var k=0;
                for (i=0;i<=400;i=i+6)
                {
                    if($("#0"+i).length>0)
                    {   $k=0;
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
                $.post('check_stock_details.php', {stock_name: $("#"+idname).val() },
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
            {   if(parseFloat($("#payment").val()) > parseFloat($("#subtotal").val()))
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
                    $.post('check_supplier_details.php',{stock_name1: $(this).val() },
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


<div id="page-wrapper">
<div class="container-fluid" style="padding-bottom: 10%">
<div class="row">
<div class="col-lg-12">
  <h1 align="center" class="page-header">
      <small></small>
  </h1>
</div>
</div>
<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary">
      <div class="panel-heading" align="center">
          <h1 class="panel-title">Add Payment Stock</h1>
          <?php
            if (isset($insertpay)) {
              echo $insertpay;
            }
           ?>
      </div>
      <div class="panel-body">
          <div class="row">

              <div class="col-lg-10 col-md-offset-2">
                  <form role="form" name="salesform" method="POST" id="form1" action="" onSubmit="updateSubtotal()">
                      <table   border="0" cellspacing="0" cellpadding="0"  id="dynamictable">

                          <tr>
                              <div class="form-group-md" align="right">
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td><strong>Roll/ID</strong></td>
                                  <td> <input class="form-control" name="stdid" type="text" id="id" style="width:90px;" ></td>
                                  <td>&nbsp;</td>
                                  <td><strong>Date</strong></td>
                                  <td><input class="form-control" type="text" id="datefield" name="toddate" class="date_input" value="<?php echo date('d-m-Y');?>" readonly="" style="width:100px;"></td>
                                  <br>
                                  <br>
                              </div>
                          </tr>
                          <tr>
                              <td width="105">&nbsp;</td>
                              <td width="105">&nbsp;</td>
                              <td width="105">&nbsp;</td>
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
                                  <td><div align="left"><strong>Name</strong></div></td>

                                  <td ><input name="name" class="form-control" type="text"  id="0" style="width:120px;" onFocus="callAutoComplete(this.id)"  onBlur="callAutoAsignValue(this.id)" autocomplete="off"></td>

                                  <td><div align="right"><strong>Department</strong></div></td>
                                   <td>
                              <select class="form-control" name="deptId" style="width:120px">
                          <option>Select Your Department</option>
                          <?php
                             $department = new Adddepartment();
                            $getdept = $department->GetShowDepartment();
                             foreach ($getdept as $showdepartment) {?>
                            
                       <option value="<?php echo $showdepartment['deptId'];?>"><?php echo $showdepartment['departname'];?></option>
                        <?php } ?>
                    </select>
                  </td>

                                       

                                  <td><div align="right"><strong>Month</strong></div></td>
                                  <td><input name="month" class="form-control" type="text" id="00" style="width:50px;" onKeyUp="callQKeyUp(this.id)"></td>

                                  <td><div align="left"><strong>Month Rate:</strong></div></td>
                                  <td><input name="monthrate" class="form-control" type="text" id="000" style="width:80px;" onKeyUp="callRKeyUp(this.id)"></td>

                                  <td><div align="left"><strong>Total:</strong></div></td>
                                  <td><input name="total" class="form-control" type="text" id="000000" readonly="" value="" style="width:120px;text-align:right;" >  </td>
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

                                  <td><img src="stock/images/refresh.png" alt="Refresh" align="absmiddle" onClick="updateSubtotal()"></td>

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
                                  <td><strong>Due:</strong></td>
                                  <td><input name="duetk" class="form-control" type="text" id="balance" style="width:100px; " value="0.00" readonly=""></td>
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
                                          <option   value="cheque">Cheque</option>
                                          <option value="cash" selected>Cash</option>
                                          

                                      </select>
                                  </td>

                                  <td width="77"><strong>Due Date </strong></td>

                      <td width="195"><input type="text" class="form-control"  name="duedate" class="date_input"  style="width:100px;"></td>

                                  <td width="77">&nbsp;</td>
                                  <td>&nbsp;</td>
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
                                  <td><div align="center">
                                         <input class="btn btn-primary" type="reset" name="Reset" value="Reset">
                                      </div></td>
                                  <td>&nbsp;</td>
                                  <td><input type="submit" class="btn btn-primary" name="submit" value="Save" onClick="updateSubtotal()" ></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                              </tr>
                          </div>
                      </table>
                  </form>

              </div>

          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include_once 'inc/footer.php';?>