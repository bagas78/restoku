<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
   <strong>Copyright &copy; 2018-<?php echo date('Y'); ?></strong>
  </footer>

  <div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo base_url('asset/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/moment/min/moment.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
	<script src="<?php echo base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
	<script src="<?php echo base_url('asset/bower_components/fastclick/lib/fastclick.js')?>"></script>
	<script src="<?php echo base_url('asset/dist/js/adminlte.min.js')?>"></script>
	<script src="<?php echo base_url('asset/dist/js/pages/dashboard.js')?>"></script>
	<script src="<?php echo base_url('asset/dist/js/demo.js')?>"></script>
		<script>
        function grafik(){
            var ctx = document.getElementById("myChart");
            const context = ctx.getContext('2d');
            var myChart = new Chart(context, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($label);?>
                    ,
                    datasets: [{
                        label: 'Data Penjualan Kopi Hari',
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
													<?php echo json_encode($jumlah);?>
                            ,
                        borderWidth: 1
                    }]
                },
            });
        }
        grafik();
    </script>
		<script>
        function grafik1(){
            var ctx = document.getElementById("lineChart1");
            const context = ctx.getContext('2d');
            var myChart = new Chart(context, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($period);?>
                    ,
                    datasets: [{
                        label: 'Pendapatan Per Bulan',
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
</body>
</html>




