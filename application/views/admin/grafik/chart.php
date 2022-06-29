
<div class="box-header with-border">
    <h3 class="box-title">Pendapatan</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="chart">
      <canvas id="lineChart" style="height:250px"></canvas>
    </div>
  </div>
  </div>
	
		<script>
        function grafik1(){
            var ctx = document.getElementById("lineChart");
            const context = ctx.getContext('2d');
            var myChart = new Chart(context, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($period);?>
                    ,
                    datasets: [{
                        label: 'Pendapatan',
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)', 
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: 'rgb(75, 192, 192, 0.8)',
                        data: 
												<?php echo json_encode($pendapatan);?>
                            ,
                        borderWidth: 1
                    }]
                },
								options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                suggestedMax :50,
																userCallback: function(value, index, values) {
																	// Convert the number to a string and splite the string every 3 charaters from the end
																	console.log(value);
																	value = value.toString();
																	value = value.split(/(?=(?:...)*$)/);

																	// Convert the array to a string and format the output
																	value = value.join('.');
																	return 'Rp ' + value;
        												}
                            }
                        }]
                    },
										tooltips: {
									callbacks: {
										label: function(t, d) {
											var xLabel = d.datasets[t.datasetIndex].label;
											var yLabel = t.yLabel >= 1000 ? 'Rp ' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 'Rp ' + t.yLabel;
											return xLabel + ': ' + yLabel;
										}
									}
									}

                }
            });
        }
        grafik1();
    </script>

