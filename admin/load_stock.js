$id = null;
function start($startId){
	$(document).ready(function() {
	    $.ajax({
	        url: "load_stock.php",
	        type: "POST",
	        data: {
	            id: $startId,
	            sort: "default",
	            search: "",
	        },
	        success: function(result) {
	            $("#result").append(result);

	        }
	    });
	    $id = $startId;
	}); 
}

function sortS(){
	$id = document.getElementById("category").value;
    $sort = document.getElementById("sort").value;
    $search = document.getElementById("search").value;
    if($search != "") $search = "nama_barang LIKE '%"+$search+"%' ";

    $("#result").remove();
    $(document).ready(function() {  
        $.ajax({
            url: "load_stock.php",
            type: "POST",
            data: {
                id: $id,
                sort: $sort,
                search: $search
            },
            success: function(result) {
                $("#next").append('<div id="result"></div>');
                $("#result").append(result);
                // alert("HAHA");
            }
        });
    }); 
} 




