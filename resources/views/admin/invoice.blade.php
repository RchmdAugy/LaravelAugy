@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="callout callout-info">
                      <h5><i class="fas fa-info-circle"></i> Catatan:</h5>
                      Halaman ini sudah dioptimalkan untuk pencetakan. Klik tombol print di bawah invoice untuk mencetak.
                    </div>
                    <div class="invoice p-4 mb-3 shadow rounded" style="background: #fff;">
                      <!-- title row -->
                      <div class="row mb-3">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-university text-primary"></i> SIAKAD Universitas
                            <small class="float-right">Tanggal: {{ date('d/m/Y') }}</small>
                          </h4>
                        </div>
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info mb-4">
                        <div class="col-sm-4 invoice-col">
                          Dari
                          <address>
                            <strong>Admin SIAKAD</strong><br>
                            Jl. Kampus No. 1<br>
                            Kota Pendidikan, Indonesia<br>
                            Telepon: (021) 123-4567<br>
                            Email: admin@universitas.ac.id
                          </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                          Untuk
                          <address>
                            <strong>John Doe</strong><br>
                            Jl. Mahasiswa No. 2<br>
                            Kota Pendidikan, Indonesia<br>
                            Telepon: (0812) 3456-7890<br>
                            Email: john.doe@email.com
                          </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                          <b>Invoice #INV-2025-001</b><br>
                          <br>
                          <b>ID Pesanan:</b> 4F3S8J<br>
                          <b>Jatuh Tempo:</b> {{ date('d/m/Y', strtotime('+7 days')) }}<br>
                          <b>Akun:</b> 968-34567
                        </div>
                      </div>
                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead class="thead-light">
                              <tr>
                                <th>Qty</th>
                                <th>Produk</th>
                                <th>Serial #</th>
                                <th>Deskripsi</th>
                                <th>Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>SPP Semester Genap</td>
                                <td>SPP-2025-01</td>
                                <td>Pembayaran SPP semester genap 2025</td>
                                <td>Rp 3.000.000</td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>Praktikum</td>
                                <td>PRK-2025-01</td>
                                <td>Biaya praktikum laboratorium</td>
                                <td>Rp 500.000</td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>Perpustakaan</td>
                                <td>LIB-2025-01</td>
                                <td>Iuran perpustakaan tahunan</td>
                                <td>Rp 150.000</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- Total row -->
                      <div class="row justify-content-end">
                        <div class="col-6">
                          <p class="lead">Total Tagihan</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>Rp 3.650.000</td>
                              </tr>
                              <tr>
                                <th>PPN (10%)</th>
                                <td>Rp 365.000</td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td><b>Rp 4.015.000</b></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- this row will not appear when printing -->
                      <div class="row no-print mt-4">
                        <div class="col-12">
                          <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                          <button type="button" class="btn btn-success float-right ml-2"><i class="far fa-credit-card"></i> Submit Payment</button>
                          <button type="button" class="btn btn-primary float-right"><i class="fas fa-download"></i> Generate PDF</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>   
@endsection