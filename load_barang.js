$id = null;
function start(startId){
    $id = startId;
    sortB();
}

function sortB(){
	$search = document.getElementById('search').value;
    if($search != "") $search = "nama_barang LIKE '%"+$search+"%' ";
    $sort = document.getElementById('sort').value;

    $("#result").remove();
    $(document).ready(function(){  
        $.ajax({
            url: "load_barang.php",
            type: "POST",
            data: {
                id: $id,
                sort: $sort,
                search: $search
            },
            success: function(result) {
                $("#next").append('<div class="row row-cols-2 row-cols-md-6 g-4" id="result"></div>');
                $("#result").append(result);
            },
        });
    }); 
} 
function sorting(){
    showLoading();
    sortB();
}