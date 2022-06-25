@extends('master')
@section('title', 'Index Page')

@section('content')

<div class="main p-3">
    <div class="row totalshow py-4">
        <div class="col-sm-3 col-6 p-2">
          <div class="card w-100">
            <div class="card-body">
              <h5 class="card-title">Total</h5>
              <p class="card-text">100</p>
            </div>
          </div>          
        </div>
        <div class="col-sm-3 col-6 p-2">
          <div class="card w-100">
            <div class="card-body">
              <h5 class="card-title">Store</h5>
              <p class="card-text">200</p>
            </div>
          </div>          
        </div>
        <div class="col-sm-3 col-6 p-2">
          <div class="card w-100">
            <div class="card-body">
              <h5 class="card-title">List</h5>
              <p class="card-text">200</p>
            </div>
          </div>          
        </div>
        <div class="col-sm-3 col-6 p-2">
          <div class="card w-100">
            <div class="card-body">
              <h5 class="card-title">New</h5>
              <p class="card-text">5</p>
            </div>
          </div>          
        </div>
    </div>
    <div class="row">
        <div class="col-4 col-6">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-4 col-6">
          <canvas id="myChart1"></canvas>
      </div>
      <div class="col-4 col-6">
        <canvas id="myChart2"></canvas>
    </div>
    <div class="col-4 col-6">
      <canvas id="myChart3"></canvas>
  </div>
    </div>

</div>

@endsection
@section('scr')
<script>

const labels = months({count:6});

const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Bar Chart'
      }
    }
  },
};
const config1 = {
  type: 'line',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Bar Chart'
      }
    }
  },
};
const config2 = {
  type: 'line',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Bar Chart'
      }
    }
  },
};
const config3 = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Bar Chart'
      }
    }
  },
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
const myChart1 = new Chart(
    document.getElementById('myChart1'),
    config1
);
const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
);
const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config3
);

</script>
@endsection
