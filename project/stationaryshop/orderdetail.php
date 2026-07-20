<?php
include("navbar.php");
?>
<style>
    /* Styling the main container for background continuity */
    .page-wrapper-custom {
        background-color: #3D2840;
        min-height: 80vh;
    }

    /* Modern Glassmorphic Card for the Table wrapper */
    .table-container-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        overflow: hidden; /* Keeps table corners rounded */
    }

    /* Table Reset & Layout adjustments */
    .custom-plum-table {
        margin-bottom: 0 !important;
        border-collapse: separate;
        border-spacing: 0;
    }

    /* Header styling with generous padding */
    .custom-plum-table thead th {
        background-color: rgba(0, 0, 0, 0.2) !important;
        color: #E8634A !important; /* ONLY Table Headings get this orange/red accent */
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        padding: 18px 24px !important;
        border-bottom: 2px solid rgba(255, 255, 255, 0.12) !important;
    }

    /* Row styling with clean paddings and borders */
    .custom-plum-table tbody td {
        padding: 16px 24px !important;
        vertical-align: middle;
        background-color: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        font-size: 0.95rem;
        color: #ffffff !important; /* Force ALL table cell text to be white by default */
    }

    /* Specific accent override for the Order ID column text */
    .custom-plum-table tbody td.order-id-cell {
        color: #FFC107 !important; /* Order ID column text remains a distinct gold color */
        font-weight: bold;
    }

    /* Remove border on the last item row */
    .custom-plum-table tbody tr:last-child td {
        border-bottom: none !important;
    }

    .custom-plum-table tbody tr {
        transition: background-color 0.25s ease;
    }
    
    .custom-plum-table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
    }
    th{font-size: 20px !important;}
</style>

<div class="container-fluid page-wrapper-custom py-5">
    <div class="container">
        
        <h4 class="text-white mb-4 fw-light">Order Items Breakdown</h4>
        
        <div class="table-container-card">
            <div class="table-responsive">
                <table class="table custom-plum-table">
                    <thead>
                        <tr>
                            <th>OrderID</th>
                            <th>Customer</th>
                            <th>Products</th>
                            <th>ProductsID</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['orderid'])) {
                            $orderID = $_GET['orderid'];
                            $safe_orderID = mysqli_real_escape_string($con, $orderID);
                            $fetch_data = mysqli_query($con, "SELECT * FROM `order_items` WHERE order_id='$safe_orderID' ");
                            
                            while ($all_data = mysqli_fetch_array($fetch_data)) {
                        ?>
                                <tr>
                                    <td class="order-id-cell">#<?php echo htmlspecialchars($all_data[1]); ?></td>
                                    
                                    <td><?php echo htmlspecialchars($all_data[2]); ?></td>
                                    <td><?php echo htmlspecialchars($all_data[4]); ?></td>
                                    <td><?php echo htmlspecialchars($all_data[3]); ?></td>
                                    <td><?php echo htmlspecialchars($all_data[5]); ?></td>
                                </tr>
                        <?php 
                            }
                        } else {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">No Order ID provided to view details.</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
<?php
include("footer.php");
?>