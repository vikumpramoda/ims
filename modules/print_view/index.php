<?php
/** print_view
 * Created by PhpStorm.
 * User: Lahiru Mendis
 * Date: 24/07/2019
 * Time: 7:51 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Invoice - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/ss.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
            <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
    </div>



<?php
$dt = date("Y-m-d");
include('db_connector.php');
$id = intval($_GET['pur_id']);


$queryl = "select * from purchase p, stock_supplier m where  p.supplier = m.sup_id and p.pur_id = $id ";
$resultl = mysqli_query($con,$queryl);
$countl  = mysqli_num_rows($resultl);

if($countl == 1) {
    while ($row = mysqli_fetch_array($resultl)) {

        $sup = $row['sup_name'];
        $add = $row['sup_address'];
        $date = $row['pur_date'];
        $a2 = $row['2nd'];
        $a3 = $row['3rd'];
        $a4 = $row['4th'];
        $mob = $row['sup_contact'];
        $email = $row['sup_email'];
        $vat = $row['vat'];
        $nbt = $row['nbt'];
        $tot = $row['fin_tot'];
        $fin = $row['sum_tot'];
        $delivery = $row['del_address'];
        $st1    =   $row['2nd_ad'];
        $st2    =   $row['3rd_ad'];
        $st3    =   $row['4th_ad'];
        $file   =   $row['file_no'];
        $sq   =   $row['sq_no'];
        $rem    =   $row['remarks'];
    }
}
?>
<div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-pagelines"></i> State Timber Corporation</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Printed Date: <?php echo $dt ?></h5>
                        </div>


                    </div>
                    <div class="row invoice-info">
                        <div class="col-3">:From
                            <address><strong>State Timber Corporation</strong><br>No. 82,<br>Sampath Paya,<br>Rajamalwatta Road,<br> Battaramulla.<br>Email: timco.lk</address>
                        </div>
                        <div class="col-3">:To
                            <address><strong><?php echo $sup ?></strong><br><?php echo $add ?><br><?php echo $a3 ?><br> <?php echo $a4 ?><br>Phone: <?php echo $mob ?><br>Email: <?php echo $email ?></address>
                        </div>
                        <div class="col-3">:Delivery To / Collection
                            <address><strong><?php echo $delivery ?></strong><br><?php echo $st1 ?><br><?php echo $st2 ?><br><?php echo $st3 ?><br>Email:<br>Phone: </address>
                        </div>
                        <div class="col-3"><b>File No: #<?php echo $file ?></b><br><b>SQ No: #<?php echo $sq ?></b><br><b>Purchase Order No:</b> PO_<?php echo $id ?><br><b>Document Date:</b> <?php echo $date ?><br><b>Delivery Date:</b></div>


                    </div>


                        <?php
                        include('db_connector.php');

                        $id = intval($_GET['pur_id']);

                        /*$selectUserl = "SELECT `req_number`,`qty`,`item_name` FROM `req_items`  WHERE `req_number` = $id ";
                        */
                        $selectUserl = "SELECT p.pur_id,p.qty,p.unit_price,p.Total,ROUND(p.Total,2) AS tota,p.discount,ROUND(p.discount * 100,0) AS dis,p.disc_unit_price,m.item_name,m.item_id
                                                    FROM purchase_item p
                                                    INNER JOIN items m ON m.item_id = p.item_id WHERE p.pur_id= $id";

                        /*$selectUserl ="SELECT course.course_id,course.course_name,course.enrolKey,course.co_date,member.first_name
                        FROM course
                        INNER JOIN member ON course.lecture_id = member.member_id
                        WHERE course.course_id = $id";
                        */
                        $resultl = mysqli_query($con,$selectUserl);
                        $countl = mysqli_num_rows($resultl);

                        if($countl == 0){
                            while($row = mysqli_fetch_array($resultl)){


                                $item_id       = $row['item_name'];
                                $qty       = $row['qty'];
                                $item = $row['item_id'];
                                $tot = $row['new'];
                                $dis = $row['dis'];

                         echo "$tot";

                            }
                        }

                        ?>

                    <div class="row">
                        <div class="col-12 table-responsive">
                        <?php



                        if ($resultl->num_rows > 0) {
                            echo "
                            <table class=\"table table-striped\">
                                
                                <tr>
                                    
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Discount %</th>
                                    <th>Discounted Unit Price</th>
                                    <th>Subtotal</th>
                                </tr> 
                                 ";
                            $qty1 = 0;
                                while($row = $resultl->fetch_assoc()) {
                                    $qty1 += $row['Total'];
                                echo "
                                
                              <tr>
                                    
                                    <td>". $row["item_name"]."</td>
                                    <td>". $row["qty"]."</td>
                                    <td>Rs.". $row["unit_price"]."</td>
                                    <td>". $row["dis"]."%</td>
                                    <td>Rs.". $row["disc_unit_price"]."</td>
                                    <td>Rs.". $row["tota"]."</td>
                                    
                                   
                                    
                                </tr> ";


                                }


                            echo "
                            </table> ";

                        } else {
                            echo "0 results";
                        }




                        echo "

                            <div class=\"col-12\">
                            <div class=\"text-right\" ><b>Total &nbsp;&nbsp; Rs.$tot</div>
                            <div class=\"text-right\" ><b>NBT 2% &nbsp;&nbsp; Rs.$nbt</div>
                            <div class=\"text-right\" ><b>VAT 15% &nbsp;&nbsp; Rs.$vat</div>
                            </div>
                            <div class=\"col-12\" style='border-bottom-style: double;border-top: groove'>
                            <h5 class=\"text-right\" >Final Total = Rs. $fin </h5>
                            
                         "; ?>

                            <!--Convert Amount To Words -->
                        <?php

                        function convertNumber($number)
                        {
                            list($integer, $fraction) = explode(".", (string) $number);

                            $output = "";

                            if ($integer{0} == "-")
                            {
                                $output = "negative ";
                                $integer    = ltrim($integer, "-");
                            }
                            else if ($integer{0} == "+")
                            {
                                $output = "positive ";
                                $integer    = ltrim($integer, "+");
                            }

                            if ($integer{0} == "0")
                            {
                                $output .= "zero";
                            }
                            else
                            {
                                $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
                                $group   = rtrim(chunk_split($integer, 3, " "), " ");
                                $groups  = explode(" ", $group);

                                $groups2 = array();
                                foreach ($groups as $g)
                                {
                                    $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
                                }

                                for ($z = 0; $z < count($groups2); $z++)
                                {
                                    if ($groups2[$z] != "")
                                    {
                                        $output .= $groups2[$z] . convertGroup(11 - $z) . (
                                            $z < 11
                                            && !array_search('', array_slice($groups2, $z + 1, -1))
                                            && $groups2[11] != ''
                                            && $groups[11]{0} == '0'
                                                ? " and "
                                                : ", "
                                            );
                                    }
                                }

                                $output = rtrim($output, ", ");
                            }

                            if ($fraction > 0)
                            {
                                $output .= " RUPPEES AND";
                                for ($i = 0; $i < strlen($fraction); $i++)
                                {
                                    $output .= " " . convertDigit($fraction{$i});
                                }
                            }

                            return $output;
                        }

                        function convertGroup($index)
                        {
                            switch ($index)
                            {
                                case 11:
                                    return " decillion";
                                case 10:
                                    return " nonillion";
                                case 9:
                                    return " octillion";
                                case 8:
                                    return " septillion";
                                case 7:
                                    return " sextillion";
                                case 6:
                                    return " quintrillion";
                                case 5:
                                    return " QUADRILLION";
                                case 4:
                                    return " TRILLION";
                                case 3:
                                    return " BILLION";
                                case 2:
                                    return " MILLION";
                                case 1:
                                    return " THOUSAND";
                                case 0:
                                    return "";
                            }
                        }

                        function convertThreeDigit($digit1, $digit2, $digit3)
                        {
                            $buffer = "";

                            if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
                            {
                                return "";
                            }

                            if ($digit1 != "0")
                            {
                                $buffer .= convertDigit($digit1) . " HUNDRED";
                                if ($digit2 != "0" || $digit3 != "0")
                                {
                                    $buffer .= "  ";
                                }
                            }

                            if ($digit2 != "0")
                            {
                                $buffer .= convertTwoDigit($digit2, $digit3);
                            }
                            else if ($digit3 != "0")
                            {
                                $buffer .= convertDigit($digit3);
                            }

                            return $buffer;
                        }

                        function convertTwoDigit($digit1, $digit2)
                        {
                            if ($digit2 == "0")
                            {
                                switch ($digit1)
                                {
                                    case "1":
                                        return "TEN";
                                    case "2":
                                        return "TWENTY";
                                    case "3":
                                        return "THIRTY";
                                    case "4":
                                        return "FORTY";
                                    case "5":
                                        return "FIFTY";
                                    case "6":
                                        return "SIXTY";
                                    case "7":
                                        return "SEVENTY";
                                    case "8":
                                        return "EIGHTY";
                                    case "9":
                                        return "NINETY";
                                }
                            } else if ($digit1 == "1")
                            {
                                switch ($digit2)
                                {
                                    case "1":
                                        return "ELEVEN";
                                    case "2":
                                        return "TWELVE";
                                    case "3":
                                        return "THIRTEEN";
                                    case "4":
                                        return "FOURTEEN";
                                    case "5":
                                        return "FIFTEEN";
                                    case "6":
                                        return "SIXTEEN";
                                    case "7":
                                        return "SEVENTEEN";
                                    case "8":
                                        return "EIGHTEEN";
                                    case "9":
                                        return "NINETEEN";
                                }
                            } else
                            {
                                $temp = convertDigit($digit2);
                                switch ($digit1)
                                {
                                    case "2":
                                        return "TWENTY-$temp";
                                    case "3":
                                        return "THIRTY-$temp";
                                    case "4":
                                        return "FORTY-$temp";
                                    case "5":
                                        return "FIFTY-$temp";
                                    case "6":
                                        return "SIXTY-$temp";
                                    case "7":
                                        return "SEVENTY-$temp";
                                    case "8":
                                        return "EIGHTY-$temp";
                                    case "9":
                                        return "NINETY-$temp";
                                }
                            }
                        }

                        function convertDigit($digit)
                        {
                            switch ($digit)
                            {
                                case "0":
                                    return "ZERO";
                                case "1":
                                    return "ONE";
                                case "2":
                                    return "TWO";
                                case "3":
                                    return "THREE";
                                case "4":
                                    return "FOUR";
                                case "5":
                                    return "FIVE";
                                case "6":
                                    return "SIX";
                                case "7":
                                    return "SEVEN";
                                case "8":
                                    return "EIGHT";
                                case "9":
                                    return "NINE";
                            }
                        }

                        $num = $fin;
                        $test = convertNumber($num);

                        echo "

                            
                            <h6 class=\"text-left\" >$test CENTS ONLY</h6>
                            </div>
                            <br><div class=\"col-5\"  style='border-bottom-style: solid;border-top: solid;border-left: solid;border-right: solid;'>
                                Special Remarks :<h6 class=\"text-left\" > $rem </h6><br>
                                <br>
                                Authorized By : ...................... <br>
                                <br>Date          : ........................
                                </div>
                            ";

                        ?>



                        </div>
                    </div>
                    <div class="row d-print-none mt-2">
                        <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a> <a class="btn btn-danger icon-btn float-left" href="print_po.php" ><i class="fa fa-times"></i>Cancel</a></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>
</html>
