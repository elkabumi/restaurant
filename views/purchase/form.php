<script type="text/javascript">
		  function grand_total()
			{
				
				var harga = parseFloat(document.getElementById("i_harga").value);
				var qty = parseFloat(document.getElementById("i_qty").value);
				
					
				var	total = harga * qty;
				
				
				
				document.getElementById("i_total").value = total;
				
			}

		   </script>
<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-12">
                                        
                                        <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group">   
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $row->purchase_date ?>"/>
                                        </div><!-- /.input group -->
            </div>
            
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama barang..." value="<?= $row->purchase_name ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select id="basic" name="i_satuan" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_unit = mysql_fetch_array($query_unit)){
										   ?>
                                             <option value="<?= $r_unit['unit_id'] ?>" <?php if($row->unit_id == $r_unit['unit_id']){ ?> selected="selected"<?php } ?>><?= $r_unit['unit_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input required type="number" name="i_harga" id="i_harga" class="form-control" placeholder="Masukkan harga..." value="<?= $row->purchase_price ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>QTY</label>
                                            <input required type="number" name="i_qty" id="i_qty" class="form-control" placeholder="Masukkan jumlah..." value="<?= $row->purchase_qty ?>" onChange="grand_total()" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Total Harga</label>
                                            <input required type="text" readonly name="i_total" id="i_total" class="form-control"  value="<?= $row->purchase_total ?>"/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Supplier</label>
                                           <select id="basic" name="i_supplier" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_supplier = mysql_fetch_array($query_supplier)){
										   ?>
                                             <option value="<?= $r_supplier['supplier_id'] ?>" <?php if($row->supplier_id == $r_supplier['supplier_id']){ ?> selected="selected"<?php } ?>><?= $r_supplier['supplier_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
            
                                        
                                        
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->