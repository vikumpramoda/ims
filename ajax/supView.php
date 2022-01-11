<?php

$con = mysqli_connect("localhost", "root", "1234", "ims");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
	SELECT * FROM stock_supplier 
	WHERE sup_name LIKE '%".$search."%'
	OR sup_address LIKE '%".$search."%' 
	OR 2nd LIKE '%".$search."%'
	OR 3rd LIKE '%".$search."%'
	OR 4th LIKE '%".$search."%'
	OR sup_contact LIKE '%".$search."%' 
	OR sup_email LIKE '%".$search."%' 
	";
}
else
{
    $query = "
	SELECT * FROM stock_supplier ORDER BY sup_id DESC ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '<div class="form-group">
					<table id="myTable" class="table table bordered">
						<tr>
							<th>Supplier Name</th>
							<th>Address</th>
							<th>Address Line 2</th>
							<th>Address Line 3</th>
							<th>City</th>
							<th>Contact</th>
							<th>Supplier Category Id</th>
							<th>Email</th>
							<th>Date</th>   
							<th class="text-danger">Remark</th> 
						</tr>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
			<tr>
				<td>'.$row["sup_name"].'</td>
				<td>'.$row["sup_address"].'</td>
				<td>'.$row["2nd"].'</td>
				<td>'.$row["3rd"].'</td>
				<td>'.$row["4th"].'</td>
				<td>'.$row["sup_contact"].'</td>
				<td>'.$row["sup_category_id"].'</td>
				<td>'.$row["sup_email"].'</td>
				<td>'.$row["sdate"].'</td>
				<td>'.$row["remark"].'</td>
				<td><a class="btn btn-danger" href="#" onclick="deleteRow(this)"><i class="fa fa-trash-o fa-1x" ></i></a></td>
			</tr>
		';
    }
    echo $output;
}

else
{
    echo 'Data Not Found';
}
?>

<script>
    function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("myTable").deleteRow(i);
    }
</script>
