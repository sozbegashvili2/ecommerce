<?php
$message = $message ?? false;
$data = $data ?? [];
?>
<div class="container" style="margin-top: 50px">
<form action="/add" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="proname">Product Name</label>
        <input value="<?php
        if($message and $data) {
            echo $data['proname'];
        }
        ?>" name="proname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name">
    </div>
    <div class="form-group">
        <label for="proprice">Product Price</label>
        <input value="<?php
        if($message and $data) {
            echo $data['proprice'];
        }
        ?>"  type="number" name="proprice" class="form-control" id="exampleInputPassword1" placeholder="Product Price">
    </div>
    <div class="form-group">
        <label for="proprice">Product Quantity</label>
        <input value="<?php
        if($message and $data) {
            echo $data['proquantity'];
        }
        ?>"  type="number" name="proquantity" class="form-control" id="exampleInputPassword1" placeholder="Product Quantity">
    </div>
    <div class="form-group">
        <label for="cat">Select Category</label>
        <select class="form-control" name="category" id="cat">
            <option value="1">CPU</option>
            <option value="2">CD/DVD</option>
            <option value="3">motherboards</option>
            <option value="4">harddrives</option>
            <option value="5">Monitors</option>
        </select>
    </div>
    <div class="form-group">
        <label for="brand">Select Brand</label>
        <select class="form-control" name="brand" id="brd">
            <option value="1">Asus</option>
            <option value="2">Dell</option>
            <option value="3">hp</option>
            <option value="4">htc</option>
            <option value="5">intel</option>
            <option value="6">microsoft</option>
        </select>
    </div>
    <div class="form-group">
        <label style="display: block" for="proprice">Select Product Image</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <?php
        if(isset($message)) {
            echo '<div class="container" style="color:red">'.$message.'</div>';
        }
        ?>
    </div>
    <div class="form-group">
        <label for="proprice">Product Description</label>
        <textarea name="descript" class="form-control" rows="5" id="desc"></textarea>
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>