<?php
//main memu
    include('db_connector.php');
    include ('validateSession.php');

    $member_id  = $_SESSION['member_id'];
    $NIC		=	$_SESSION['NIC'];
    $first_name	=		$_SESSION['first_name'];
    $last_name	=		$_SESSION['last_name'];
    $session_id	=		$_SESSION['session'];
    $member_category_id	       = $_SESSION['member-category_id'];
    $email =  $_SESSION['email'];


    if($member_category_id == '1'){

        ?>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div>

            <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="./images/ab.jpg" width="60" alt="User Image" >
                <p class="app-sidebar__user-name">Admin<br><?php echo $first_name  ?><br><?php echo $last_name ; ?></p>
                <p class="app-sidebar__user-designation">

            </div>
        </div>



        <ul class="app-menu">

                <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">GRN</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_grn.php"><i class="icon fa fa-circle-o"></i> Add GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="new_grn.php"><i class="icon fa fa-circle-o"></i>New GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="pettycash.php"><i class="icon fa fa-circle-o"></i>Petty Cash</a></li>
                    </ul>


                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Issue Order</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="rpt_view.php"><i class="icon fa fa-circle-o"></i> Add Issue Order</a></li>
                    </ul>

                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Items</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_category.php"><i class="icon fa fa-circle-o"></i> Add New Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_item.php"><i class="icon fa fa-circle-o"></i> Add Item</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="searchCat.php"><i class="icon fa fa-circle-o"></i>Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="itemView.php"><i class="icon fa fa-circle-o"></i>Items</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock.php"><i class="icon fa fa-circle-o"></i>Stock</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_current_stock.php"><i class="icon fa fa-circle-o"></i>Add Current Stock</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_current_stock.php"><i class="icon fa fa-circle-o"></i>Generate Barcode</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_barcode.php"><i class="icon fa fa-circle-o"></i>View Barcode</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="transfer.php"><i class="icon fa fa-circle-o"></i>Stock Transfer to another Dipo</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_transfer.php"><i class="icon fa fa-circle-o"></i>View Transfered List</a></li>
                    </ul>

                    <!-- <ul class="treeview-menu">
                        <li><a class="treeview-item" href="generate_barcode.php"><i class="icon fa fa-circle-o"></i>Generate Barcode</a></li>
                    </ul> -->

                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Requestions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="receiptOrder.php"><i class="icon fa fa-circle-o"></i> Add Requisitions</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_req.php"><i class="icon fa fa-circle-o"></i> Requisitions</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="store_req.php"><i class="icon fa fa-circle-o"></i> Store Requisitions</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="skReq.php"><i class="icon fa fa-circle-o"></i> SK Add Requisitions</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="approve.php"><i class="icon fa fa-circle-o"></i>Approve Requisitions</a></li>
                    </ul>


                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Supplier</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock-supplier.php"><i class="icon fa fa-circle-o"></i> Add Supplier</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="viewSupplier.php"><i class="icon fa fa-circle-o"></i> View Supplier</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Member</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="member.php"><i class="icon fa fa-circle-o"></i> Add Member</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="viewMember.php"><i class="icon fa fa-circle-o"></i> View Member</a></li>
                    </ul>

                </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Purchase Order</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="po_approve.php"><i class="icon fa fa-circle-o"></i>Approve Purchase Orders</a></li>
                </ul>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="directReq.php"><i class="icon fa fa-circle-o"></i>Direct Purchase Request Items</a></li>
                </ul>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="issue.php"><i class="icon fa fa-circle-o"></i>Stock Available Request Items</a></li>
                </ul>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="store_direct.php"><i class="icon fa fa-circle-o"></i>Stock Direct Request Items</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="po_all.php"><i class="icon fa fa-circle-o"></i>Purchase Orders</a></li>
                </ul>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="view_po.php"><i class="icon fa fa-circle-o"></i>Complete PO</a></li>
                </ul>

                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="print_po.php"><i class="icon fa fa-circle-o"></i>Print Final PO</a></li>
                </ul>

            </li>


                <li><a class="app-menu__item active" href="logOut.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>

            </ul>
        </aside>
        <?php
    }else if($member_category_id == '2' ){

        ?>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div>

                <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="./images/ab.jpg" width="60" alt="User Image" >
                    <p class="app-sidebar__user-name">Store keeper<br><?php echo $first_name  ?><br><?php echo $last_name ; ?></p>
                    <p class="app-sidebar__user-designation">

                </div>
            </div>



            <ul class="app-menu">

                <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">GRN</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_grn.php"><i class="icon fa fa-circle-o"></i> Add GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="new_grn.php"><i class="icon fa fa-circle-o"></i>New GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="pettycash.php"><i class="icon fa fa-circle-o"></i>Petty Cash</a></li>
                    </ul>



                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Issue Order</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_issue_order.php"><i class="icon fa fa-circle-o"></i> Add Issue Order</a></li>
                    </ul>
                    

                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Items</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_category.php"><i class="icon fa fa-circle-o"></i> Add New Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_item.php"><i class="icon fa fa-circle-o"></i> Add Item</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="searchCat.php"><i class="icon fa fa-circle-o"></i>Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="itemView.php"><i class="icon fa fa-circle-o"></i>Items</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock.php"><i class="icon fa fa-circle-o"></i>Stock</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="transfer.php"><i class="icon fa fa-circle-o"></i>Stock Transfer to another Dipo</a></li>
                    </ul>
                    
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_transfer.php"><i class="icon fa fa-circle-o"></i>View Transfered List</a></li>
                    </ul>

                    

                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Requestions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="skReq.php"><i class="icon fa fa-circle-o"></i>Add Requisition</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_req.php"><i class="icon fa fa-circle-o"></i>Requisitions</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="approve.php"><i class="icon fa fa-circle-o"></i>Approve Requisitions</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="store_req.php"><i class="icon fa fa-circle-o"></i>Store Requested Requisitions</a></li>
                    </ul>


                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Purchase Order</span><i class="treeview-indicator fa fa-angle-right"></i></a>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="issue.php"><i class="icon fa fa-circle-o"></i>Stock Available Request Items</a></li>
                    </ul>

                </li>
                <li><a class="app-menu__item active" href="logOut.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>

            </ul>

        </aside>
        <?php

    }else if($member_category_id == '3' ) {

        ?>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div>

                <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="./images/ab.jpg" width="60" alt="User Image">
                    <p class="app-sidebar__user-name">Purchasing Officer<br><?php echo $first_name  ?><br><?php echo $last_name ; ?></p>
                    <p class="app-sidebar__user-designation">

                </div>
            </div>


            <ul class="app-menu">

                <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">GRN</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_grn.php"><i class="icon fa fa-circle-o"></i> Add GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="new_grn.php"><i class="icon fa fa-circle-o"></i>New GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="pettycash.php"><i class="icon fa fa-circle-o"></i>Petty Cash</a></li>
                    </ul>



                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Items</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_category.php"><i class="icon fa fa-circle-o"></i> Add New Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_item.php"><i class="icon fa fa-circle-o"></i> Add Item</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="searchCat.php"><i class="icon fa fa-circle-o"></i>Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="itemView.php"><i class="icon fa fa-circle-o"></i>Items</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock.php"><i class="icon fa fa-circle-o"></i>Stock</a></li>
                    </ul>

                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Requestions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="receiptOrder.php"><i class="icon fa fa-circle-o"></i> Add Requisitions</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_req.php"><i class="icon fa fa-circle-o"></i> Requisitions</a>
                        </li>
                    </ul>


                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Supplier</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock-supplier.php"><i class="icon fa fa-circle-o"></i> Add Supplier</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="viewSupplier.php"><i class="icon fa fa-circle-o"></i> View Supplier</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Purchase Order Approve</span><i class="treeview-indicator fa fa-angle-right"></i></a>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="directReq.php"><i class="icon fa fa-circle-o"></i>Direct Purchase Request Items</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="store_direct.php"><i class="icon fa fa-circle-o"></i>Stock Direct Request Items</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="po_all.php"><i class="icon fa fa-circle-o"></i>Purchase Orders</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_po.php"><i class="icon fa fa-circle-o"></i>Complete PO</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="print_po.php"><i class="icon fa fa-circle-o"></i>Print Final PO</a></li>
                    </ul>


                </li>


                <li><a class="app-menu__item active" href="logOut.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>

            </ul>
        </aside>

        <?php
    }else if($member_category_id == '4' ){

        ?>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div>

                <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="./images/ab.jpg" width="60" alt="User Image" >
                    <p class="app-sidebar__user-name">Purchasing Manager <br><?php echo $first_name  ?><br><?php echo $last_name ; ?></p>
                    <p class="app-sidebar__user-designation">

                </div>
            </div>



            <ul class="app-menu">

                <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>


                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">GRN</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_grn.php"><i class="icon fa fa-circle-o"></i> Add GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="new_grn.php"><i class="icon fa fa-circle-o"></i>New GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="pettycash.php"><i class="icon fa fa-circle-o"></i>Petty Cash</a></li>
                    </ul>



                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Items</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_category.php"><i class="icon fa fa-circle-o"></i> Add New Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_item.php"><i class="icon fa fa-circle-o"></i> Add Item</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="searchCat.php"><i class="icon fa fa-circle-o"></i>Category</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="itemView.php"><i class="icon fa fa-circle-o"></i>Items</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock.php"><i class="icon fa fa-circle-o"></i>Stock</a></li>
                    </ul>

                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Requisitions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="receiptOrder.php"><i class="icon fa fa-circle-o"></i> Add Requisition</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_req.php"><i class="icon fa fa-circle-o"></i>Requisition</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="approve.php"><i class="icon fa fa-circle-o"></i>Requisition Approve</a></li>
                    </ul>

                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Supplier</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock-supplier.php"><i class="icon fa fa-circle-o"></i> Add Supplier</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="viewSupplier.php"><i class="icon fa fa-circle-o"></i> View Supplier</a></li>
                    </ul>
                </li>


                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Purchase Order Approve</span><i class="treeview-indicator fa fa-angle-right"></i></a>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="directReq.php"><i class="icon fa fa-circle-o"></i>Direct Purchase Request Items</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_req.php"><i class="icon fa fa-circle-o"></i>Store Keeper Requisition</a>
                        </li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="po_approve.php"><i class="icon fa fa-circle-o"></i>PO Approve</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="store_direct.php"><i class="icon fa fa-circle-o"></i>Stock Direct Request Items</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="po_all.php"><i class="icon fa fa-circle-o"></i>Purchase Orders</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_po.php"><i class="icon fa fa-circle-o"></i>Complete PO</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="print_po.php"><i class="icon fa fa-circle-o"></i>Print Final PO</a></li>
                    </ul>


                </li>

                <li><a class="app-menu__item active" href="logOut.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>

            </ul>

        </aside>

        <?php
    }else if($member_category_id == '5' ){

        ?>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div>

                <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="./images/ab.jpg" width="60" alt="User Image" >
                    <p class="app-sidebar__user-name">Depot / Regional Officer <br><?php echo $first_name  ?><br><?php echo $last_name ; ?></p>
                    <p class="app-sidebar__user-designation">

                </div>
            </div>



            <ul class="app-menu">

                <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>



                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">GRN</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_grn.php"><i class="icon fa fa-circle-o"></i> Add GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="new_grn.php"><i class="icon fa fa-circle-o"></i>New GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock.php"><i class="icon fa fa-circle-o"></i>Stock</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="pettycash.php"><i class="icon fa fa-circle-o"></i>Petty Cash</a></li>
                    </ul>



                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Issue Order</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_issue_order.php"><i class="icon fa fa-circle-o"></i> Add Issue Order</a></li>
                    </ul>

                </li>


                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Requisitions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="receiptOrder.php"><i class="icon fa fa-circle-o"></i> Add Requisitions</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_req.php"><i class="icon fa fa-circle-o"></i>Requisitions</a></li>
                    </ul>

                </li>

                <li><a class="app-menu__item active" href="logOut.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>

            </ul>

        </aside>

        <?php
    }else if($member_category_id == '6' ){

        ?>
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div>

                <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="./images/ab.jpg" width="60" alt="User Image" >
                    <p class="app-sidebar__user-name">Depot / Regional Manager<br><?php echo $first_name  ?><br><?php echo $last_name ; ?></p>
                    <p class="app-sidebar__user-designation">

                </div>
            </div>



            <ul class="app-menu">

                <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>


                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">GRN</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_grn.php"><i class="icon fa fa-circle-o"></i>Add GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="new_grn.php"><i class="icon fa fa-circle-o"></i>New GRN</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="stock.php"><i class="icon fa fa-circle-o"></i>Stock</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="pettycash.php"><i class="icon fa fa-circle-o"></i>Petty Cash</a></li>
                    </ul>



                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Issue Order</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="add_issue_order.php"><i class="icon fa fa-circle-o"></i> Add Issue Order</a></li>
                    </ul>

                </li>


                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Requisitions</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="receiptOrder.php"><i class="icon fa fa-circle-o"></i> Add Requisitions</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="view_req.php"><i class="icon fa fa-circle-o"></i> Requisitions</a></li>
                    </ul>

                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="approve.php"><i class="icon fa fa-circle-o"></i>Requisition Approve</a></li>
                    </ul>

                </li>


                <li><a class="app-menu__item active" href="logOut.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>

            </ul>

        </aside>
        <?php
    }
    ?>

