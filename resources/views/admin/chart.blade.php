@extends('layout/v_template')

@section('content')
<!-- Content Header (Page header) - Improved -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="text-primary"><i class="fas fa-chart-line mr-2"></i>Statistik Mahasiswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i>Admin</a></li>
          <li class="breadcrumb-item active">Statistik</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content - Improved -->
<section class="content">
  <div class="container-fluid">
    <div class="row mb-4">
      <div class="col-12">
        <div class="card shadow-lg rounded-lg">
          <div class="card-header bg-gradient-primary text-white">
            <h3 class="card-title font-weight-bold">
              <i class="fas fa-university mr-2"></i>Statistik Mahasiswa per Jurusan
            </h3>
            <div class="card-tools">
              <div class="btn-group">
                <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-filter mr-1"></i> Filter
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#" onclick="updateChart('bar')">Bar Chart</a>
                  <a class="dropdown-item" href="#" onclick="updateChart('pie')">Pie Chart</a>
                  <a class="dropdown-item" href="#" onclick="updateChart('doughnut')">Doughnut Chart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center mb-3">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-primary active">
                  <input type="radio" name="chartType" autocomplete="off" value="bar" checked> Bar
                </label>
                <label class="btn btn-outline-primary">
                  <input type="radio" name="chartType" autocomplete="off" value="pie"> Pie
                </label>
                <label class="btn btn-outline-primary">
                  <input type="radio" name="chartType" autocomplete="off" value="doughnut"> Doughnut
                </label>
              </div>
            </div>
            <div class="chart-container" style="position: relative; height:400px; width:100%">
              <canvas id="myChart"></canvas>
            </div>
          </div>
          <div class="card-footer bg-light">
            <small class="text-muted">
              <i class="fas fa-info-circle mr-1"></i> Data terakhir diperbarui: {{ now()->format('d F Y H:i') }}
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let myChart;

  document.addEventListener('DOMContentLoaded', function() {
    renderChart('bar');
    
    // Add event listeners for chart type buttons
    document.querySelectorAll('input[name="chartType"]').forEach(radio => {
      radio.addEventListener('change', function() {
        renderChart(this.value);
      });
    });
  });

  function renderChart(type) {
    const ctx = document.getElementById('myChart').getContext('2d');
    const labels = @json($statistik->pluck('nama_jurusan'));
    const data = @json($statistik->pluck('total'));
    
    // Destroy previous chart if exists
    if (myChart) {
      myChart.destroy();
    }
    
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(58, 123, 213, 0.8)');
    gradient.addColorStop(1, 'rgba(0, 210, 255, 0.6)');
    
    const chartData = {
      labels: labels,
      datasets: [{
        label: 'Jumlah Mahasiswa',
        data: data,
        backgroundColor: type === 'bar' ? [
          gradient,
          'rgba(255, 193, 7, 0.85)',
          'rgba(40, 167, 69, 0.85)',
          'rgba(220, 53, 69, 0.85)',
          'rgba(111, 66, 193, 0.85)',
          'rgba(253, 126, 20, 0.85)',
          'rgba(32, 201, 151, 0.85)'
        ] : [
          'rgba(54, 162, 235, 0.85)',
          'rgba(255, 206, 86, 0.85)',
          'rgba(75, 192, 192, 0.85)',
          'rgba(153, 102, 255, 0.85)',
          'rgba(255, 99, 132, 0.85)',
          'rgba(255, 159, 64, 0.85)',
          'rgba(40, 167, 69, 0.85)'
        ],
        borderColor: type === 'bar' ? 'rgba(255, 255, 255, 0.8)' : 'rgba(255, 255, 255, 0.8)',
        borderWidth: type === 'bar' ? 1 : 2,
        borderRadius: type === 'bar' ? 8 : 0,
        hoverBorderWidth: 2,
        hoverBorderColor: '#fff',
        hoverOffset: type === 'bar' ? 0 : 10
      }]
    };
    
    const commonOptions = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { 
          position: 'top',
          labels: {
            font: { size: 12 },
            padding: 20,
            usePointStyle: true,
            pointStyle: 'circle'
          }
        },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.8)',
          titleFont: { size: 14, weight: 'bold' },
          bodyFont: { size: 12 },
          padding: 12,
          cornerRadius: 8,
          displayColors: true,
          callbacks: {
            label: function(context) {
              let label = context.dataset.label || '';
              if (label) label += ': ';
              label += context.raw + ' mahasiswa';
              return label;
            }
          }
        }
      }
    };
    
    const typeSpecificOptions = {
      bar: {
        scales: {
          x: {
            grid: { display: false },
            ticks: { color: '#6c757d', font: { size: 12 } }
          },
          y: {
            beginAtZero: true,
            grid: { color: 'rgba(0,0,0,0.05)' },
            ticks: { 
              stepSize: Math.max(1, Math.round(Math.max(...data)/5)),
              color: '#6c757d',
              font: { size: 12 },
              callback: function(value) { return value % 1 === 0 ? value : ''; }
            }
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'Distribusi Mahasiswa per Jurusan',
            font: { size: 16, weight: 'bold' },
            color: '#343a40',
            padding: { bottom: 20 }
          }
        }
      },
      pie: {
        plugins: {
          title: {
            display: true,
            text: 'Persentase Mahasiswa per Jurusan',
            font: { size: 16, weight: 'bold' },
            color: '#343a40',
            padding: { bottom: 20 }
          }
        },
        cutout: '0%'
      },
      doughnut: {
        plugins: {
          title: {
            display: true,
            text: 'Komposisi Mahasiswa per Jurusan',
            font: { size: 16, weight: 'bold' },
            color: '#343a40',
            padding: { bottom: 20 }
          }
        },
        cutout: '50%'
      }
    };
    
    const options = { ...commonOptions, ...typeSpecificOptions[type] };
    
    myChart = new Chart(ctx, {
      type: type,
      data: chartData,
      options: options
    });
  }
  
  function updateChart(type) {
    renderChart(type);
  }
</script>
@endsection