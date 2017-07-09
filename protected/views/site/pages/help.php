<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Help';
$this->breadcrumbs=array(
	'Help',
    );
    ?>
    <div class="row faq">
        <div class="col-lg-3">
            <ol class="nav nav-pills nav-stacked">
                <li><a href="#introduce" data-toggle="collapse" data-parent="#accordion">1. Pengenalan</a></li>
                <li><a href="#kebutuhan" data-toggle="collapse" data-parent="#accordion">2. Kebutuhan</a></li>          
                <li><a href="#instalasi" data-toggle="collapse" data-parent="#accordion">3. Instalasi</a></li>
                <li><a href="#login" data-toggle="collapse" data-parent="#accordion">4. Login</a></li>
                <li><a href="#dashboard" data-toggle="collapse" data-parent="#accordion">5. Dashboard</a></li>          
                <li><a href="#add_project" data-toggle="collapse" data-parent="#accordion">6. Tambah Data Project</a></li> 
                <li><a href="#list_project" data-toggle="collapse" data-parent="#accordion">7. Melihat Data Project</a></li>
                <li><a href="#manage_project" data-toggle="collapse" data-parent="#accordion">8. Mengelola Data Project</a></li> 
                <li><a href="#view_project" data-toggle="collapse" data-parent="#accordion">9. Detail Data Project</a></li> 
                <li><a href="#add_customer" data-toggle="collapse" data-parent="#accordion">10. Tambah Data Customer</a></li> 
                <li><a href="#list_customer" data-toggle="collapse" data-parent="#accordion">11. Melihat Data Customer</a></li>
                <li><a href="#add_invoice" data-toggle="collapse" data-parent="#accordion">12. Membuat Invoice</a></li> 
                <li><a href="#view_invoice" data-toggle="collapse" data-parent="#accordion">13. Melihat Data Invoice</a></li>
                <li><a href="#print_invoice" data-toggle="collapse" data-parent="#accordion">14. Print Invoice</a></li>
                <li><a href="#export_report" data-toggle="collapse" data-parent="#accordion">15. Mencetak Laporan</a></li> 
            </ol>
        </div>
        <div class="col-lg-9">
            <div class="row faq">

                <div class="col-lg-12">
                    <div class="panel-group" id="accordion">

                        <!-- START : 1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#introduce" class="collapsed">
                                    <h4 class="panel-title">
                                        Pengenalan
                                    </h4>
                                </a>
                            </div>
                            <div id="introduce" class="panel-collapse in" style="height: auto;">
                                <div class="panel-body">
                                    Human Resource Management Project Berbasis Web merupakan aplikasi perangkat lunak yang difokuskan untuk mengelola data proyek, data karyawan, dan pembuatan laporan <br><br>

                                    Sistem ini dibangun dengan menggunakan framework PHP yakni YII versi 1, untuk tampilannya sendiri menggunakan framework css bootsrap 3.0. <br><br>

                                    Aplikasi yang dapat menunjang proses managemen proyek untuk membantu perusahaan dalam mengelola data proyek serta proses pengawasan sdm. Membantu mendapatkan informasi mengenai informasi proyek yang sudah atau sedang dikerjakan karyawan.
                                </div>
                            </div>
                        </div>
                        <!-- END : 1 -->

                        <!-- START : 2 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#kebutuhan" class="collapsed">
                                    <h4 class="panel-title">
                                        Kebutuhan Sistem
                                    </h4>
                                </a>
                            </div>
                            <div style="height: 0px;" id="kebutuhan" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <H3>
                                        Kebutuhan Perangkat Keras
                                    </H3>
                                    Perangkat  keras  yang  digunakan  untuk  implementasi  perangkat  lunak  ini  adalah sebagai  berikut  :
                                    <ol>
                                        <li>Prosessor  2,26 Ghz </li>
                                        <li>Memory (RAM) 512MB </li>
                                        <li>Motherboard </li>
                                        <li>VGA on board </li>
                                        <li>Keyboard standar 101/102 key </li>
                                        <li>Mouse </li>
                                        <li>Hardisk  dengan  space kosong minimum  100Mb </li>
                                        <li>Monitor </li>
                                    </ol>
                                    <br>

                                    <H3>
                                        Kebutuhan Perangkat Lunak
                                    </H3>
                                    Kebutuhan perangkat  lunak  yang  akan  digunakan  untuk  menunjang  implementasi  pernagkat  lunak  ini  adalah sebagai  berikut  :
                                    <ol>
                                        <li>Sistem  Operasi  Microsoft Windows</li>
                                        <li>PHP dan Mysql</li>
                                        <li>Web Browser  seperti  Mozilla Firefox, Google Chrome dll</li>
                                        <li>Sublime Text Editor</li>
                                        <li>Yii Framework</li>
                                        <li>XAMPP</li>
                                    </ol>
                                    Untuk  perangkat  lunak  PHP,  Apache  dan  MySQL,  sudah  terintegrasi  dengan software  XAMPP  pada  saat  menginstall  software  tersebut  maka  secara  langsung akan mengisntal  PHP, Mysql dan Apache.
                                    <br><br>

                                    <H3>
                                        Kebutuhan Brainware
                                    </H3>
                                    Agar  sistem  berjalan  sebagaimana  fungsinya,  maka  dibutuhkan  sumber  daya  lain selain  dari  kebutuhan  perangkat  keras  dan  peran gkat  lunak  di   atas,  yaitu kebutuhan  akan sumber  daya manusia  seperti administrator dan programmer.


                                </div>
                            </div>
                        </div>
                        <!-- END : 2 -->


                        <!-- START : 3 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#instalasi" class="collapsed">
                                    <h4 class="panel-title">
                                        Konfigurasi
                                    </h4>
                                </a>
                            </div>
                            <div style="height: 0px;" id="instalasi" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <H3>
                                        Cara Instalasi Aplikasi
                                    </H3>
                                    Implementasi  antarmuka  dilakukan  untuk  melihat  dialog  screen  yang  ada  pada perangkat  lunak  yang  dibuat.  Pada  tahap  ini  dijelaskan  uraian  dan  kegunaan  dari masing- masing  dialog  screen  tersebut.  Untuk  dapat  melihat  dialog  screen  dari perangkat  lunak  tersebut ada beberapa persiapan  yang  harus dilakuakan  yaitu  :
                                    <br><br>

                                    <ol>
                                        <li>Install  perangkat  lunak  XAMPP pada komputer</li>
                                        <li>Install dan Buka Web Browser  pada computer, kemudian ketik alamat <code>http://localhost/phpmyadmin</code></li>
                                        <li>Buat Database Baru dengan nama dbproject_dokterdesain</li>
                                        <li>Import file <code>dbproject_dokterdesain.sql</code> ke dalam database yang dibuat</li>
                                        <li>Simpan  aplikasi  managemen project baru  pada  root   folder  xampp  yaitu di <code>C:\xampp\ htdocs</code></li>
                                        <li>Karena  implementasi  antarmuka  dilakukan  melalui  localhost ,  maka  buka browser,  lalu  ketikkan  pada  adress  bar  alamat  aplikasi  managemen project seperti berikut  ini: <code>http://localhost/dokterdesain</code></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END : 3 -->


                        <!-- START : 4 Form Login -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#login" class="collapsed">
                                    <h4 class="panel-title">
                                        Login
                                    </h4>
                                </a>
                            </div>
                            <div style="height: 0px;" id="login" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <H3>
                                        Cara Login ke Sistem
                                    </H3>
                                    Untuk dapat masuk ke sistem, ketik alamat <code>http://localhost/dokterdesain</code> pada address bar browser, kemudian akan muncul tampilan form login seperti berikut:
                                    <br><br>

                                    <img src="Help/img/login.png">
                                    <br><br>

                                    <b>Uraian Cara Penggunaan:</b>
                                    <ol>
                                        <li>Pada bagian Login form input untuk username dan password.</li>
                                        <li>Pengguna dapat mengisi username dan password pada field yang sudah disediakan.</li> 
                                        <li>Tombol login dipakai untuk masuk ke sistem dan jika datanya valid maka user akan masuk ke halaman menu utama, apabila tidak maka akan kembali ke form login.</li>
                                    </ol>

                                </div>
                            </div>
                        </div>
                        <!-- END : 4 Form Login -->

                        <!-- START : 5 Dashboard -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#dashboard" class="collapsed">
                                    <h4 class="panel-title">
                                        Penggunaan Dashboard
                                    </h4>
                                </a>
                            </div>
                            <div style="height: 0px;" id="dashboard" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <img src="Help/img/2. Dashboard.png">
                                    <br><br>

                                    <b>Uraian Cara Penggunaan:</b>
                                    <ol>
                                        <li>Pada Menubar terdapat tombol menu Home untuk menampilkan dashboard managemen project. Dan menu Project untuk menampilkan data project secara keseluruhan.</li>
                                        <li>Kemudian pada sidebar kiri terdapat menu Add Project, menu ini digunakan untuk menambahkan data project, jika di klik akan menampilkan form input data project.</li>
                                        <li>Pada Bagian Sidebar terdapat informasi user yang login ke dalam sistem, user bisa melihat profile, edit profile user dan tombol logout untuk keluar.</li>
                                        <li>Menu Sidebar List Project digunakan untuk menampilkan data project user yang mengelola data project tersebut.</li>
                                        <li>Klik Master Data, untuk menampilkan menu data master Customer, jika di klik akan list data customer, Klik Add Customer untuk menambahkan data atau klik Manage Customer untuk menampilkan data customer.</li>
                                        <li>Menu Report digunakan untuk menampilkan laporan (report) data master dan transaksi</li>
                                        <li>Menu Accounts untuk melihat informasi user, dapat menambahkan data user serta melihat list data user</li>
                                        <li>Menu Assigments digunakan untuk mengatur hak akses user</li>
                                    </ol>


                                </div>
                            </div>
                        </div>
                        <!-- END : 5 Dashboard -->

                        <!-- START : 6 Add Project -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#add_project" class="collapsed">
                                    <h4 class="panel-title">
                                     Menambahkan Data Project
                                 </h4>
                             </a>
                         </div>
                         <div style="height: 0px;" id="add_project" class="panel-collapse collapse">
                            <div class="panel-body">

                                <img src="Help/img/4. Add Project.png">
                                <br><br>

                                <b>Uraian Cara Penggunaan:</b>
                                <ol>
                                 <li>Klik Add Project untuk memunculkan menu Dialog input data.</li>
                                 <li>Isikan Form sesuai data project.</li>
                                 <li>Klik Select Customer untuk memilih data sesuai data master customer.</li>
                                 <li>Pada Data Range jika di klik form input starting maka akan memunculkan dialog input tanggal begitu juga dengan ending.</li>
                                 <li>Pada Bagian Payment Method jika salahsatu radio button di klik maka akan memunculkan form inputan yang lain untuk jenis pembayaran pay per month dan termin.</li>
                                 <li>Klik Add Detail Project untuk memunculkan form inputan baru secara dinamis dan klik Add Payment Termin untuk memuncukan form inputan baru secara dinamis juga.</li>
                                 <li>Klik Create untuk menyimpan data project.</li>

                             </ol>

                         </div>
                     </div>
                 </div>
                 <!-- END : 6 List Project -->

                 <!-- START : 7 List Project -->
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#list_project" class="collapsed">
                            <h4 class="panel-title">
                                Menampilkan List Project
                            </h4>
                        </a>
                    </div>
                    <div style="height: 0px;" id="list_project" class="panel-collapse collapse">
                        <div class="panel-body">

                            <img src="Help/img/3. List Project.png">
                            <br><br>

                            <b>Uraian Cara Penggunaan:</b>
                            <ol>
                                <li>Pada bagian atas terdapat 3 menu diantaranya adalah menu Add Project berfungsi untuk menambahkan data project, Manage Project digunakan untuk menampilkan data dalam bentuk table, dan Export to Excel digunakan untuk menyimpan data list project ke dalam bentuk excel.</li>
                                <li>Klik icon (+) plus untuk memunculkan informasi tentang detail project yang memuat informasi project, jika di klik icon (x) close maka akan menghapus data project secara sementara.</li>
                                <li>Pada bagian data project terdapat nama user, jika di klik nama user tersebut, maka akan di arahkan ke informasi detail project.</li>
                            </ol>

                        </div>
                    </div>
                </div>
                <!-- END : 7 List Project -->

                <!-- START : 8 Manage Project -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#manage_project" class="collapsed">
                            <h4 class="panel-title">
                                Mengelola Data Project
                            </h4>
                        </a>
                    </div>
                    <div style="height: 0px;" id="manage_project" class="panel-collapse collapse">
                        <div class="panel-body">

                            <img src="Help/img/5. Admin Project.png">
                            <br><br>

                            <b>Uraian Cara Penggunaan:</b>
                            <ol>
                                <li>Klik Add Project untuk menambah data project baru.</li>
                                <li>Klik List Project untuk melihat daftar project secara horizontal</li>
                                <li>Klik Export to Excel untuk menyimpan data project ke dalam bentuk dokumen office excel</li>
                                <li>Klik icon search untuk melihat detail data project.</li>
                                <li>Klik icon pencil untuk mengedit/mengupdate data data project.</li>
                                <li>Klik icon trash untuk menghapus data data project, jika di klik icon trash maka akan memunculkan alert konfirmasi</li> 
                                <li>Klik OK untuk menghapus data project, dan jika batal klik Cancel.</li>
                            </ol>

                        </div>
                    </div>
                </div>
                <!-- START : 8 Manage Project -->


                <!-- START : 9 Detail Project -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#view_project" class="collapsed">
                            <h4 class="panel-title">
                                Melihat Detail Data Project
                            </h4>
                        </a>
                    </div>
                    <div style="height: 0px;" id="view_project" class="panel-collapse collapse">
                        <div class="panel-body">

                            <img src="Help/img/5. Detail Project.png">
                            <br><br>

                            <b>Uraian Cara Penggunaan:</b>
                            <ol>
                                <li>Pada bagian atas terdapat beberapa menu seperti Add Project, List, Update, Delete, Manage dan Create Invoice.</li>
                                <li>Klik Add Project untuk menambahkan data project</li>
                                <li>Klik List untuk menampilkan data project dalam bentuk list</li>
                                <li>Klik Update untuk memperbaharui data project</li>
                                <li>Klik Delete untuk menghapus data project</li>
                                <li>Klik Manage untuk menampilkan data project dalam bentuk table</li>
                                <li>Klik Create Invoice untuk membuat invoice (lembar penagihan) sebuah proyek sesuai dengan jenis pembayarannya.
                                    <li>Pada dagian Tabel Detail Project terdapat kolom Progress jika di klik “On Progress” maka statusnya akan berubah menjadi “Done”, jika ingin membatalkan klik “Cancel”</li>
                                </ol>

                            </div>
                        </div>
                    </div>
                    <!-- START : 9 Detail Project -->

                    <!-- START : 10 Add Customer -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a data-toggle="collapse" data-parent="#accordion" href="#add_customer" class="collapsed">
                                <h4 class="panel-title">
                                 Menambahkan Data Customer
                             </h4>
                         </a>
                     </div>
                     <div style="height: 0px;" id="add_customer" class="panel-collapse collapse">
                        <div class="panel-body">

                            <img src="Help/img/6. Add Customer.png">
                            <br><br>

                            <b>Uraian Cara Penggunaan:</b>
                            <ol>
                                <li>Klik Customer kemudian Add Customer untuk memunculkan menu Dialog input data.</li>
                                <li>Isikan Form sesuai data customer.</li>
                                <li>Cutomer Code merupakan form inputan yang di buat secara otomatis</li>
                                <li>Klik Create untuk menyimpan data project.</li>
                            </ol>

                        </div>
                    </div>
                </div>
                <!-- END : 10 Add Customer -->

                <!-- START : 11 List Customer -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#list_customer" class="collapsed">
                            <h4 class="panel-title">
                             Menambahkan Data Customer
                         </h4>
                     </a>
                 </div>
                 <div style="height: 0px;" id="list_customer" class="panel-collapse collapse">
                    <div class="panel-body">

                        <img src="Help/img/7. Customer List.png">
                        <br><br>

                        <b>Uraian Cara Penggunaan:</b>
                        <ol>
                            <li>Klik Customer kemudian Add Customer untuk memunculkan form input data</li>
                            <li>Klik Manage Customer untuk melihaf daftar customer dalam bentuk table</li>
                        </ol>

                    </div>
                </div>
            </div>
            <!-- END : 11 List Customer -->

            <!-- START : 12 List Customer -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#list_customer" class="collapsed">
                        <h4 class="panel-title">
                         Menambahkan Data Customer
                     </h4>
                 </a>
             </div>
             <div style="height: 0px;" id="list_customer" class="panel-collapse collapse">
                <div class="panel-body">

                    <img src="Help/img/7. Customer List.png">
                    <br><br>

                    <b>Uraian Cara Penggunaan:</b>
                    <ol>
                        <li>Klik Customer kemudian Add Customer untuk memunculkan form input data</li>
                        <li>Klik Manage Customer untuk melihaf daftar customer dalam bentuk table</li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- END : 12 List Customer -->

        <!-- START : 13 Add Invoice -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#add_invoice" class="collapsed">
                    <h4 class="panel-title">
                     Membuat Invoice
                 </h4>
             </a>
         </div>
         <div style="height: 0px;" id="add_invoice" class="panel-collapse collapse">
            <div class="panel-body">

                <img src="Help/img/12. Add Invoice.png">
                <br><br>

                <b>Uraian Cara Penggunaan:</b>
                <ol>
                    <li>Klik Detail Project kemudian klik Create Invoice untuk memunculkan menu Dialog input data.</li>
                    <li>Isikan Form sesuai data untuk melakukan penagihan terhadap customer.</li>
                    <li>Bank Account merupakan form inputan untuk mencari data akun bank yang di jika di cari makan akan memunclkan data bank disebelah kanan form.</li>
                    <li>Klik Create untuk menyimpan data invoice. </li>
                </ol>

            </div>
        </div>
    </div>
    <!-- END : 13 Add Invoice -->


    <!-- START : 14 Add Invoice -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <a data-toggle="collapse" data-parent="#accordion" href="#view_invoice" class="collapsed">
                <h4 class="panel-title">
                 Melihat Detail Invoice
             </h4>
         </a>
     </div>
     <div style="height: 0px;" id="view_invoice" class="panel-collapse collapse">
        <div class="panel-body">

            <img src="Help/img/13. Detail Invoice.png">
            <br><br>

            <b>Uraian Cara Penggunaan:</b>
            <ol>
                <li>Klik Detail Project kemudian klik Create Invoice untuk memunculkan menu Dialog input data.</li>
                <li>Isikan Form sesuai data untuk melakukan penagihan terhadap customer.</li>
                <li>Bank Account merupakan form inputan untuk mencari data akun bank yang di jika di cari makan akan memunclkan data bank disebelah kanan form.</li>
                <li>Klik Create untuk menyimpan data invoice. </li>
            </ol>

        </div>
    </div>
</div>
<!-- END : 14 Add Invoice -->

<!-- START : 15 Add Invoice -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a data-toggle="collapse" data-parent="#accordion" href="#print_invoice" class="collapsed">
            <h4 class="panel-title">
             Melihat Print Invoice
         </h4>
     </a>
 </div>
 <div style="height: 0px;" id="print_invoice" class="panel-collapse collapse">
    <div class="panel-body">

        <img src="Help/img/14. Print Invoice.png">
        <br><br>

        <b>Uraian Cara Penggunaan:</b>
        <ol>
            <li>Tekan CTRL + P untuk mencetak dokumen invoice, maka akan muncul kotak dialog print dokumen, kemudian klik OK.</li>
        </ol>

    </div>
</div>
</div>
<!-- END : 15 Add Invoice -->


<!-- START : 15 Print Invoice -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a data-toggle="collapse" data-parent="#accordion" href="#list_invoice" class="collapsed">
            <h4 class="panel-title">
             Melihat List Invoice
         </h4>
     </a>
 </div>
 <div style="height: 0px;" id="list_invoice" class="panel-collapse collapse">
    <div class="panel-body">

        <img src="Help/img/10. Invoice.png">
        <br><br>

        <b>Uraian Cara Penggunaan:</b>
        <ol>
            <li>Klik Customer kemudian Add Customer untuk memunculkan form input data</li>
            <li>Klik Manage Customer untuk melihaf daftar customer dalam bentuk table</li>
        </ol>

    </div>
</div>
</div>
<!-- END : 15 Print Invoice -->

<!-- START : 16 Assigments -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a data-toggle="collapse" data-parent="#accordion" href="#assigments" class="collapsed">
            <h4 class="panel-title">
             Mengatur Hak Akses
         </h4>
     </a>
 </div>
 <div style="height: 0px;" id="assigments" class="panel-collapse collapse">
    <div class="panel-body">

        <img src="Help/img/8. Assigment.png">
        <br><br>

        <b>Uraian Cara Penggunaan:</b>
        <ol>
            <li>Klik Assignment : ini adalah menu yang digunakan untuk memberikak hak akses kepada seorang user. Hak akses yang diberikan bisa dengan cara memberikan pangkat (level) kepada seorang user atau memberikan langsung izin seorang user mengakses sebuah “task” (controller) atau lebih detail lagi sebuah operastion (action di dalam controller).</li> 
            <li>Klik Permissions : adalah tempat dimana pengguna menentukan suatu level boleh mengakses siapa saja. Misal pengguna memiliki level “Superuser” pengguna mengizinkan dia mengakses actionCreate, actionDelete, dan actionUpdate. pengguna cukup mengeset nilai “assign”(mengizinkan) atau “revoke” (tidak mengizinkan) pada level “Superuser”. Dan tentu saja ini dapat dilakukan konfigurasinya pada semua level.</li>
            <li>Klik Roles : tempat dimana pengguna dapat menentukan level-level yang ada di dalam sistem pengguna.</li>
            <li>Klik Tasks : pengguna dapat menentukan tasks apa saja yang ada di dalam sistem pengguna. Biasanya digunakan untuk memberikan hak penuh pada suatu controller di semua actionnya.</li>
            <li>Klik Operations : digunakan untuk melakukan pengesetan level akses user pada suatu action yang ada di controller.</li>

        </ol>

    </div>
</div>
</div>
<!-- END : 16 Assigments -->

<!-- START : 17 Report -->
<div class="panel panel-default">
    <div class="panel-heading">
        <a data-toggle="collapse" data-parent="#accordion" href="#export_report" class="collapsed">
            <h4 class="panel-title">
             Menyimpan data ke file Excel
         </h4>
     </a>
 </div>
 <div style="height: 0px;" id="export_report" class="panel-collapse collapse">
    <div class="panel-body">

        <img src="Help/img/9. Report.png">
        <br><br>

        <b>Uraian Cara Penggunaan:</b>
        <ol>
            <li>Pilih Data Transaksi atau Data Master yang akan di download</li>
            <li>Kemudian Klik Download Report, Maka secara otomatis akan meng-unduh file excelnya</li>
        </ol>

    </div>
</div>
</div>
<!-- END : 17 Report -->


</div>
</div>
</div>                
</div>
</div>