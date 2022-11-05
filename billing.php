<?php
session_start();
?>
<?php
require_once("functions/functions.php");
require_once("classes/dbConnection.php");

$sql= "SELECT * from  bills where status_bill ='0'
ORDER BY id_bill DESC";
$result=$conn->query($sql);

?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Sales</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Sales</a>
</li>
<li class="breadcrumb-item"><a href="">Sales</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-header">
    <div class="col-sm-10">
        <a href="addsales.php"><button class="btn btn-primary pull-right">+ Add New</button></a>
    </div>

</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>Id</th>
                    <th>Order Code</Code></th>
                    <th>Build Date</th>
                    <th>Total</th>
                    <th>Remark</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($result))
                {
foreach ($result as $rows) {
    ?>
                <tr class="odd gradeX">
                   <td><?php echo $rows['id_bill']; ?></td>                  
        <td><?php echo $rows['order_code']; ?></td>
         <td><?php echo $rows['date_order']; ?></td>
          <td><?php echo $rows['total']; ?></td>
        <td><?php echo $rows['id_customer']; ?></td>
        
        <td>    
            <a href="editsales.php?id=<?php echo $rows['id']?>"><input id="edit" type="submit" name="edit" value="Edit" class="btn btn-success"/></a>
          <a href="deletsales.php?id=<?php echo $rows['id']?>" onclick="return confirm('Are you sure to delete this record?')">  <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger" /></a>
        </td>
        </tr>
         <?php       
         } 
         }
         ?>      
                
            </tbody>
</table>
</div>
</div>
</div>


</div>

</div>
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
