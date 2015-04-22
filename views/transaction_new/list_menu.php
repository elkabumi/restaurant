
                                          <td></td>
                                          <td>
                                            <select name="i_menu_id" id="i_menu_id"  class="selectpicker show-tick form-control" data-live-search="true" >
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
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>