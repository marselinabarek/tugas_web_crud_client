<?php
include ('header.php')
?>
<div class="container">
<div class="container mt-5">
    <!--konten dashboar-->
    <h2 id="welcomemessage">Selamat datang di Dashboard</h2>
    <div class="row">
        <div class="col-md-12">
            <button onclick="downloadExcel()" class="btn btn-succes mr-2">
            <i class="fas fa-download"></i> Unduh Excel
</button>
<button onclick="downloadPDF()" class="btn btn-succes mr-2">
            <i class="fas fa-download"></i> Unduh PDF
</button>
</div>
<div>
    <!--isi dengan konten dashboard lainnya-->
<div class="row">
 <div class="col-md-6 offset-md-3 text-center">
<div class="card bg-success my-4">
 <div class="card-header">
 Akumulasi Berita
 </div>
 <div class="card-body">
<h3 id="jumlahBerita" class="text-dark">
 <i class="fas fa-newspaper"></i> Loading... </h3>
 </div>
 </div>
</div>
 </div>
<div class="form-row">
 <div class="form-group col-md-6">
 <label for="tahunSelect">Pilih Tahun</label>
 <select class="form-control" id="tahunSelect"></select>
 </div>
</div>
<hr> 
<h2 class="text-center">GRAFIK JUMLAH BERITA DALAM 1 TAHUN</h2>
 <div class="row">
 <div class="col-md-12">
 <canvas id="newsChart" width="400" height="200"></canvas>
</div>
 </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    
    // console.log(localstorage.getItem('nama"));
    document.getElementById('WelocomeMessage').innerText = 'selamat datang' + localStorage.getItem('nama');
    </script>
    
    <script>
      
        // fungsi untuk mengambil data dari API berdasarkan tahun menggunakan axios.post
        function fetchData(tahun) {
            var formData = new FormData();
            formData.append('tahun', tahun);

            return axios({
                method: 'post',
                url:'https://marselina-web.000webhostapp.com/sum_beritatahun.php',
                data: formData, 
                header: { 'Content-Type' : 'multipart/form-data'}
            });

        }

        // fungsi untuk membuat chart dengan data yang diambil
        function createChart(data) {
           var ctx = document.getElementById('newschart') .getcontext('2d');

           //check if there is an existing chart and destroy it
           var existingChart = Chart.getChart(ctx);
           if(existingChart) {

           }

           var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(item => item.bulan),
                dataset: [{
                    label:'Jumlah Berita',
                    data: data.map(item => item.jumlah_berita),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtzero: true,
                        ticks: {
                            stepsize: 1 //menetapkan langkah antar nilai pada sum

                        }
                    }
                }
            }
           });
        }

        // fungsi untuk mengisi select option dengan tahun
    function populateSelectOption(data) {
        var selectElement = document.getElementById('tahunSelect');
        data.forEach(item => {
            var option = document.createElement('option');
            option.value = item.tahun;
            option.text = item.tahun;
            selectElement.add(option);
        });
        
        // set default selected year to the latest year
        var latesYear = data[0].tahun;
        document.getElementById('tahunSelect').addEventListener('change'), function
         var SelectedYear = this.value;


        // fetch data and create the intial chart
        fetchData(seletedYear)
        .then(reponse => {
            var chartdata = response.data;
            createChart(chartData);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    }

    

    // event listener untuk perubahan select option tahun
    document.getElementById('tahunSelect').addEventListener('change', function (){

    });
    // inisialisai select option dengan data tahun dari API
    axios.get('https://marselina-web.000webhostapp.com/select_tahun.php')
    .then(response => {
        var tahunData = response.data;
        populateSelectOptions(tahunData);
    })
    .catch(error => {
        console.error('Error fetching tahun data: ', error);
    })
    // mengambil data jumlah berita dari API menggunakan axios
    axios.get('https://marselina-web.000webhostapp.com/sum_berita.php')
    .then(function (response){
        // memproses data yang diterima dari API
        var dataJumlahBerita = response.data;

        // mengambil elemen untuk menapilkan jalan berita
        var jumlahBeritaElement = document.getElementById('jumlahBerita');

        //menampilkan jumlah berita pada dashboard dengan font awesome icon
        jumlahBeritaElement.innerHTML = <i class="fas fa-newspaper"></i> Jumlah Berita: ${dataJumlahBerita[0].jumlah_berita};
    })
    .catch(function(error) {
       console.error('Error fetching data: ', error);
    });

    funtion downloadExcel(){
        //fetch data based on the selected year
        var selectedYear = document.getElementById('tahunSelect').value;
        fetchData(selectedYear)
        .then(response => {
            var data = response.data;

            // buat worksheet
            var ws = XLSX.utils.json_to sheet(data);

            //buat file excel
            var wb =  XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Laporan");

            // simpan file excel dan unduh
            XLSX.writeFile(wb, "Laporan_excel_" + selectedYear + ".xlsx");
        })
.catch(error => {
    console.error('Error fetching data for Excel:' , error);

});
}

function downloadPDF(){
    //ambil elemen canvas dari chart
    var canvas = document.getElementById('newsChart');

    //konversi elemen canvas menjadi gambar
    var imgData = canvas.toDataURL('image/png');
//ambil tahun terpilih dari dropdown
var selectedYear = document.getElementById('tahunSelect').value;

//definisikan content untuk pdf menggunakan pdfmake
var docDefinition = {
    content: [
        { text:'Laporan Tahun ' + selectedYear, style: 'header'}
        { image: imgData, width: 500},
    ],
    styles: {
        header:{
            fontsize: 18,
            bold: true,
            margin: [0, 0, 0, 0, 10],
        },
    },
}; 
// buat PDF menggunakan pdfmake
pdfMake.createPdf(docDefinition).download('laporan_'+ selectedYear + '_pdf.pdf');
}
</script>