<!DOCTYPE html>
<html>
<script src="load_stock.js"></script>
<body>
<div class="d-flex justify-content-end">
    <div class="p-2" style="margin-right: -8px; text-align: right;">
        <input type="text" size="25" class="form-control" placeholder="Search" value="" id="search" oninput="sortS()" onkeypress='return (event.charCode != 39)'/>
    </div>
    <div class="p-2" style="margin-right: -8px">
        <select class="form-select" id="category" onchange="sortS()">
            <option value="index" selected>Category:</option>
            <option value="index">All Item</option>
            <option value="revelación">Revelación</option>
            <option value="rare">Rare</option>
            <option value="revival">Revival</option>
            <option value="allmusic">All Music</option>
            <option value="vinyl">Vinyl</option>
            <option value="cd">CD</option>
            <option value="cassette" >Cassette</option>
            <option value="merch">All Merchandise</option>
            <option value="tees">Tees</option>
            <option value="sweatshirts">Sweatshirts</option>
            <option value="sweats">Sweats</option>
            <option value="accessories">Accessories</option>
        </select>
    </div>
    <div class="p-2" style="margin-right: -8px">
        <select class="form-select" id="sort" onchange="sortS()">
            <option value="" selected>Sort By:</option>
            <option value="default">Default</option>
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