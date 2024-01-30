<?php
include('header.php');
include('check_session.php');
?>

<div class="container mt-5">
    <h2 class="mb-4">List News</h2>

    <table id="newsTable" class="table table-striped">
      <thead>
        <tr>
            <th>No</th>
            <th>Tittle</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        <tr>
</thead>
<tbody></tbody>
</table>
</div>

<!--axios javascript -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){
    // initialize datatable
    var table = $('#newsTable').DataTable({
"processing": true,
"serverSide": true,
"ajax": function(data, callback, settings) {
axios.get('https://marselina-web.000webhostapp.com/listnew.php', {
    
})
},
"columns": [

]
        });
});

function deleteNews (id){
var formData = new FormData();
formData.append('idnews',);

if (confirm("Are you sure want to delete this news?")) {
    axios.post('https://tugaswebpatricia.000webhostapp.com/deletenews.php', formData)
.then(function(response){
    alert(response.data);
    // Refresh the Datatable after delection
    $('#newsTable').DataTable().ajax.reload();

})
.catch(function(error){
    console.error(error);
    alert('Error deleting news');
});
}

}
</script>