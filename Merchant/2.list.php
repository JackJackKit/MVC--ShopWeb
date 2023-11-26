<p>商品清單</p>
<p><button onclick="loadURL('0.商品輸入表單.html')">新增商品</button></p>
<hr />
<table width="200" border="1">
  <tr>
    <td>ID</td>
    <td>商品名稱</td>
    <td>價格</td>
    <td>商品說明</td>
    <td>運輸狀況</td>
    <td>-</td>
  </tr>
<?php
require("dbconfig.php");
$sql = "select * from todo1;";
$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt); //取得查詢結果

while (	$rs = mysqli_fetch_assoc($result)) { //用迴圈逐筆取出

	echo "<tr><td>" , $rs['id'] ,
	"</td><td>" , $rs['CommodityName'],
	"</td><td>" , $rs['price'], 
	"</td><td>", $rs['CommodityContent'],
	"</td><td>", $rs['CommodityState'],
	"</td><td><button onclick ='loadEditForm(",$rs['id'] ,")'>edit</button>",
  "</td><td><button onclick ='loadDeleteForm(",$rs['id'] ,")'>delete</button>",
	"</td></tr>";
}
?>
</table>
