<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // fungsi untuk memeriksa session
    function checkSession() {
        // ambil session_token dari local storage
        // membuat objek FormData
     const formData = new FormData();
     formData.append('session_token', localstorage.getItem('session_token'));

     // kirim session_token ke server untuk memeriksanya
     axios.post('https://marselina-web.000webhostapp.com/session.php', formData)
     .then(response => {})
     // handle response dari server
     console.log(response);
     if response.data.hasil.name || 'Default name';
     localstorage.setItem('nama',nama);
    }else {
        // jika session masih aktif, arahkan kehalaman dashboard.php
        const nama = response.data.hasil.name ||'Default Name';
        localStorage.setItem('nama', nama);
    } else {
        // Jika session tidak aktif, lakukan yang sesuai (misalnya tampilkan pesan)
    window.location.href = 'login.php';
    }

.catch(error => {
    //handle kesalahan koneksi atau server
    console.error('Error checking session:', error);
})

// panggil fungsi checkSession saat halaman dimuat
checkSession();
</script>