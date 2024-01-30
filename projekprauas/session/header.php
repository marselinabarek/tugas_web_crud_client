<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <!-- DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- Tambahkan pustaka-pustaka Excel dan PDF -->
<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>



<!DOCTYPE html>
<html lang="en">

<head>
<style>
body {
background-color: #f8f9fa;
 font-family: 'Arial', sans-serif;
}
 .container {
margin-top: 50px;
}
.card-header {
 background-color: #28a745;
color: #fff;
font-size: 1.5rem;
 }
 .card-body {
 background-color: #fff;
border: 1px solid #ddd;
 border-radius: 10px;
 padding: 20px;
}
 #newsChart {
 margin-top: 20px;
 }
 </style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale-1.0">
<link rel="stylesheet" href="https://stackpath.boostrapcdn.com/boostrap/4.3.1/css/boostrap.min.css">
<title>Dashboar</title>

<body>
    
<nav class="navbar navbar-expand-md navbar-light bg-info">
<a class="navbar-brand text-white" href="#">manajemen data pengguna</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link text-white" href="#" onclick="keloladata()">Tambah Data</a>
  <li class="nav-item">
    <a class="nav-link text-white" href="#">Kelola Data</a>
</li>
<li class="nav-item">
    <a cla="nav-link text-white" href="#" onclick="logout()">logout</a>
</li>
</ul>
</div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function dashboard() {
        window.location.href = 'index.php';
    }

    funtion tambah data(){
        window.location.href = 'tambah.php';
    }
    function keloladata() {
window.location.href = 'kelola.php';
}

       // mendapatkan session token dari tempat penyimpanan yang sesuai 
       const sessionTokenm= localStorage.getItem('session_token');//gantilah dnegan
       //hapus 'nama' dari localstorage saat logout
       localstorage.removeItem('nama');
       //membuat objek formdata
       const formData = new formData();
       formData.append('session_token', sessionToken);

       //konfigurasi axios untuk logout
       axios.post('https://marselina-web.000webhostapp.com/logout.php', formData)
       .then(response => {
        //handle respons dari server
        if (response.data.status == 'succes') {
            //jika logout berhasil, arahkan kembali ke halaman login
            localstorage.removeItem('nama');
            localstorage.removeItem('session_token');
            window.location.href = 'login.php';
        } else {
            //jika logout gagal, maka tampilkan pesan kesalahan
            alert('logout failed, please try again.');
        }
        })
        .catch(error => {
            // handle kesalahan koneksi atau server
            console.error('error during logout:', error);
        });

        
 <link rel="stylesheet“ href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

       
       </script>
</html>