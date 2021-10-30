<?PHP
include("server.php");
$username = $_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'AppData');
$keyword = "";
$filter = "";
$batchNo = 0;

if (!$db) {
	header('location: test.php');
} else {
	global $db;
	global $username;
	$query1 = "SELECT storeName FROM `storedata` WHERE username = '$username'";
	$result = mysqli_query($db, $query1);
	while ($row = mysqli_fetch_array($result)) {
		global $storeName;
		$storeName = $row['storeName'];
		$db2 = mysqli_connect('localhost', 'root', '', $storeName);
		if (!$db2) {
			header('location: test.php');
		} else {

			function display()
			{
				$filter = "";
				global  $db2;
				if (isset($_POST['searchProduct'])) {

					$filter = $_POST['filter'];


					switch ($filter) {
						case 'medicine':
							if ($filter != "") {
								$keyword = $_POST['searchInput'];
								$searchQuery1 = "SELECT batchNo,productName,qty,exp,mrp,category FROM medicines WHERE productName LIKE '$keyword%'";
								$result1 = mysqli_query($db2, $searchQuery1);

								while ($r1 = mysqli_fetch_array($result1)) {
									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo $r1['category'];
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							} else {
								$searchQuery = "SELECT batchNo,productName,qty,exp,mrp,category FROM medicines UNION SELECT batchNo,productName,qty,exp,mrp FROM cosmetics UNION SELECT batchNo,productName,qty,exp,mrp FROM surgical";
								$result = mysqli_query($db2, $searchQuery);
								while ($r = mysqli_fetch_assoc($result)) {

									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo $r1['category'];
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							}




							break;
						case 'surgical':
							if ($filter != "") {
								$keyword = $_POST['searchInput'];
								$searchQuery1 = "SELECT batchNo,productName,qty,exp,mrp FROM surgical WHERE productName LIKE '$keyword%'";
								$result1 = mysqli_query($db2, $searchQuery1);

								while ($r1 = mysqli_fetch_array($result1)) {
									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo " ";
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							} else {
								$searchQuery = "SELECT batchNo,productName,qty,exp,mrp,category FROM medicines UNION SELECT batchNo,productName,qty,exp,mrp FROM cosmetics UNION SELECT batchNo,productName,qty,exp,mrp FROM surgical";
								$result = mysqli_query($db2, $searchQuery);
								while ($r = mysqli_fetch_assoc($result)) {

									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo $r1['category'];
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							}



							break;
						case 'cosmetics':
							if ($filter != "") {
								$keyword = $_POST['searchInput'];
								$searchQuery1 = "SELECT batchNo,productName,qty,exp,mrp FROM cosmetics WHERE productName LIKE '$keyword%'";
								$result1 = mysqli_query($db2, $searchQuery1);

								while ($r1 = mysqli_fetch_array($result1)) {
									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo " ";
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							} else {
								$searchQuery = "SELECT batchNo,productName,qty,exp,mrp,category FROM medicines UNION SELECT batchNo,productName,qty,exp,mrp FROM cosmetics UNION SELECT batchNo,productName,qty,exp,mrp FROM surgical";
								$result = mysqli_query($db2, $searchQuery);
								while ($r = mysqli_fetch_assoc($result)) {

									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo $r1['category'];
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							}




							break;
						case 'all':
							if ($filter != "") {
								$keyword = $_POST['searchInput'];
								$searchQuery1 = "SELECT batchNo,productName,qty,exp,mrp FROM medicines WHERE productName LIKE '$keyword%' UNION SELECT batchNo,productName,qty,exp,mrp FROM cosmetics WHERE productName LIKE '$keyword%' UNION SELECT batchNo,productName,qty,exp,mrp FROM surgical WHERE productName LIKE '$keyword%'";
								$result1 = mysqli_query($db2, $searchQuery1);

								while ($r1 = mysqli_fetch_array($result1)) {
									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo " ";
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							} else {
								$searchQuery = "SELECT batchNo,productName,qty,exp,mrp FROM medicines UNION SELECT batchNo,productName,qty,exp,mrp FROM cosmetics UNION SELECT batchNo,productName,qty,exp,mrp FROM surgical";
								$result = mysqli_query($db2, $searchQuery);
								while ($r = mysqli_fetch_assoc($result)) {

									echo '<tr>';
									echo  '<td>';
									echo $r1['batchNo'];
									echo '</td>';
									echo '<td>';
									echo $r1['productName'];
									echo '</td>';
									echo '<td>';
									echo $r1['qty'];
									echo '</td>';
									echo '<td>';
									echo $r1['exp'];
									echo '</td>';
									echo '<td>';
									echo $r1['mrp'];
									echo '</td>';
									echo '<td>';
									echo " ";
									echo '</td>';
									echo '<td>';
									echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
									echo "<img src='img/edit.png' class='action' alt='Edit'>";
									echo "</a>";
									echo '</td>';
									echo '<td>';
									echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
									echo '</td>';
									echo  '</tr>';
								}
							}




							break;

						default:
							$searchQuery = "SELECT batchNo,productName,qty,exp,mrp FROM medicines UNION SELECT batchNo,productName,qty,exp,mrp FROM cosmetics UNION SELECT batchNo,productName,qty,exp,mrp FROM surgical";
							$result = mysqli_query($db2, $searchQuery);
							while ($r = mysqli_fetch_assoc($result)) {

								echo '<tr>';
								echo  '<td>';
								echo $r1['batchNo'];
								echo '</td>';
								echo '<td>';
								echo $r1['productName'];
								echo '</td>';
								echo '<td>';
								echo $r1['qty'];
								echo '</td>';
								echo '<td>';
								echo $r1['exp'];
								echo '</td>';
								echo '<td>';
								echo $r1['mrp'];
								echo '</td>';
								echo '<td>';
								echo " ";
								echo '</td>';
								echo '<td>';
								echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
								echo "<img src='img/edit.png' class='action' alt='Edit'>";
								echo "</a>";
								echo '</td>';
								echo '<td>';
								echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
								echo '</td>';
								echo  '</tr>';
							}
							break;
					}
				} else {
					$searchQuery = "SELECT batchNo,productName,qty,exp,mrp FROM medicines UNION SELECT batchNo,productName,qty,exp,mrp FROM cosmetics UNION SELECT batchNo,productName,qty,exp,mrp FROM surgical";
					$result = mysqli_query($db2, $searchQuery);
					while ($r1 = mysqli_fetch_assoc($result)) {

						echo '<tr>';
						echo  '<td>';
						echo $r1['batchNo'];
						echo '</td>';
						echo '<td>';
						echo $r1['productName'];
						echo '</td>';
						echo '<td>';
						echo $r1['qty'];
						echo '</td>';
						echo '<td>';
						echo $r1['exp'];
						echo '</td>';
						echo '<td>';
						echo $r1['mrp'];
						echo '</td>';
						echo '<td>';
						echo " ";
						echo '</td>';
						echo '<td>';
						echo "<a href='search.php?edit=" . $r1['batchNo'] . "'>";
						echo "<img src='img/edit.png' class='action' alt='Edit'>";
						echo "</a>";
						echo '</td>';
						echo '<td>';
						echo "<a href='searchData.php?del=" . $r1['batchNo'] . "'><img src='img/delete.png' class='action' alt='delete'></a>";
						echo '</td>';
						echo  '</tr>';
					}
				}
			}



			if (isset($_POST['update'])) {

				$batchNo = $_POST['batchNo'];
				$mfg = $_POST['mfg'];
				$exp = $_POST['exp'];
				$qty = $_POST['qty'];
				$mrp = $_POST['mrp'];

				mysqli_query($db2, "UPDATE medicines SET mfg='$mfg',exp='$exp',qty='$qty',mrp='$mrp' WHERE batchNo = '$batchNo' ");
				mysqli_query($db2, "UPDATE surgical SET mfg='$mfg',exp='$exp',qty='$qty',mrp='$mrp' WHERE batchNo = '$batchNo' ");
				mysqli_query($db2, "UPDATE cosmetics SET mfg='$mfg',exp='$exp',qty='$qty',mrp='$mrp' WHERE batchNo = '$batchNo' ");


				header('location:search.php');
			}

			if (isset($_GET['del'])) {
				$batchNo = $_GET['del'];
				mysqli_query($db2, "DELETE FROM medicines WHERE batchNo = '$batchNo' ");
				mysqli_query($db2, "DELETE FROM surgical WHERE batchNo = '$batchNo' ");
				mysqli_query($db2, "DELETE FROM cosmetics WHERE batchNo = '$batchNo' ");


				header('location:search.php');
			}
		}
	}
}



/**/
