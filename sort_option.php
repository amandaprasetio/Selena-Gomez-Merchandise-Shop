<!DOCTYPE html>
<html>
<body>
    <div class="d-flex justify-content-end">
        <div><?php include "search.php";?></div>
	<div class="p-2" style="margin-right: -8px"> 
        
        <script src="load_barang.js"></script>

            <select class="form-select" id='sort' onchange='
            sorting();'>
                <option value="default" selected>Default</option>
                <option value="inStock">In Stock</option>
                <option value="outOfStock">Out Of Stock</option>
                <option value="a-z">Alphabetically, A-Z</option>
                <option value="z-a">Alphabetically, Z-A</option>
                <option value="priceUp">Price, low to High</option>
                <option value="priceDown" >Price, high to low</option>
                <option value="dateUp">Date, new to old</option>
                <option value="dateDown">Date, old to new</option>
            </select>
        </div>
    </div>
</body>
</html>