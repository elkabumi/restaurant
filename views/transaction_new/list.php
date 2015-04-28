<script type="text/javascript">


function CurrencyFormat(number)
{
   var decimalplaces = 0;
   var decimalcharacter = "";
   var thousandseparater = ",";
   number = parseFloat(number);
   var sign = number < 0 ? "-" : "";
   var formatted = new String(number.toFixed(decimalplaces));
   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
   var integer = "";
   var fraction = "";
   var strnumber = new String(formatted);
   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
   if( dotpos > -1 )
   {
      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
      fraction = strnumber.substr(dotpos+1);
   }
   else { integer = strnumber; }
   if( integer ) { integer = String(Math.abs(integer)); }
   while( fraction.length < decimalplaces ) { fraction += "0"; }
   temparray = new Array();
   while( integer.length > 3 )
   {
      temparray.unshift(integer.substr(-3));
      integer = integer.substr(0,integer.length-3);
   }
   temparray.unshift(integer);
   integer = temparray.join(thousandseparater);
   return sign + integer + decimalcharacter + fraction;
}



function add_menu(id)
{
	
	var member_id = document.getElementById("i_member_id").value;
	var table_id = document.getElementById("i_table_id").value;
	
	window.location.href = 'transaction_new.php?page=add_menu&member_id='+member_id+'&menu_id='+id+'&table_id'+table_id;
	
	/*$("#MyTable").append('<tr valign="top"><th scope="row"><label for="customFieldName">Custom Field</label></th><td><input type="text" class="code" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp; <input type="text" class="code" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp; <a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
*/
}

function edit_menu(id)
{
	
	var jumlah = document.getElementById("i_jumlah_"+id).value;
	
	document.getElementById("i_jumlah_"+id).value = jumlah;
	get_total_price();
	// $("#table_treatment").load('treatment.php?page=form_add_treatment&planting_process_id='+id); 
}

function get_total_price(){
	
	var total_harga = 0;
	<?php
	while($row2 = mysql_fetch_array($query2)){
	?>
	var jumlah = document.getElementById("i_jumlah_"+<?= $row2['menu_id']?>).value; 
	var harga = document.getElementById("i_harga_"+<?= $row2['menu_id']?>).value; 
	
	var total = jumlah * harga;
	total_harga = total_harga + total;
	<?php
	}
	?>
	document.getElementById("i_total_harga").value = total_harga;
	document.getElementById("i_total_harga_rupiah").value = CurrencyFormat(total_harga);
}

function confirm_delete(id){
	var a = confirm("Anda yakin ingin menghapus order ini ?");
	var table_id = document.getElementById("i_table_id").value;
	
	if(a==true){
		window.location.href = 'transaction.php?page=delete&table_id=' + table_id + '&id=' + id;
	}
}

function load_data(id)
{
	//alert(id);
	$("#table").load('transaction.php?page=list&table_id='+id); 
}
	
	
	/* 
 function addRow() {
        var myRow = '<tr><td>C</td><td>3</td><td>C</td><td>3</td><td>C</td><td><a href="javascript:void(0);" class="delete_row">Remove</a></td></tr>';
            $("#MyTable tbody tr:last").after(myRow);
 }*/
 

$(document).ready(function(){
    $("#i_menu_id").onchange(function(){
        $("#MyTable").append('<tr valign="top"><th scope="row"><label for="customFieldName">Custom Field</label></th><td><input type="text" class="code" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp; <input type="text" class="code" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp; <a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
    });
    
    $("#customFields").on('click', '.remCF', function(){
        $(this).parent().parent().remove();
    });
    
});


</script>
	
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-warning alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Menu masih kosong, Pilih menu terlebih dahulu !
                </div>
           
                </section>
                <?php
                }
                ?>
       
        
      
                

<!-- Main content -->
<section class="content">

            <div class="row">
            
            
            
            <div class="col-xs-4">
            <div class="form-group">
             <label>Tanggal </label>
             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            </div>
            
             <div class="col-xs-4">
             <div class="form-group">
                                         <label>Member </label>
                                        <select name="i_member_id" id="i_member_id"  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                        <option value="0">Non Member</option>
                                        <?php
                                        $query_member = mysql_query("select a.*
																	from members a																
																	order by member_id
																	");
                                        while($row_member = mysql_fetch_array($query_member)){
                                        ?>
                                        <option value="<?= $row_member['member_id']?>"><?php
										
										echo $row_member['member_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div>  
            
             <div class="col-xs-4">
             <div class="form-group">
                                         <label>Meja </label>
                                        <select name="i_table_id" id="i_table_id"  class="selectpicker show-tick form-control" data-live-search="true" onChange="load_data(this.value)" >
                                        <?php
                                        $query_table = mysql_query("select a.*, b.building_name
																	from tables a
																	left join buildings b on b.building_id = a.building_id
																	order by table_id
																	");
                                        while($row_table = mysql_fetch_array($query_table)){
                                        ?>
                                        <option value="<?= $row_table['table_id']?>" <?php if($row_table['table_id'] == $table_id){ ?> selected="selected"<?php }?>><?php
										if($row_table['table_id'] != 0){
											$building = " (".$row_table['building_name'].")";
										}else{
											$building= "";
										}
										echo $row_table['table_name'].$building; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      	</div>
            </div>  
            </div>
            
            <!-- list menu -->
            
             <div class="row">
                        <div class="col-xs-12">
                            
                            
                            
                            <div class="box">
                             
                               
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th width="35%">Nama Menu</th>
												<th width="20%">Price</th>
                                                <th width="20%">Discount</th>
                                                  <th width="10%">Qty</th>
                                                  <th width="20%">Total Price</th>
                                                   <th width="10%">Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                          <tr >
                                         
                                          </tr>
                                          
                                          

                                          
                                        </tbody>
                                         <tfoot>
                                          <tr>
                                          <td></td>
                                          <td>     <select name="i_menu_id" id="i_menu_id"  class="selectpicker show-tick form-control" data-live-search="true" onchange="javascript: add_menu(this.value)" >
                                        <?php
                                        $query_menu = mysql_query("select * from menus order by menu_id
																	");
                                        while($row_menu = mysql_fetch_array($query_menu)){
                                        ?>
                                        <option value="<?= $row_menu['menu_id']?>"><?php
										
										echo $row_menu['menu_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select></td>
                                          <td></td>
                                            <td align="right" style="font-size:22px;"><strong>TOTAL</strong></td>
                                              
                                           <td style="font-size:22px;"><strong>
                                           
                                           </strong></td>
                                              <td style="text-align:center;">

                                             
                                            </td> 
                                           </tr>
                                           
                                         </tfoot>
                                         
                                    </table>

                             
                            </div><!-- /.box -->
                        </div>
                    </div>
            
            <!-- list menu -->
     
 
   
 
</section><!-- /.content -->

              
              
           
              
              
            