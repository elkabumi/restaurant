<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/transaction_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("transaction");

$_SESSION['menu_active'] = 2;

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
			
		}
		
		
		$query = select();
		$query2 = select();
		$query_find = select();
		$action = "transaction.php?page=save";
		

		include '../views/transaction/list.php';
		get_footer($query_find);
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
			$data = "'',
					'$i_table_id',
					'$tanggal', 
					'$i_total_harga'
			";
			
			create_config("transactions_tmp", $data);
			$transaction_id = mysql_insert_id();
			
			$query = select();
			while($row = mysql_fetch_array($query)){
				$jumlah = ($_POST['i_jumlah_'.$row['menu_id']]) ? $_POST['i_jumlah_'.$row['menu_id']] : 0;
				
				if($jumlah > 0){
					$total = $jumlah * $row['menu_price'];
					$data_detail = "'',
									'$transaction_id',
									'".$row['menu_id']."',
									'".$row['menu_price']."',
									'$jumlah',
									'$total'
									";
					create_config("transaction_tmp_details", $data_detail);
				}
				
				
				
			}
			header("Location: transaction.php?page=list&did=1&date=$i_date");
		}else{
			header("Location: transaction.php?page=list&err=1&date=$i_date");
		}
	
	break;

	case 'get_menu':
		
		$keyword = $_GET['keyword'];
		
		$data['menu_id'] = select_menu($keyword);
		
		return $data;
		
		
		break;
}

?>