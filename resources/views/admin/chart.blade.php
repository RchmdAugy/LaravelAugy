@extends('layout/v_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chart</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Chart</li>
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
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card shadow rounded">
              <div class="card-header bg-primary text-white">
                <h3 class="card-title"><i class="fas fa-chart-bar mr-2"></i>Statistik Mahasiswa per Jurusan</h3>
              </div>
              <div class="card-body d-flex flex-column align-items-center justify-content-center" style="min-height:350px;">
                <canvas id="myChart" style="max-width:700px; width:100%; height:320px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('myChart').getContext('2d');
    const labels = @json($statistik->pluck('nama_jurusan'));
    const data = @json($statistik->pluck('total'));
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Jumlah Mahasiswa',
          data: data,
          backgroundColor: [
            'rgba(54, 162, 235, 0.85)',
            'rgba(255, 206, 86, 0.85)',
            'rgba(75, 192, 192, 0.85)',
            'rgba(153, 102, 255, 0.85)',
            'rgba(255, 99, 132, 0.85)',
            'rgba(255, 159, 64, 0.85)',
            'rgba(40, 167, 69, 0.85)'
          ],
          borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(40, 167, 69, 1)'
          ],
          borderWidth: 2,
          borderRadius: 8,
          barPercentage: 0.6,
          categoryPercentage: 0.6
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Jumlah Mahasiswa per Jurusan',
            font: { size: 20, weight: 'bold' },
            color: '#222'
          },
          tooltip: {
            backgroundColor: '#6366f1',
            titleColor: '#fff',
            bodyColor: '#fff',
            borderColor: '#3b82f6',
            borderWidth: 1
          }
        },
        scales: {
          x: {
            grid: { display: false },
            ticks: { color: '#222', font: { size: 14 } }
          },
          y: {
            beginAtZero: true,
            grid: { color: '#e5e7eb' },
            ticks: { stepSize: 1, color: '#222', font: { size: 14 } }
          }
        }
      }
    });
  });
</script>   
@endsection