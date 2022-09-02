<!DOCTYPE html>
<html>
<head>
    <title>新北市各區域人口詳細長條圖</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="single-blog-post">
    <div class="page-header">
         <header class="site-header">
            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-9 col-lg-3">
                            <div class="site-branding">
                                <h1 class="site-title"><a href="index.html" rel="home">Find<span>out</span></a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-3 col-lg-9 flex justify-content-end align-content-center">
                            <nav class="site-navigation flex justify-content-end align-items-center">
                                <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                    <li class="current-menu-item"><a href="index.html">Home</a></li>
                                    <li><a href="2.php">look</a></li>
                                    <li><a href="1.php">at</a></li>
									<li><a href="3.php">me</a></li>
                                </ul>

                                <div class="hamburger-menu d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div><!-- .hamburger-menu -->

                                <div class="header-bar-cart">
                                    <a href="#" class="flex justify-content-center align-items-center"><span aria-hidden="true" class="ti-face-smile"></span></a>
                                </div><!-- .header-bar-search -->
                            </nav><!-- .site-navigation -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .nav-bar -->
        </header><!-- .site-header -->
		<div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header class="entry-header">

                        </header><!-- .entry-header -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .page-header-overlay -->
    </div><!-- .page-header -->
<head>
  <script src="https://d3js.org/d3.v7.min.js"></script>
  <style>
.chart1{
    width: 100%;
    min-width: 300px;
    margin: auto;
}
</style>
<div class="chart1" align="center"></div>
</head>
<?php
$id = @$_POST['areaid'];
$y =  @$_POST['yyyy'];
$m = @$_POST['mm'];
//fetch connection details from database.php file using require_once(); function
require_once ('connect_database.php');
//check if it work!
//echo $connection; //from database.php file
if (isset($_POST['fetch']))
{
//mysql_query() performs a single query to the currently active database on the server that is associated with the specified link identifier
$result = mysqli_query($connect, "SELECT age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100 FROM p_numbers where year = '$y' and month = '$m' and city_id = '$id' and gender = 1");
$result2 = mysqli_query($connect, "SELECT age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100 FROM p_numbers where year = '$y' and month = '$m' and city_id = '$id' and gender = 2");
$result3 = mysqli_query($connect, "SELECT age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100,year,month FROM p_numbers where month = 1 and city_id = '$id' and gender = 1");
$result4 = mysqli_query($connect, "SELECT age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100,year,month FROM p_numbers where month = 1 and city_id = '$id' and gender = 2");
if(!$result)
{
	echo ("Error: ".mysqli_error($connect));
	exit();
}
$i = 0;
while($a1 = mysqli_fetch_array($result)){
	$bm[$i] = (int)$a1['age0_10']/100;
	$i++;
	$bm[$i] = (int)$a1['age11_20']/100;
	$i++;
	$bm[$i] = (int)$a1['age21_30']/100;
	$i++;
	$bm[$i] = (int)$a1['age31_40']/100;
	$i++;
	$bm[$i] = (int)$a1['age41_50']/100;
	$i++;
	$bm[$i] = (int)$a1['age51_60']/100;
	$i++;
	$bm[$i] = (int)$a1['age61_70']/100;
	$i++;
	$bm[$i] = (int)$a1['age71_80']/100;
	$i++;
	$bm[$i] = (int)$a1['age81_90']/100;
	$i++;
	$bm[$i] = (int)$a1['age91_100']/100;
}
$i = 0;
while($a2 = mysqli_fetch_array($result2)){
	$gm[$i] = (int)$a2['age0_10']/100;
	$i++;
	$gm[$i] = (int)$a2['age11_20']/100;
	$i++;
	$gm[$i] = (int)$a2['age21_30']/100;
	$i++;
	$gm[$i] = (int)$a2['age31_40']/100;
	$i++;
	$gm[$i] = (int)$a2['age41_50']/100;
	$i++;
	$gm[$i] = (int)$a2['age51_60']/100;
	$i++;
	$gm[$i] = (int)$a2['age61_70']/100;
	$i++;
	$gm[$i] = (int)$a2['age71_80']/100;
	$i++;
	$gm[$i] = (int)$a2['age81_90']/100;
	$i++;
	$gm[$i] = (int)$a2['age91_100']/100;
}
$i = 0;
while($a3 = mysqli_fetch_array($result3)){
	$j = 0;
	$bm2[$i][$j] = (int)$a3['age0_10']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age11_20']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age21_30']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age31_40']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age41_50']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age51_60']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age61_70']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age71_80']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age81_90']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['age91_100']/100;
	$j++;
	$bm2[$i][$j] = (int)$a3['year'];
	$j++;
	$bm2[$i][$j] = (int)$a3['month'];
	$i++;
}
$i = 0;
while($a4 = mysqli_fetch_array($result4)){
	$j = 0;
	$gm2[$i][$j] = (int)$a4['age0_10']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age11_20']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age21_30']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age31_40']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age41_50']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age51_60']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age61_70']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age71_80']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age81_90']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['age91_100']/100;
	$j++;
	$gm2[$i][$j] = (int)$a4['year'];
	$j++;
	$gm2[$i][$j] = (int)$a4['month'];
	$i++;
}
mysqli_close($connect);
}?>
<div class="container" style="margin: auto;">
<body>
<script>
let tmp1 = <?php echo json_encode($bm);?>;
let tmp2 = <?php echo json_encode($gm);?>;
console.log(tmp1)
console.log(tmp2)
var data1 = [
{x:'0~10',y:<?php echo json_encode($bm[0]);?>},
{x:'11~20',y:<?php echo json_encode($bm[1]);?>},
{x:'21~30',y:<?php echo json_encode($bm[2]);?>},
{x:'31~40',y:<?php echo json_encode($bm[3]);?>},
{x:'41~50',y:<?php echo json_encode($bm[4]);?>},
{x:'51~60',y:<?php echo json_encode($bm[5]);?>},
{x:'61~70',y:<?php echo json_encode($bm[6]);?>},
{x:'71~80',y:<?php echo json_encode($bm[7]);?>},
{x:'81~90',y:<?php echo json_encode($bm[8]);?>},
{x:'91up',y:<?php echo json_encode($bm[9]);?>}
]
var data2 = [
{x:'0~10',y:<?php echo json_encode($gm[0]);?>},
{x:'11~20',y:<?php echo json_encode($gm[1]);?>},
{x:'21~30',y:<?php echo json_encode($gm[2]);?>},
{x:'31~40',y:<?php echo json_encode($gm[3]);?>},
{x:'41~50',y:<?php echo json_encode($gm[4]);?>},
{x:'51~60',y:<?php echo json_encode($gm[5]);?>},
{x:'61~70',y:<?php echo json_encode($gm[6]);?>},
{x:'71~80',y:<?php echo json_encode($gm[7]);?>},
{x:'81~90',y:<?php echo json_encode($gm[8]);?>},
{x:'91up',y:<?php echo json_encode($gm[9]);?>}
]
drawBarChart();
// RWD
function drawBarChart(){
  // 刪除原本的svg.charts，重新渲染改變寬度的svg
  d3.select('.chart1 svg').remove();

  // RWD 的svg 寬高
  const rwdSvgWidth = 800,
        rwdSvgHeight = rwdSvgWidth*0.8,
        margin = 30;

  const svg = d3.select('.chart1')
                .append('svg')
                .attr('width', rwdSvgWidth)
                .attr('height', rwdSvgHeight);

	
	// map 資料集
	const  xData = ['0~10','11~20','21~30','31~40','41~50','51~60','61~70','71~80','81~90','91up'];

	// 設定要給 X 軸用的 scale 跟 axis
	const xScale = d3.scaleBand()
					.domain(xData)
					.range([margin*2, rwdSvgWidth - margin/2]) // 寬度
					.padding(0.2)

	const xAxis = d3.axisBottom(xScale)

	// 呼叫繪製x軸、調整x軸位置
	const xAxisGroup = svg.append("g")
						  .call(xAxis)
						  .attr("transform", `translate(0,${rwdSvgHeight - margin})`)


	// 設定要給 Y 軸用的 scale 跟 axis
	const yScale = d3.scaleLinear()
					.domain([0, 600])
					.range([rwdSvgHeight - margin, margin]) // 數值要顛倒，才會從低往高排
					.nice() // 補上終點值

	const yAxis = d3.axisLeft(yScale)
					.ticks(5)
					.tickSize(3)

	// 呼叫繪製y軸、調整y軸位置
	const yAxisGroup = svg.append("g")
						  .call(yAxis)
						  .attr("transform", `translate(${margin*2},0)`)
	update = function(data){
		// 開始建立長條圖
		var bar = svg.selectAll("rect")
				  .data(data)
				  .join("rect")
				  .attr("x", d => xScale(d.x)) // 讓長條圖在刻度線中間
				  .attr("y", d => yScale(d.y))
				  .attr("width", xScale.bandwidth())
				  .attr("height", d => {
					  return rwdSvgHeight - margin - yScale(d.y)
					})
				  .attr("fill", "#69b3a2")
				  .attr('cursor', 'pointer')
					  
		bar.on("mouseover", handleMouseOver)
		   .on("mouseleave", handleMouseLeave)

		function handleMouseOver(d, i){
			  //console.log(d)
			  //console.log(d.target.__data__)
			  d3.select(this)
				.attr('fill', 'red')
			  
			  // 加上文字標籤
			  svg.append('text')
				 .attr('class', 'infoText')
				 .attr('y', yScale(d.target.__data__['y'])-20)
				 .attr('x', xScale(d.target.__data__['x'])+35)
				 .style('fill', '#000')
				 .style('font-size', '18px')
				 .style('font-weight', 'bold')
				 .style("text-anchor", 'middle')
				 .text(d.target.__data__['y'] + '百人');
			}

			function handleMouseLeave(){
			  d3.select(this)
				.attr('fill', '#69b3a2')

			  // 移除文字標籤
			  svg.select('.infoText').remove()
			}
	}
	update(data1)
}
d3.select(window).on('resize', drawBarChart);
</script>
</body>
</div>


<div id="button-container" align="center">
	<form action="" method="POST">
	<select id="areaid" name="areaid">
		<option value="">請選擇</option>
		<option value="1" <?php if (@$_POST['areaid'] == '1') { echo 'selected'; } ?>>&#x677f;&#x6a4b;&#x5340;</option>	    
		<option value="2" <?php if (@$_POST['areaid'] == '2') { echo 'selected'; } ?>>&#x4e09;&#x91cd;&#x5340;</option>	      
		<option value="3" <?php if (@$_POST['areaid'] == '3') { echo 'selected'; } ?>>&#x4e2d;&#x548c;&#x5340;</option>	      
		<option value="4" <?php if (@$_POST['areaid'] == '4') { echo 'selected'; } ?>>&#x6c38;&#x548c;&#x5340;</option>	      
		<option value="5" <?php if (@$_POST['areaid'] == '5') { echo 'selected'; } ?>>&#x65b0;&#x838a;&#x5340;</option>	      
		<option value="6" <?php if (@$_POST['areaid'] == '6') { echo 'selected'; } ?>>&#x65b0;&#x5e97;&#x5340;</option>	      
		<option value="7" <?php if (@$_POST['areaid'] == '7') { echo 'selected'; } ?>>&#x571f;&#x57ce;&#x5340;</option>	      
		<option value="8" <?php if (@$_POST['areaid'] == '8') { echo 'selected'; } ?>>&#x8606;&#x6d32;&#x5340;</option>	      
		<option value="9" <?php if (@$_POST['areaid'] == '9') { echo 'selected'; } ?>>&#x6a39;&#x6797;&#x5340;</option>	      
		<option value="10" <?php if (@$_POST['areaid'] == '10') { echo 'selected'; } ?>>&#x9daf;&#x6b4c;&#x5340;</option>	      
		<option value="11" <?php if (@$_POST['areaid'] == '11') { echo 'selected'; } ?>>&#x4e09;&#x5cfd;&#x5340;</option>	      
		<option value="12" <?php if (@$_POST['areaid'] == '12') { echo 'selected'; } ?>>&#x6de1;&#x6c34;&#x5340;</option>	      
		<option value="13" <?php if (@$_POST['areaid'] == '13') { echo 'selected'; } ?>>&#x745e;&#x82b3;&#x5340;</option>	      
		<option value="14" <?php if (@$_POST['areaid'] == '14') { echo 'selected'; } ?>>&#x6c50;&#x6b62;&#x5340;</option>	      
		<option value="15" <?php if (@$_POST['areaid'] == '15') { echo 'selected'; } ?>>&#x4e94;&#x80a1;&#x5340;</option>	      
		<option value="16" <?php if (@$_POST['areaid'] == '16') { echo 'selected'; } ?>>&#x6cf0;&#x5c71;&#x5340;</option>	      
		<option value="17" <?php if (@$_POST['areaid'] == '17') { echo 'selected'; } ?>>&#x6797;&#x53e3;&#x5340;</option>	      
		<option value="18" <?php if (@$_POST['areaid'] == '18') { echo 'selected'; } ?>>&#x516b;&#x91cc;&#x5340;</option>	      
		<option value="19" <?php if (@$_POST['areaid'] == '19') { echo 'selected'; } ?>>&#x6df1;&#x5751;&#x5340;</option>	      
		<option value="20" <?php if (@$_POST['areaid'] == '20') { echo 'selected'; } ?>>&#x77f3;&#x7887;&#x5340;</option>	      
		<option value="21" <?php if (@$_POST['areaid'] == '21') { echo 'selected'; } ?>>&#x576a;&#x6797;&#x5340;</option>	      
		<option value="22" <?php if (@$_POST['areaid'] == '22') { echo 'selected'; } ?>>&#x4e09;&#x829d;&#x5340;</option>
		<option value="23" <?php if (@$_POST['areaid'] == '23') { echo 'selected'; } ?>>&#x77f3;&#x9580;&#x5340;</option>	      
		<option value="24" <?php if (@$_POST['areaid'] == '24') { echo 'selected'; } ?>>&#x91d1;&#x5c71;&#x5340;</option>	      
		<option value="25" <?php if (@$_POST['areaid'] == '25') { echo 'selected'; } ?>>&#x842c;&#x91cc;&#x5340;</option>	      
		<option value="26" <?php if (@$_POST['areaid'] == '26') { echo 'selected'; } ?>>&#x5e73;&#x6eaa;&#x5340;</option>	      
		<option value="27" <?php if (@$_POST['areaid'] == '27') { echo 'selected'; } ?>>&#x96d9;&#x6eaa;&#x5340;</option>	      
		<option value="28" <?php if (@$_POST['areaid'] == '28') { echo 'selected'; } ?>>&#x8ca2;&#x5bee;&#x5340;</option>	      
		<option value="29" <?php if (@$_POST['areaid'] == '29') { echo 'selected'; } ?>>&#x70cf;&#x4f86;&#x5340;</option>	      
	</select>
	<select name="yyyy" id="yyyy">
	<option value="">請選擇</option>
		<option value="101" <?php if (@$_POST['yyyy'] == '101') { echo 'selected'; } ?>>101</option>
		<option value="102" <?php if (@$_POST['yyyy'] == '102') { echo 'selected'; } ?>>102</option>
		<option value="103" <?php if (@$_POST['yyyy'] == '103') { echo 'selected'; } ?>>103</option>
		<option value="104" <?php if (@$_POST['yyyy'] == '104') { echo 'selected'; } ?>>104</option>
		<option value="105" <?php if (@$_POST['yyyy'] == '105') { echo 'selected'; } ?>>105</option>
		<option value="106" <?php if (@$_POST['yyyy'] == '106') { echo 'selected'; } ?>>106</option>
		<option value="107" <?php if (@$_POST['yyyy'] == '107') { echo 'selected'; } ?>>107</option>
		<option value="108" <?php if (@$_POST['yyyy'] == '108') { echo 'selected'; } ?>>108</option>
		<option value="109" <?php if (@$_POST['yyyy'] == '109') { echo 'selected'; } ?>>109</option>
		<option value="110" <?php if (@$_POST['yyyy'] == '110') { echo 'selected'; } ?>>110</option>
		<option value="111" <?php if (@$_POST['yyyy'] == '111') { echo 'selected'; } ?>>111</option>
	</select>									
	<select name="mm" id="mm">
		<option value="">請選擇</option>
		<option value="1" <?php if (@$_POST['mm'] == '1') { echo 'selected'; } ?>>1</option>
		<option value="2" <?php if (@$_POST['mm'] == '2') { echo 'selected'; } ?>>2</option>
		<option value="3" <?php if (@$_POST['mm'] == '3') { echo 'selected'; } ?>>3</option>
		<option value="4" <?php if (@$_POST['mm'] == '4') { echo 'selected'; } ?>>4</option>
		<option value="5" <?php if (@$_POST['mm'] == '5') { echo 'selected'; } ?>>5</option>
		<option value="6" <?php if (@$_POST['mm'] == '6') { echo 'selected'; } ?>>6</option>
		<option value="7" <?php if (@$_POST['mm'] == '7') { echo 'selected'; } ?>>7</option>
		<option value="8" <?php if (@$_POST['mm'] == '8') { echo 'selected'; } ?>>8</option>
		<option value="9" <?php if (@$_POST['mm'] == '9') { echo 'selected'; } ?>>9</option>
		<option value="10" <?php if (@$_POST['mm'] == '10') { echo 'selected'; } ?>>10</option>
		<option value="11" <?php if (@$_POST['mm'] == '11') { echo 'selected'; } ?>>11</option>
		<option value="12" <?php if (@$_POST['mm'] == '12') { echo 'selected'; } ?>>12</option>
	</select>
	
	<input type="submit" name="fetch" value="OK">
	</form>
	<button onclick="update(data1)">Male</button>
	<button onclick="update(data2)">Female</button>
</div>


</html>