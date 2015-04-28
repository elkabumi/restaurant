<!-- Content Header (Page header) -->
<script>
function add_menu(id)
{
	if(id!=0){
	window.location.href = 'member.php?page=add_menu&menu_id='+id+'&member_id=<?php echo $id ?>';
	}
}
</script>

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
                                            <label>Nama </label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nama member..." value="<?= $row->member_name ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Telepon</label>
                                            <input required type="text" name="i_phone" class="form-control" placeholder="Masukkan telepon member..." value="<?= $row->member_phone ?>"/>
                                        </div>
                  						
                                         <div class="form-group">
                                          <label>Type</label>
                                           <select name="i_discount_type" size="1" class="form-control"/>
                                             <option value="1"  <?php if($row->member_discount_type == 1){ echo "selected='selected'"; } ?>>Diskon Langsung</option>
                                           <option value="2" <?php if($row->member_discount_type == 2){ echo "selected='selected'"; } ?>>Diskon 50:50</option>       
                                           </select>                                    
                                  		</div>
                                                            
                                     <div class="form-group">
                                            <label>Diskon (%)</label>
                                            <input required type="text" name="i_discount" class="form-control" placeholder="Masukkan diskon..." value="<?= $row->member_discount ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Settlement (Rp)</label>
                                            <input required type="text" name="i_settlement" class="form-control" placeholder="Masukkan diskon..." value="<?= $row->member_settlement ?>" readonly="readonly"/>
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
                    
                    <?php
                    if($id){
					?>
                    
                     <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page">Menu</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Menu</th>
                                                
                                                   <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row_item = mysql_fetch_array($query_item)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                               <td><?= $row_item['menu_name']?></td>
                                               <td style="text-align:center;">

                                                   
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_item['member_item_id']; ?>,'member.php?page=delete_item&member_id=<?= $id ?>&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                 <select name="i_menu_id" id="i_menu_id"  class="selectpicker show-tick form-control" data-live-search="true" onchange="javascript: add_menu(this.value)" >
										<option value="0">Add Menu</option>
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
                                        </select>
                                                </td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
<?php
					}
?>
                    
                </section><!-- /.content -->