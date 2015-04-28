<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/transaction_new_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Transaksi");

$_SESSION['menu_active'] = 3;

switch ($page) {
	case 'list':
		get_header($title);
		
		$date = format_date(date("Y-m-d"));
		if(isset($_GET['date'])){
			$date = format_date($_GET['date']);
		}
		$table_id = "";
		if(isset($_GET['table_id'])){
			$table_id = $_GET['table_id'];
			$query_history = select_history($table_id);
			
		}
		
		if($table_id == ""){
			$check_table = 0;
		}else{
			$check_table = check_table($table_id);
		}
		$query_cat = select_cat();
		$query = select();
		$query2 = select();
		$query_find = select();
		$action = "transaction_new.php?page=save";
		

		include '../views/transaction_new/list.php';
		get_footer($query_find);
	break;
	
	case 'add_menu';
		$member_id = get_isset($_GET['member_id']);	
		$menu_id = get_isset($_GET['menu_id']);	
		$table_id = get_isset($_GET['table_id']);	
		$get_menu_price = get_menu_price($menu_id);
		$get_discount = get_discount($member_id);
		$tnt_discount = $get_discount / 100 * $get_menu_price;
		$tnt_grand_price = $get_menu_price - $tnt_discount;
		
		$data = "'',
					'".$_SESSION['user_id']."',
					'$member_id', 
					'$menu_id',
					'$get_menu_price',
					'$tnt_discount',
					'$tnt_grand_price',
					'1',
					'$tnt_grand_price'
					
					
					
			";
			
			create_config("transaction_new_tmp", $data);
			header("Location: transaction_new.php?page=list&table_id=$table_id&member_id=$member_id");
			
	break;
	

	case 'save':
	
		extract($_POST);

		$i_date = get_isset($i_date);
		$i_date = format_back_date($i_date);
		$i_jam = date("h:m:s");
		$i_table_id = get_isset($i_table_id);
		$tanggal = $i_date." ".$i_jam;
		
		$i_total_harga = get_isset($i_total_harga);
		//echo $tanggal;
		
		if($i_total_harga > 0){
			
			$check_table = check_table($i_table_id);
			
			if($check_table > 0){
				$transaction_new_id = get_transaction_new_id_old($i_table_id);
			}else{
			$data = "'',
					'$i_table_id',
					'$tanggal', 
					'$i_total_harga'
			";
			
			create_config("transaction_news_tmp", $data);
				$transaction_new_id = mysql_insert_id();
			}
			
			$query = select();
			while($row = mysql_fetch_array($query)){
				$jumlah = ($_POST['i_jumlah_'.$row['menu_id']]) ? $_POST['i_jumlah_'.$row['menu_id']] : 0;
				
				if($jumlah > 0){
					$total = $jumlah * $row['menu_price'];
					
					$check_history = check_history($i_table_id, $row['menu_id']);
					
					if($check_history > 0){
						
						$data_history = get_data_history($i_table_id, $row['menu_id']);
						$row_history = mysql_fetch_array($data_history);
						
						$new_qty = $row_history['transaction_new_detail_qty'] + $jumlah;
						$new_total = $new_qty * $row['menu_price'];
						
						$data_detail = "transaction_new_detail_qty = '$new_qty', 
										transaction_new_detail_total = '$new_total'
									";
						update_config("transaction_new_tmp_details", $data_detail, "transaction_new_detail_id", $row_history['transaction_new_detail_id']);
					
					}else{
					
						$data_detail = "'',
									'$transaction_new_id',
									'".$row['menu_id']."',
									'".$row['menu_original_price']."',
									'".$row['menu_margin_price']."',
									'".$row['menu_price']."',
									'$jumlah',
									'$total'
									";
						create_config("transaction_new_tmp_details", $data_detail);
					}
				}
				
				
				
			}
			if($i_table_id == 0){
				header("Location: payment.php?table_id=0");
			}else{
				header("Location: order.php");
			}
			//header("Location: transaction_new.php?page=list&table_id=$i_table_id");
		}else{
			header("Location: transaction_new.php?page=list&err=1&table_id=$i_table_id");
		}
	
	break;

	case 'get_menu':
		
		$keyword = $_GET['keyword'];
		
		$data['menu_id'] = select_menu($keyword);
		
		return $data;
		
		
		break;
		
	case 'delete_history':

		$id = get_isset($_GET['id']);	
		$table_id = get_isset($_GET['table_id']);	
		
		
		
		delete_history($id);

		header("Location: transaction_new.php?table_id=$table_id&did=3");

	break;
	
	case 'list_history':
		//get_header($title);
		$table_id = get_isset($_GET['table_id']);
		
		$check_table = check_table($table_id);
		if($check_table > 0){
			$query_history = select_history($table_id);
			include '../views/transaction_new/history_order.php';
		}
		//get_footer();
	break;
	
	case  'add_list_menu':
		$menu_id= get_isset($_GET['menu_id']);	
		
		//$action = "treatment.php?page=save&planting_process_id=$planting_process_id";
		
		include '../views/transaction_new/list_menu.php';
	break;
}

?>