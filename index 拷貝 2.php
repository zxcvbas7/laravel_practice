<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>calendar</title>

<script src="jquery-3.0.0.js"></script>

<script>
	$(document).ready(function(){
		$('.lastMonth').hide();
		$('.nextMonth').hide();
	});

    function showMonth(){
    	$('.lastMonth').show();
    	$('.nextMonth').show();
    };
</script>

<style>
	#td_sun{
		background-color: #CCCCFF;
		color: #ff0000;
	}
	#td_mon{
		background-color: #FFB7DD;
	}
	#td_tue{
		background-color: #FFC8B4;
	}
	#td_wed{
		background-color: #FFEE99;
	}
	#td_thu{
		background-color: #EEFFBB;
	}
	#td_fri{
		background-color: #BBFFEE;
	}
	#td_sat{
		background-color: #CCEEFF;
		color: #ff0000;
	}

	div.phpinfo {
		float: left;
    width: 150px;
    height: 500px;
    overflow: scroll;
	}
	div.test{
		float: left;
	}
</style>
</head>

<body>

<span class="over">show month</span>
<a href="index.php">Home</a>
<div class='phpinfo'>
<?php
phpinfo();
?>
</div>
<div class="test">
tttt
</div>
<?php
@$calendar_year = $_GET['year'];
@$calendar_month = $_GET['month'];
@$calendar_day = $_GET['day'];

$this_year = date('Y');
$this_month = date('m');
$this_day = date('d');

$yy =  ($calendar_year != "" ) ? $calendar_year : $this_year;
$mm = ($calendar_month != "" ) ? $calendar_month : $this_month;
$dd = ($calendar_day != "" ) ? $calendar_day : $this_day;
?>

<table border="0" align="center" valign="center" width="500px">

	<tr>
		<th><div class="lastMonth"><a href="index.php?month=<?php echo $mm-1 ?>">上個月</a></div></th>
		<th colspan="5"><div class="showMonth"><a href="javascript:showMonth()"><?php echo $yy."年".$mm."月" ?></a></div></th>
		<th><div class="nextMonth"><a href="index.php?month=<?php echo $mm+1 ?>">下個月</a></div></th>
	</tr>
	
	<tr>
		　<td id="td_sun">星期日</td>
		　<td id="td_mon">星期一</td>
		　<td id="td_tue">星期二</td>
		　<td id="td_wed">星期三</td>
		　<td id="td_thu">星期四</td>
		　<td id="td_fri">星期五</td>
		　<td id="td_sat">星期六</td>
	</tr>
	
	<?php	for ($days=1;$days<=31;$days++){	?>			
	<tr>
		<?php	for ($date=$days;$date<($days+7);$date++){
					if($date == $dd){ ?>
						<td align="center" style="background-color: #FF0000"><a href="javascript:showTime(2016,<?php  echo $mm ?>,<?php  echo ($date<32) ? $date : ""; ?>);"><?php  echo ($date<32) ? $date : ""; ?></a></td>				

		<?php		}else{ ?>
						<td align="center"><a href="javascript:showTime(2016,<?php  echo $mm ?>,<?php  echo ($date<32) ? $date : ""; ?>);"><?php  echo ($date<32) ? $date : ""; ?></a></td>
		<?php		} ?>

		<?php	}
			echo "<br>";
			$days = $days+6;
			}?>
	</tr>
</table>

<div id="showTime" align="center">顯示日期</div>
<!-- 
	<?php 
	$todayStart = time("0:0:0 12-1-2016");
	//$todayEnd = date("Y-m-d 23:59:59");
	echo "timestamp   ".$todayStart."<br>";?> -->

</body>

<script>
	$( "span.over" ).mouseover(function() {
		$("span.over").html("Month Show");
    	$("div.lastMonth").show();
    	$("div.nextMonth").show();
    });
	$( "span.over" ).mouseout(function() {
		$("span.over").html("Month Hide");
    	$("div.lastMonth").hide();
    	$("div.nextMonth").hide();
    });

	function showTime(y,m,day){
		/* date */  
		//var d = new Date(year, month, day, hours, minutes, seconds, milliseconds);
		var date = new Date(y, m-1, day, 0, 0, 0, 0);
		var date2 = new Date(y, m-1, day, 23, 59, 59, 0);

		/* date to timestamp */  
		var myDateStart="0:0:0 "+m+"-"+day+"-"+y; 
		var myDateEnd="23:59:59 "+m+"-"+day+"-"+y; 
		var stamp  = new Date(y, m-1, day, 0, 0, 0, 0).getTime(); //Date 內無值的話為當前時間 
		var stamp2  = new Date(y, m-1, day, 23, 59, 59, 0).getTime(); //Date 內無值的話為當前時間  

		/* timestamp to date */  
		var date = new Date(stamp);
		var date2 = new Date(stamp2);
		
		$showTimeDiv = document.getElementById("showTime").innerHTML = stamp+"<br>"+stamp2+"<br>"+"<br>"+date+"<br>"+date2;


		var showT = new Date().getTime();
		var showT2 = new Date();
		//$showTimeDiv = document.getElementById("showTime").innerHTML = showT+"<br>"+showT2;

		/*
		 php中的時間戳章和javascript的差異在
		 javascript的getTime() 除以 1000 再取整數
		 mytimestamp = parseInt(new Date().getTime() / 1000 ) ;
		 */

	}
</script>

</html>