<?
/* @var $this DeviceController */
/* @var $model Device */
?>
<style>
	#SensorChartContainer
	{
		/*
		* Contains everything
		*/
		position:relative;
		display: block;
		height: 450px;
		margin-top: 10px;
		padding: 5px;
		border: 0px solid #CCC;
	}

	#rangeDisplay
	{
		z-index: 1;
		position:absolute;
		right:131px;
		top:0px;
		padding:2px;
		width:auto;
		background-color:#ccc;
		text-align: right;
	}

	#chartPlaceHolder
	{
		float:left;
		width:100%;
		height:400px;
	}

	#topChartContainer{
		position:absolute;
		width:100%;
		top: 50px;
	}


	.skinnyButt{
		cursor: pointer;
		font-weight: bolder;
		display:table-cell;
		text-align: center;
		vertical-align:middle;
		float:left;
		width: 30px;
		margin-left:7px;
		margin-right:7px;
		background-color: #fafafa;
		border: #ccc outset 1px;
		height: 100px;
	}

	.skinnyButtDown{
		border: #ccc inset 1px;
		background-color: #afafaf;
	}
	#btnChartRight{
		float:right;
		margin-right: 18px
	}
	#PleaseWait
	{
		z-index: 2;
		position:absolute;
		display:none;
		top:0px;
		margin-top: -1px;
		margin-left: -6px;
		cursor: wait;
		background-color: white;
		background-image: url('images/wait4science.gif');
		background-repeat: no-repeat;
		background-position: center;
		opacity: .66; ;
		padding: 5px;
		border: 1px solid #CCC;
	}
</style>
<div id="SensorChartContainer" >
	<?
	$date = new DateTime();
	$calendar = $this->widget('application.extensions.BootstrapDateTimePicker.BootstrapDateTimePicker', array('startDate' => date_format($date, 'Y-m-d H:i:s')), true);
	$leftButton = $this->widget('bootstrap.widgets.TbButton', array(
		'label' => 'Backward',
		'url' => 'javascript:sensorChart.Backward()',
		'icon' => 'icon-arrow-left',
			//'size' => 'mini', // null, 'large', 'small' or 'mini'
			), true
	);
	$rightButton = $this->widget('bootstrap.widgets.TbButton', array(
		'label' => 'Foreward',
		'icon' => 'icon-arrow-right',
		'url' => 'javascript:sensorChart.Foreward()',
			//'size' => 'mini', // null, 'large', 'small' or 'mini'
			), true
	);
	$this->widget('bootstrap.widgets.TbNavbar', array(
		'type' => null, // null or 'inverse'
		'brand' => '', #$title,
		'fixed' => '',
		'collapse' => false, // requires bootstrap-responsive.css
		'items' => array(
			$calendar,
			array(
				'class' => 'bootstrap.widgets.TbMenu',
				'htmlOptions' => array('class' => 'pull-left'),
				'items' => array(
					array('label' => 'Range', 'url' => '#', 'linkOptions' => array('id' => 'rangeMenu'), 'items' => array(
							array('label' => '30 Days', 'url' => 'javascript:sensorChart.SetRange(DAYS_30)'),
							array('label' => '7 Days', 'url' => 'javascript:sensorChart.SetRange(DAYS_7)'),
							array('label' => '1 Day', 'url' => 'javascript:sensorChart.SetRange(HOURS_24)'),
							array('label' => '12 Hours', 'url' => 'javascript:sensorChart.SetRange(HOURS_12)'),
							array('label' => '6 Hours', 'url' => 'javascript:sensorChart.SetRange(HOURS_6)'),
							array('label' => '3 Hours', 'url' => 'javascript:sensorChart.SetRange(HOURS_3)'),
							array('label' => '1 Hour', 'url' => 'javascript:sensorChart.SetRange(HOURS_1)'),
							array('label' => '30 Minutes', 'url' => 'javascript:sensorChart.SetRange(MINUTES_30)'),
							array('label' => '10 Minutes', 'url' => 'javascript:sensorChart.SetRange(MINUTES_10)'),
							array('label' => '5 Minutes', 'url' => 'javascript:sensorChart.SetRange(MINUTES_5)'),
						)),
					array('label' => 'Reset', 'url' => 'javascript:sensorChart.Reset()'),
					array('label' => 'Max Extent', 'url' => 'javascript:sensorChart.PlotMaxExtent()'),
				#array('label' => 'Live View', 'url' => 'javascript:sensorChart.ToggleLiveMode()', 'itemOptions' => array('id' => 'liveModeToggle')),
				),
			),
			$leftButton,
			'&nbsp;&nbsp;&nbsp;',
			$rightButton,
		),
	));
	?>
	<div id="topChartContainer" class="navbar-static ">
		<span id="rangeDisplay" class="nav" >
			<span id="chartStart">s</span> to <span id="chartFinish">f</span>
			<span class="nav" id="chartInfo">This is from inside the SensorChart view!</span>
		</span>
		<div id="chartPlaceHolder"></div>
	</div>
	<?
	Yii::app()->clientScript->registerScript(
			'helloscript', "
/*
 * Snooks code for onLoad
 */

$('#PleaseWait').css('height', $('#SensorChartContainer').css('height'));
$('#PleaseWait').css('width', $('#SensorChartContainer').css('width'));

$('.skinnyButt').mousedown(function() {
	$(this).addClass('skinnyButtDown');
}).mouseup(function() {
	$(this).removeClass('skinnyButtDown');
});

$('#btnChartLeft').click(function() {
	// pan left
	sensorChart.Backward()
});

$('#btnChartRight').click(function() {
	// pan right
	sensorChart.Foreward()
});

$('#datetimepicker').on('changeDate', function(e) {
	sensorChart.Plot(moment(e.date) - sensorChart.GetRange(), moment(e.date));
});

//$(SensorChartContainer).resize(function(){	//replot the charts!	});
$(document).ajaxStart(function()
{
	$('#chartInfo').text('Requesting Data, please wait...');
	$('#PleaseWait').show();
});

$(document).ajaxStop(function()
{
	$('#chartInfo').text('Data loaded.');
	$('#PleaseWait').hide();
});

	sensorChart.initialize("
			. "'" . Yii::app()->getBaseUrl() . "/index.php', "
			. "'#chartPlaceHolder', "
			//. "'#chartOverviewPlaceHolder', "
			. $this->Device->id . ", "
			. $this->minStamp . ", "
			. $this->maxStamp . ");", CClientScript::POS_READY
	);
	?>
	<div id="PleaseWait"></div>
</div>