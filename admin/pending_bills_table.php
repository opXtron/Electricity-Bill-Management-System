php
<?php
require_once('head_html.php'); 
require_once('../Includes/config.php'); 
require_once('../Includes/session.php'); 
require_once('../Includes/admin.php'); 
if ($logged==false) {
     header("Location:../index.php");
}

$sql = "SELECT user.name, user.email, bill.units, bill.amount, bill.bdate
        FROM user
        INNER JOIN bill ON user.id = bill.uid
        WHERE bill.status = 'PENDING'";
$query = $con->query($sql);

?>

<!-- Table to display users with pending bills -->
<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Units</th>
                <th>Amount</th>
                <th>Bill Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $query->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['units']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['bdate']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>