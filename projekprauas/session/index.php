<!DOCTYPE html>
<html lang="en">
 <head>
    <meta class="container mt-5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/boostrap/4.3.1/css/boostrap.min.css">
    <title>Login Page</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Login</h2>
            <form id="loginform">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <Input type="text" class="form-control" id="username" name="username" required>
</div>
<div class="form-group">
    <label for="password">Password:</label>
    <input type="text" class="form-control" id="password" name="password" required>
</div>
<button type="button" class="btn btn-primary" onclick="login()">Login</button>
</form>
</div>
</div>
</div>
<script src="https://cdn.jsdeliver.net/npm/axios/dist/axios.min.js"></script>
<script>
    // fungsi untuk memeriksa session
    function checkSession() {
        // ambil session_token dari localstorage
        //membuat objek formdata
        const formdata = new FormData();
        formdata.append('session_token', localstorage.getItem('session_token'));

        // kirim session_token ke server untuk memeriksanya
        axios.post('https://marselina-web.000webhostapp.com/session.php', formData)
        .then(response.data.status === 'succes') {
            //jika session masih aktif, arahkan kehalaman dashboar.php
            const nama = response.data.hasil.name || 'Default name';
            localStorage.setItem('nama', nama);
            window.location.href = 'dashboar.php';

        } else {
            // jika session tidak aktif, lakukan yang sesuai ( misalnya tampilkan pesan)
            window.location.href = 'login.php'
    }
  }
  .catch(error => {
    // handle kesalahan koneksi atau server
    console.error('Error checking sesion:', error);
  });

 // panggil fungsi checksession saat halaman dimuat
 checkSession();
</script>