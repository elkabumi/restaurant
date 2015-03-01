              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example_simple" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Menu</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
                                           $no_item = 1;
										   $grand_total = 0;
                                            while($row_item = mysql_fetch_array($query_item)){
												$jumlah = ($row_item['jumlah']) ? $row_item['jumlah'] : 0;
												$total = $jumlah * $row_item['menu_price'];
                                       ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= $row_item['menu_name']; ?></td>
                                                <td><?= tool_format_number($row_item['menu_price']); ?></td>
                                                 <td><?= tool_format_number($jumlah)?></td>
                                                <td><?= tool_format_number($total)?></td>
                                             
                                                 </tr>
                                        

                                              <?php
											  $grand_total = $grand_total + $total;
											$no_item++;
                                            }
                                            ?>
											<tr>
                                            <td></td>
                                             <td></td>
                                              <td></td>
                                                 <td  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                                <td><?= tool_format_number_report($grand_total)?></td>
                                             
                                                 </tr>
                                          
                                        </tbody>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                