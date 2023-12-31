<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  
  <script type="text/javascript">// <![CDATA[
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container',
	                type: 'column',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Project Requests',
	                x: -20 //center
	            },
	            subtitle: {
	                text: 'test subtitles',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'Requests'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b>'+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },

	            series: []
	        }

	        $.getJSON("dashboard/data", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
	        	options.series[2] = json[3];
		        chart = new Highcharts.Chart(options);
	        });
	    });

// ]]></script>

<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>

  <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto;"></div>