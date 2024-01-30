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
    //fungsi login
    function login() {
        //mendapatkan nilai dari form
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        //membuat objek formData
        const formData = new FormData();
        formData.append('user', username);
        formData.append('pwd', password);

        //konfigurasi Axios
        axios.post('https://marselina-web.000webhostapp.com/login.php', formdata)
        .then(response => {
            console.log(response)
            //handle respons dari server
            if (response.data.status == 'succes') {
                //jika login berhasil,buka dashboard
                const sessionToken = response.data.session_token;
                localStrorage.setItem('session_token', sessionToken);
                window.location.href = 'index.php';
            } else {
                //jika login gagal, tampilkan pesan kesalahan
                alert('login failed, please check your credentials.');
            }
        })
        .catch(error => {
            //handle kesalahan koneksi atau server
            console.error('Error during login:' , error);
        });
    }
</script>
</body>
</html>