<!-- <div class="col-md-12"> -->
<canvas id="totalTalak" height="80"></canvas>
<canvas id="chart"></canvas>

<!-- </div> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
<script src='https://codepen.io/grayghostvisuals/pen/a08e0d79c150ff5030f9b6afaa137749.js'></script>
<!-- <script  src="./script.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>

    <?php foreach($queryLatihan as $data)
      {
      $bulanCerai[] = $data->tahun;
      $totalCerai[] = $data->TotalCerai;
      }
     ?>
     
var ctx = document.getElementById('totalTalak').getContext('2d');
ctx.height = 100;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($bulanCerai);?>,
        datasets: [{
            label: 'Total Cerai',
            data: <?php echo json_encode($totalCerai);?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// ============================================
// As of Chart.js v2.5.0
// http://www.chartjs.org/docs
// ============================================

var chart    = document.getElementById('chart').getContext('2d'),
    gradient = chart.createLinearGradient(0, 0, 0, 450);

gradient.addColorStop(0, 'rgba(255, 0,0, 0.5)');
gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');


var data  = {
    labels: [ 'January', 'February', 'March', 'April', 'May', 'June' ],
    datasets: [{
			label: 'Custom Label Name',
			backgroundColor: gradient,
			pointBackgroundColor: 'white',
			borderWidth: 1,
			borderColor: '#911215',
			data: [50, 55, 80, 81, 54, 50]
    }]
};


var options = {
	responsive: true,
	maintainAspectRatio: true,
	animation: {
		easing: 'easeInOutQuad',
		duration: 520
	},
	scales: {
		xAxes: [{
			gridLines: {
				color: 'rgba(200, 200, 200, 0.05)',
				lineWidth: 1
			}
		}],
		yAxes: [{
			gridLines: {
				color: 'rgba(200, 200, 200, 0.08)',
				lineWidth: 1
			}
		}]
	},
	elements: {
		line: {
			tension: 0.4
		}
	},
	legend: {
		display: false
	},
	point: {
		backgroundColor: 'white'
	},
	tooltips: {
		titleFontFamily: 'Open Sans',
		backgroundColor: 'rgba(0,0,0,0.3)',
		titleFontColor: 'red',
		caretSize: 5,
		cornerRadius: 2,
		xPadding: 10,
		yPadding: 10
	}
};


var chartInstance = new Chart(chart, {
    type: 'line',
    data: data,
		options: options
});
</script>

