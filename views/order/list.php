<?php
if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
<title>.: Warung App :.</title>
<link rel="stylesheet" type="text/css" href="../css/style_table.css" />
<!-- tooltip -->
 <link rel="stylesheet" type="text/css" href="../css/tooltip/tooltip-classic.css" />
 <!-- button component-->
 		<link rel="stylesheet" type="text/css" href="../css/button_component/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/component.css" />
		<link rel="stylesheet" type="text/css" href="../css/button_component/content.css" />
        
        <!-- vertical scroll 
         <link rel="stylesheet" href="../css/vertical_scroll/main.css">-->
         
         <!-- vertical scroll new -->
         <link rel="stylesheet" href="../css/vertical_scroll_new/style.css">
		<link rel="stylesheet" href="../css/vertical_scroll_new/jquery.mCustomScrollbar.css">
       
       <script type="text/javascript">
       function cancel_order(id){
		 	var question = confirm("Anda yakin ingin cancel order ?");
			if(question==true){
				window.location.href = 'order.php?page=cancel_order&table_id='+id+'&building_id='+<?= $building_id ?>;
			}
	   }
       </script>
    
		<script src="../js/button_component/modernizr.custom.js"></script>
<style>
.border_meja{
	background:url(../img/building/<?= $building_img ?>) no-repeat;
}
<?php
	$q_building1 = 1;
	$q_building1 = mysql_query("select * from buildings where building_id = '$building_id' order by building_id");
	while($r_building1 = mysql_fetch_array($q_building1)){
		$color = array("", "#bbb", "#ccc", "#ddd", "#eee");
	?>
	
	
	<?php
	
	$q3 = mysql_query("select * from tables where building_id = '".$r_building1['building_id']."' order by table_id");
	while($r3 = mysql_fetch_array($q3)){
	?>
	
	#makeMeDraggable_<?= $r3['table_id']?> { 
	position: absolute;
	width: 100px; height: 100px; 
	margin-left:
	<?php
	$data_x = ($r3['data_x']) ? $r3['data_x'] : 0;
	echo $data_x ?>px; 
	margin-top:
	<?php
	$data_y = ($r3['data_y']) ? $r3['data_y'] : 0;
	echo $data_y ?>px; 
	background: red; cursor: pointer; 
	
	}
	<?php
	
	}
	
	$q_building1++;
	}
	?>
	
</style>
 
<script type="text/javascript" src="../js/table/jquery.js"></script>
<script type="text/javascript" src="../js/table/jquery.min.js"></script>
 
 
</head>
<body margin-left="0" margin-top="0">



 <div class="header_fixed"> 
 
                    
                    
                    
                   

					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button class="blue_color_button"  type="button"  onClick="javascript: window.location.href = 'home.php'; ">BACK TO MENU</button>
						
					</div><!-- morph-button -->

					<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
						<button class="red_color_button" type="button">LOGOUT</button>
						<div class="morph-content">
							<div>
								<div class="content-style-form content-style-form-2" >
									<span class="icon icon-close">Close the dialog</span>
									<h2 style="font-size:42px; padding-top:50px;">Anda yakin ingin <br><strong>logout</strong> ?</h2>
									<form action="<?= $action_logout?>" method="post" enctype="multipart/form-data" role="form">
										
									
										<p>
										  <input type="submit" name="button" id="button" value="YA" class="button_building">
										</p>
									</form>
								</div>
							</div>
						</div>
					</div><!-- morph-button -->
 </div>
 
<div class="border_meja">
  <img src="../img/building/<?= $building_img ?>" style="visibility:hidden;" />
  </div>
 
 
 <?php
	$q_building4 = mysql_query("select * from buildings where building_id = '$building_id' order by building_id");
	while($r_building4 = mysql_fetch_array($q_building4)){
		?>
<div id="content_new">
	
	<?php
	$query =  mysql_query("select * from tables where building_id = '".$r_building4['building_id']."' order by table_id");
	while($row = mysql_fetch_array($query)){
		
		$get_item = get_item($row['table_id']);
		
	?>
	<span class="tooltip tooltip-effect-1">
	<div id="makeMeDraggable_<?= $row['table_id']?>" class="meja">
	
				
				<div class="tooltip-item"><?= $row['table_name'] ?>
				<?php
                if($get_item > 0 ){
				?>
              
				<div class="count_item"><?= $get_item ?></div>
                <?php
				}
				?>
                </div>
				<span class="tooltip-content clearfix">
					
						<?php 
						if($get_item > 0 ){
							include('table_item.php');
						}else{
							include('table_empty.php');	
						}
						?>
					
				</span>
			
	 </div>
	 </span> 
	<?php
	
	}
	?>
  
</div>
<?php
	}
?>


<div class="footer_fixed"> 
			<div class="morph-button morph-button-sidebar morph-button-fixed">
			<button type="button" class="green_color_button"><?= $building_name?></button>
			<div class="morph-content">
				<div>
					<div class="content-style-sidebar">
						<span class="icon icon-close">Close the overlay</span>
						<h2>Room</h2>
						<ul>
                       <?php
						$q_building5 = mysql_query("select * from buildings order by building_id");
						while($r_building5 = mysql_fetch_array($q_building5)){
							?>
							<li><a href="order.php?building_id=<?= $r_building5['building_id']?>"><?= $r_building5['building_name']?></a></li>
                            <?php
						}
							?>
                       
							
						</ul>
					</div>
				</div>
			</div>
		</div><!-- morph-button -->

		<?php
        include 'jumlah_meja.php';
		?>
   </div>     
       
      
		
	
	
	
        
        <!-- vertical scroll  -
          <script src="../js/jquery.js"></script>
    <script src="../js/vertical_scroll/jquery.scrollpanel-0.5.0.js"></script>
    <script src="../js/vertical_scroll/main.js"></script>->
    
    <!-- vertical scroll new -->
    <script>window.jQuery || document.write('<script src="../js/vertical_scroll_new/jquery-1.11.0.min.js"><\/script>')</script>
	<script src="../js/vertical_scroll_new/jquery.mCustomScrollbar.concat.min.js"></script>

	<script src="../js/button_component/classie.js"></script>
		<script src="../js/button_component/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition;

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();

				[].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
					new UIMorphingButton( bttn, {
						closeEl : '.icon-close',
						onBeforeOpen : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterOpen : function() {
							// can scroll again
							canScroll();
						},
						onBeforeClose : function() {
							// don't allow to scroll
							noScroll();
						},
						onAfterClose : function() {
							// can scroll again
							canScroll();
						}
					} );
				} );

				// for demo purposes only
				[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) { 
					bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
				} );
			})();
		</script>
    
    <script>
		(function($){
			$(window).load(function(){
				
				/* all available option parameters with their default values */
				$(".content").mCustomScrollbar({
					setWidth:false,
					setHeight:false,
					setTop:0,
					setLeft:0,
					axis:"y",
					scrollbarPosition:"inside",
					scrollInertia:950,
					autoDraggerLength:true,
					autoHideScrollbar:false,
					autoExpandScrollbar:false,
					alwaysShowScrollbar:0,
					snapAmount:null,
					snapOffset:0,
					mouseWheel:{
						enable:true,
						scrollAmount:"auto",
						axis:"y",
						preventDefault:false,
						deltaFactor:"auto",
						normalizeDelta:false,
						invert:false,
						disableOver:["select","option","keygen","datalist","textarea"]
					},
					scrollButtons:{
						enable:false,
						scrollType:"stepless",
						scrollAmount:"auto"
					},
					keyboard:{
						enable:true,
						scrollType:"stepless",
						scrollAmount:"auto"
					},
					contentTouchScroll:25,
					advanced:{
						autoExpandHorizontalScroll:false,
						autoScrollOnFocus:"input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
						updateOnContentResize:true,
						updateOnImageLoad:true,
						updateOnSelectorChange:false,
						releaseDraggableSelectors:false
					},
					theme:"light",
					callbacks:{
						onInit:false,
						onScrollStart:false,
						onScroll:false,
						onTotalScroll:false,
						onTotalScrollBack:false,
						whileScrolling:false,
						onTotalScrollOffset:0,
						onTotalScrollBackOffset:0,
						alwaysTriggerOffsets:true,
						onOverflowY:false,
						onOverflowX:false,
						onOverflowYNone:false,
						onOverflowXNone:false
					},
					live:false,
					liveSelector:null
				});
				
			});
		})(jQuery);
	</script>
		
</body>
</html>