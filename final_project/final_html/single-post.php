<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.js"></script>
  <style type="text/css">
  html, body {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
  }

  .axis path,
  .axis line {
    fill: none;
    stroke: #555;
  }

  .axis text {
    fill: #555;
  }

  .line {
    fill: none;
    stroke: #ef0d0c;
    stroke-width: 1.5px;
  }

  #content {
    display: block;
    width: 100%;
    height: 100%;
    min-width: 300px;
    max-width: 1060px;
    max-height: 500px;
    overflow: hidden;
  }

  #button-container {
    width: 600px;
    margin: 30px auto;
    padding:30px;
}

 /* .active {
    color: white;
    background-color: black;
    border-color: grey;
}*/
   button {
    cursor: pointer;
    font-size: 16px;
    display: inline;
    padding: 10px;
    margin: 0 20px;
    color: black;
    background-color: white;
    border-style: solid;
    border-width: 2px;
    border-color: black;
}

  </style>

</head>

<?php
$id = @$_POST['areaid'];
$y =  @$_POST['yyyy'];
//fetch connection details from database.php file using require_once(); function
require_once ('connect_database.php');
//check if it work!
//echo $connection; //from database.php file
if (isset($_POST['fetch']))
{
//mysql_query() performs a single query to the currently active database on the server that is associated with the specified link identifier
$result = mysqli_query($connect, "SELECT age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100 FROM p_numbers where year = '$y' and city_id = '$id' and gender = 1");
$result2 = mysqli_query($connect, "SELECT age0_10,age11_20,age21_30,age31_40,age41_50,age51_60,age61_70,age71_80,age81_90,age91_100 FROM p_numbers where year = '$y' and city_id = '$id' and gender = 2");

if(!$result)
{
	echo ("Error: ".mysqli_error($connect));
	exit();
}

$k = 0;
while($a = mysqli_fetch_array($result)){
	$i = 0;
	$j = 0;
	while($j<10){
		$bm[$k][$i] = $a[$j];
		$i++;
		$j++;
	}
	$k++;
}
$k = 0;
while($a2 = mysqli_fetch_array($result2)){
	$i = 0;
	$j = 0;
	while($j<10){
		$gm[$k][$i] = $a2[$j];
		$i++;
		$j++;
	}
	$k++;
}
mysqli_close($connect);
}?>
<body>

<div id="button-container">
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
	<input type="submit" name="fetch" value="OK">
	</form>
     <button id="male">Male</button>
     <button id="female">Female</button>
     <button id="total">Total</button>
     <button id="reset">清除</button>

</div>

  <div id="content">
    <svg class="svg"></svg>
  </div>

  <script type="text/javascript">
  /*var data = [
  {
    "region": "1",
    "female": <?php echo json_encode($gm[0][0]);?>,
	x: <?php echo json_encode($gm[0][0]);?>,
    "male": <?php echo json_encode($bm[0][0]);?>,
	y: <?php echo json_encode($bm[0][0]);?>,
    "total": 2570.210781
  },
  {
    "region": "2",
    "female": <?php echo json_encode($gm[0][1]);?>,
	x: <?php echo json_encode($gm[0][1]);?>,
    "male": <?php echo json_encode($bm[0][1]);?>,
	y: <?php echo json_encode($bm[0][1]);?>,
    "total": 2173.609712
  },
  {
    "region": "3",
    "female": <?php echo json_encode($gm[0][2]);?>,
	x: <?php echo json_encode($gm[0][2]);?>,
    "male": <?php echo json_encode($bm[0][2]);?>,
	y: <?php echo json_encode($bm[0][2]);?>,
    "total": 2125.218562
  },
  {
    "region": "4",
    "female": <?php echo json_encode($gm[0][3]);?>,
	x: <?php echo json_encode($gm[0][3]);?>,
    "male": <?php echo json_encode($bm[0][3]);?>,
	y: <?php echo json_encode($bm[0][3]);?>,
    "total": 1970.313951
  },
  {
    "region": "5",
    "female": <?php echo json_encode($gm[0][4]);?>,
	x: <?php echo json_encode($gm[0][4]);?>,
    "male": <?php echo json_encode($bm[0][4]);?>,
	y: <?php echo json_encode($bm[0][4]);?>,
    "total": 1893.854422
  },
  {
    "region": "6",
    "female": <?php echo json_encode($gm[0][5]);?>,
	x: <?php echo json_encode($gm[0][5]);?>,
    "male": <?php echo json_encode($bm[0][5]);?>,
	y: <?php echo json_encode($bm[0][5]);?>,
    "total": 1813.571443
  },
  {
    "region": "7",
    "female": <?php echo json_encode($gm[0][6]);?>,
	x: <?php echo json_encode($gm[0][6]);?>,
    "male": <?php echo json_encode($bm[0][6]);?>,
	y: <?php echo json_encode($bm[0][6]);?>,
    "total": 1694.577185
  },
  {
    "region": "8",
    "female": <?php echo json_encode($gm[0][7]);?>,
	x: <?php echo json_encode($gm[0][7]);?>,
    "male": <?php echo json_encode($bm[0][7]);?>,
	y: <?php echo json_encode($bm[0][7]);?>,
    "total": 1655.043669
  },
  {
    "region": "9",
    "female": <?php echo json_encode($gm[0][8]);?>,
	x: <?php echo json_encode($gm[0][8]);?>,
    "male": <?php echo json_encode($bm[0][8]);?>,
	y: <?php echo json_encode($bm[0][8]);?>,
    "total": 1501.26019
  },
  {
    "region": "10",
    "female": <?php echo json_encode($gm[0][9]);?>,
	x: <?php echo json_encode($gm[0][9]);?>,
    "male": <?php echo json_encode($bm[0][9]);?>,
	y: <?php echo json_encode($bm[0][9]);?>,
    "total": 1489.35871
  }
];*/
console.log(<?php echo json_encode($bm);?>);
  /*var svg = d3.select('.svg');

  // 設定畫布尺寸 & 邊距
  var margin = 80,
      width = 960 - margin * 0.7,
      height = 600 - margin * 2;

  svg.attr({
    "width": width + margin,
    "height": height + margin * 2,
    "transform": "translate(" + margin + "," + margin + ")"
  });
  var date = svg.append('g')
            .attr({
              'id':'date'
            });
  var date2 = svg.append('g')
            .attr({
              'id':'date2'
            });
			
	// x 軸比例尺
	xScale = d3.scale.linear().domain([0, data.length]).range([0, width]);
	yScale  = d3.scale.linear().domain([0, 5000, 60000]).range([0, height/2, height]);
	// y 軸比例尺 2 繪製座標軸用
	yScale2 = d3.scale.linear().domain([0, 5000, 60000]).range([height, height/2, 0]);
		

  // x 軸
  var xAxis = d3.svg.axis()
    .scale(xScale)
    .orient("bottom")
    .ticks( data.length )
    .tickFormat(function(i){
      return (data[i]) ? data[i].region : '';   // 這裡控制坐標軸的單位
    });

  // y 軸
  var yAxis = d3.svg.axis()
    .scale(yScale)
    .orient("left");

  // 繪製 x 軸
  svg.append("g")
    .attr({
      "class": "x axis",
      "transform": "translate(" + margin + "," + (height + margin) + ")",
      'fill': '#ffffff'
    })
    .call(xAxis);

  // 繪製 y 軸
  svg.append("g")
    .attr({
      "class": "y axis",
      "transform": "translate(" + margin + ", " + margin + ")",
      'fill': '#ffffff'
    })
    .call(yAxis);

  // 處理軸線位移
  svg.select('.x.axis').selectAll('.tick text').attr("dx", width * 0.05);
  svg.select('.x.axis').selectAll('.tick line').attr('transform', 'translate(' + width * 0.05 + ', 0)');

  d3.selectAll('#button-container > button').on('click', function(){

      // male, total, female
      var chartType = d3.select(this).attr('id');
      var xScale, yScale, yScale2, xAxis, yAxis;
      var c10 = d3.scale.category10();

      // 依照圖表的類別，重新定義 x, y 比例尺
      if( chartType === 'male' ){
		date.selectAll('text')
		 .data(data)
		 .enter()
		 .append('text')
		 .text(function(d){
			return d.y;
		 })
		 .transition()
		 .duration(700)
		 .attr({
		  'fill':'#000',
		  'x':function(d,i){
			return xScale(i) + margin + 24;
		  },
		  'y':function(d){
			return height - yScale(d[chartType])+ margin - 35;
		  }
		 });
      }
      else if( chartType === 'total' ){
		  
      }
      else if( chartType === 'female' ){
		date.selectAll('text')
		 .data(data)
		 .enter()
		 .append('text')
		 .text(function(d){
			return d.x;
		 })
		 .transition()
		 .duration(700)
		 .attr({
		  'fill':'#000',
		  'x':function(d,i){
			return xScale(i) + margin + 24;
		  },
		  'y':function(d){
			return height - yScale(d[chartType])+ margin - 35;
		  }
		 });
      }

      // 產生長條圖
      svg.selectAll('.bar')
        .data(data)
        .enter()
        .append('rect')
        .classed('bar', true);

      svg.selectAll('.bar')
        .transition()
        .duration(700)
        .attr({
          'x': function(d, i) {
            return xScale(i) + margin;
          },
          'y': function(d, i) {
            return height - yScale(d[chartType])+ margin;
          },
          'width': '5%',
          'height': function(d, i) {
            return yScale(d[chartType]);
          },
          'fill': function(d, i){
            return c10(i);
          },
          "transform": "translate(" +  width * (0.02) + ", " + 0 + ")",
        });
		
  });*/

  </script>
</body>
</html>