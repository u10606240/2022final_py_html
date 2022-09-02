<!DOCTYPE html>
<html>
<head>
    <title>新北市各區域人口動態長條圖</title>
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
.flex-container {
  flex-direction: row;
}
</style>
<div class="chart" align="center"></div>
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
<div class="flex-container">
<div class="item">
<script>
let tmp3 = <?php echo json_encode($bm2);?>;
let tmp4 = <?php echo json_encode($gm2);?>;
console.log(tmp3)
console.log(tmp4)
// map 資料集
const  xData = ['0~10','11~20','21~30','31~40','41~50','51~60','61~70','71~80','81~90','91up'];

var j=0;
var newNumber = [
{x:'0~10','Male':0,'Female':0},
{x:'11~20','Male':0,'Female':0},
{x:'21~30','Male':0,'Female':0},
{x:'31~40','Male':0,'Female':0},
{x:'41~50','Male':0,'Female':0},
{x:'51~60','Male':0,'Female':0},
{x:'61~70','Male':0,'Female':0},
{x:'71~80','Male':0,'Female':0},
{x:'81~90','Male':0,'Female':0},
{x:'91up','Male':0,'Female':0}
]
/*var j=0;
var btn = d3.select('#btn')
			.on('click',function(){
				if(j>11) j=0;
				data = datas[j]
				_transition(data);
				j++;
			});*/

var datas = [[
{x:'0~10','Male':<?php echo json_encode($bm2[0][0]);?>,'Female':<?php echo json_encode($gm2[0][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[0][1]);?>,'Female':<?php echo json_encode($gm2[0][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[0][2]);?>,'Female':<?php echo json_encode($gm2[0][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[0][3]);?>,'Female':<?php echo json_encode($gm2[0][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[0][4]);?>,'Female':<?php echo json_encode($gm2[0][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[0][5]);?>,'Female':<?php echo json_encode($gm2[0][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[0][6]);?>,'Female':<?php echo json_encode($gm2[0][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[0][7]);?>,'Female':<?php echo json_encode($gm2[0][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[0][8]);?>,'Female':<?php echo json_encode($gm2[0][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[0][9]);?>,'Female':<?php echo json_encode($gm2[0][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[1][0]);?>,'Female':<?php echo json_encode($gm2[1][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[1][1]);?>,'Female':<?php echo json_encode($gm2[1][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[1][2]);?>,'Female':<?php echo json_encode($gm2[1][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[1][3]);?>,'Female':<?php echo json_encode($gm2[1][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[1][4]);?>,'Female':<?php echo json_encode($gm2[1][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[1][5]);?>,'Female':<?php echo json_encode($gm2[1][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[1][6]);?>,'Female':<?php echo json_encode($gm2[1][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[1][7]);?>,'Female':<?php echo json_encode($gm2[1][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[1][8]);?>,'Female':<?php echo json_encode($gm2[1][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[1][9]);?>,'Female':<?php echo json_encode($gm2[1][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[2][0]);?>,'Female':<?php echo json_encode($gm2[2][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[2][1]);?>,'Female':<?php echo json_encode($gm2[2][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[2][2]);?>,'Female':<?php echo json_encode($gm2[2][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[2][3]);?>,'Female':<?php echo json_encode($gm2[2][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[2][4]);?>,'Female':<?php echo json_encode($gm2[2][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[2][5]);?>,'Female':<?php echo json_encode($gm2[2][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[2][6]);?>,'Female':<?php echo json_encode($gm2[2][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[2][7]);?>,'Female':<?php echo json_encode($gm2[2][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[2][8]);?>,'Female':<?php echo json_encode($gm2[2][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[2][9]);?>,'Female':<?php echo json_encode($gm2[2][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[3][0]);?>,'Female':<?php echo json_encode($gm2[3][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[3][1]);?>,'Female':<?php echo json_encode($gm2[3][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[3][2]);?>,'Female':<?php echo json_encode($gm2[3][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[3][3]);?>,'Female':<?php echo json_encode($gm2[3][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[3][4]);?>,'Female':<?php echo json_encode($gm2[3][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[3][5]);?>,'Female':<?php echo json_encode($gm2[3][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[3][6]);?>,'Female':<?php echo json_encode($gm2[3][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[3][7]);?>,'Female':<?php echo json_encode($gm2[3][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[3][8]);?>,'Female':<?php echo json_encode($gm2[3][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[3][9]);?>,'Female':<?php echo json_encode($gm2[3][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[4][0]);?>,'Female':<?php echo json_encode($gm2[4][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[4][1]);?>,'Female':<?php echo json_encode($gm2[4][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[4][2]);?>,'Female':<?php echo json_encode($gm2[4][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[4][3]);?>,'Female':<?php echo json_encode($gm2[4][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[4][4]);?>,'Female':<?php echo json_encode($gm2[4][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[4][5]);?>,'Female':<?php echo json_encode($gm2[4][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[4][6]);?>,'Female':<?php echo json_encode($gm2[4][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[4][7]);?>,'Female':<?php echo json_encode($gm2[4][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[4][8]);?>,'Female':<?php echo json_encode($gm2[4][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[4][9]);?>,'Female':<?php echo json_encode($gm2[4][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[5][0]);?>,'Female':<?php echo json_encode($gm2[5][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[5][1]);?>,'Female':<?php echo json_encode($gm2[5][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[5][2]);?>,'Female':<?php echo json_encode($gm2[5][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[5][3]);?>,'Female':<?php echo json_encode($gm2[5][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[5][4]);?>,'Female':<?php echo json_encode($gm2[5][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[5][5]);?>,'Female':<?php echo json_encode($gm2[5][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[5][6]);?>,'Female':<?php echo json_encode($gm2[5][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[5][7]);?>,'Female':<?php echo json_encode($gm2[5][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[5][8]);?>,'Female':<?php echo json_encode($gm2[5][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[5][9]);?>,'Female':<?php echo json_encode($gm2[5][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[6][0]);?>,'Female':<?php echo json_encode($gm2[6][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[6][1]);?>,'Female':<?php echo json_encode($gm2[6][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[6][2]);?>,'Female':<?php echo json_encode($gm2[6][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[6][3]);?>,'Female':<?php echo json_encode($gm2[6][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[6][4]);?>,'Female':<?php echo json_encode($gm2[6][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[6][5]);?>,'Female':<?php echo json_encode($gm2[6][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[6][6]);?>,'Female':<?php echo json_encode($gm2[6][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[6][7]);?>,'Female':<?php echo json_encode($gm2[6][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[6][8]);?>,'Female':<?php echo json_encode($gm2[6][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[6][9]);?>,'Female':<?php echo json_encode($gm2[6][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[7][0]);?>,'Female':<?php echo json_encode($gm2[7][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[7][1]);?>,'Female':<?php echo json_encode($gm2[7][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[7][2]);?>,'Female':<?php echo json_encode($gm2[7][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[7][3]);?>,'Female':<?php echo json_encode($gm2[7][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[7][4]);?>,'Female':<?php echo json_encode($gm2[7][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[7][5]);?>,'Female':<?php echo json_encode($gm2[7][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[7][6]);?>,'Female':<?php echo json_encode($gm2[7][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[7][7]);?>,'Female':<?php echo json_encode($gm2[7][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[7][8]);?>,'Female':<?php echo json_encode($gm2[7][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[7][9]);?>,'Female':<?php echo json_encode($gm2[7][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[8][0]);?>,'Female':<?php echo json_encode($gm2[8][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[8][1]);?>,'Female':<?php echo json_encode($gm2[8][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[8][2]);?>,'Female':<?php echo json_encode($gm2[8][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[8][3]);?>,'Female':<?php echo json_encode($gm2[8][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[8][4]);?>,'Female':<?php echo json_encode($gm2[8][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[8][5]);?>,'Female':<?php echo json_encode($gm2[8][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[8][6]);?>,'Female':<?php echo json_encode($gm2[8][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[8][7]);?>,'Female':<?php echo json_encode($gm2[8][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[8][8]);?>,'Female':<?php echo json_encode($gm2[8][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[8][9]);?>,'Female':<?php echo json_encode($gm2[8][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[9][0]);?>,'Female':<?php echo json_encode($gm2[9][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[9][1]);?>,'Female':<?php echo json_encode($gm2[9][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[9][2]);?>,'Female':<?php echo json_encode($gm2[9][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[9][3]);?>,'Female':<?php echo json_encode($gm2[9][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[9][4]);?>,'Female':<?php echo json_encode($gm2[9][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[9][5]);?>,'Female':<?php echo json_encode($gm2[9][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[9][6]);?>,'Female':<?php echo json_encode($gm2[9][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[9][7]);?>,'Female':<?php echo json_encode($gm2[9][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[9][8]);?>,'Female':<?php echo json_encode($gm2[9][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[9][9]);?>,'Female':<?php echo json_encode($gm2[9][9]);?>}
],
[
{x:'0~10','Male':<?php echo json_encode($bm2[10][0]);?>,'Female':<?php echo json_encode($gm2[10][0]);?>},
{x:'11~20','Male':<?php echo json_encode($bm2[10][1]);?>,'Female':<?php echo json_encode($gm2[10][1]);?>},
{x:'21~30','Male':<?php echo json_encode($bm2[10][2]);?>,'Female':<?php echo json_encode($gm2[10][2]);?>},
{x:'31~40','Male':<?php echo json_encode($bm2[10][3]);?>,'Female':<?php echo json_encode($gm2[10][3]);?>},
{x:'41~50','Male':<?php echo json_encode($bm2[10][4]);?>,'Female':<?php echo json_encode($gm2[10][4]);?>},
{x:'51~60','Male':<?php echo json_encode($bm2[10][5]);?>,'Female':<?php echo json_encode($gm2[10][5]);?>},
{x:'61~70','Male':<?php echo json_encode($bm2[10][6]);?>,'Female':<?php echo json_encode($gm2[10][6]);?>},
{x:'71~80','Male':<?php echo json_encode($bm2[10][7]);?>,'Female':<?php echo json_encode($gm2[10][7]);?>},
{x:'81~90','Male':<?php echo json_encode($bm2[10][8]);?>,'Female':<?php echo json_encode($gm2[10][8]);?>},
{x:'91up','Male':<?php echo json_encode($bm2[10][9]);?>,'Female':<?php echo json_encode($gm2[10][9]);?>}
]];
console.log(datas);
drawBarChart();
// RWD
function drawBarChart(){
  // 刪除原本的svg.charts，重新渲染改變寬度的svg
  d3.select('.chart svg').remove();

  // RWD 的svg 寬高
  const rwdSvgWidth = 800,
        rwdSvgHeight = rwdSvgWidth,
        margin = 30,
		marginBottom = 100;

  const svg = d3.select('.chart')
                .append('svg')
                .attr('width', rwdSvgWidth)
                .attr('height', rwdSvgHeight);
        margin2 = {top: (parseInt(svg.attr("width"), 10)/35), right: (parseInt(svg.attr("width"), 12)/20), bottom: (parseInt(svg.attr("width"), 10)/5), left: (parseInt(svg.attr("width"), 10)/20)},
        width = +svg.attr("width") - margin2.left - margin2.right,
        height = +svg.attr("height") - margin2.top - margin2.bottom,
        g = svg.append("g");
	

	// 設定要給 X 軸用的 scale 跟 axis
	const xScale = d3.scaleBand()
					.domain(xData)
					.range([margin*2, rwdSvgWidth - margin]) // 寬度
					.padding(0.2)

	const xAxis = d3.axisBottom(xScale)

	// 呼叫繪製x軸、調整x軸位置
	const xAxisGroup = svg.append("g")
						  .call(xAxis)
						  .attr("transform", `translate(0,${rwdSvgHeight - marginBottom})`)


	// 設定要給 Y 軸用的 scale 跟 axis
	const yScale = d3.scaleLinear()
					.domain([0, 550])
					.range([rwdSvgHeight - marginBottom, margin]) // 數值要顛倒，才會從低往高排
					.nice() // 補上終點值

	const yAxis = d3.axisLeft(yScale)
					.ticks(5)
					.tickSize(3)

	// 呼叫繪製y軸、調整y軸位置
	const yAxisGroup = svg.append("g")
						  .call(yAxis)
						  .attr("transform", `translate(${margin*2},0)`)
						  

		
	d3.transition().duration(1750).each(update(datas[0]));
		
		function update(data){
			const subgroups =  ['Male','Female'];

			// 第二條X軸的比例尺，用來設定多條bar的位置
			const xSubgroup = d3.scaleBand()
								.domain(subgroups)
								.range([0, xScale.bandwidth()])
								.padding([0.05])
			const color = d3.scaleOrdinal()
						.domain(subgroups)
						.range(['#0b5394','#54ce00'])
			var group = g.selectAll("g").data(data, function(d){//console.log(d) 
			return d;});
			// 開始建立長條圖
			var bar = group
				  .enter().append('g')
				  .attr("transform", function(d) { return "translate(" + xScale(d.x) + ",0)"; })
                  .merge(group)			  
				  .selectAll("rect")
                  
				  .data(d => {
                     return subgroups.map(key=>{
                       //console.log({key: key, value: d[key]})
                       return {key:key, value:d[key]};})
                   })				  
				  bar.enter().append("rect")
                     .attr('x', d => {
						 //console.log('x '+xSubgroup(d.key))
						 return xSubgroup(d.key)
					 })
                     .attr('y', d => {
						 return yScale(d.value)
						 //console.log(yScale(d.value))
					 })
                      .attr("width", xSubgroup.bandwidth())
                      .attr("height", d =>{
							return (rwdSvgHeight-marginBottom) - yScale(d.value)
						})
                      .attr("fill", d => color(d.key))
                      .style('cursor', 'pointer')
					  .merge(bar)
					  .on("mouseover", handleMouseOver)
					  .on("mouseleave", handleMouseLeave)
		   
		bar.exit().remove();

			function handleMouseOver(d, i){
			  //console.log(d)
			  //console.log(d.target.__data__)
			   const pt = d3.pointer(event, g.node())
			  
			  // 加上文字標籤
			  g.append('text')
				 .attr('class', 'infoText')
				 .attr('y', yScale(d.target.__data__['value']))
				 .attr("x", margin*2)
				 .style('fill', '#000')
				 .style('font-size', '18px')
				 .style('font-weight', 'bold')
				 .style("text-anchor", 'middle')
				 .text(d.target.__data__['value'] + '百人')
			
			  // 加上軸線
			  g.append('line')
				 .attr('class', 'dashed-Y')
				 .attr('x1', margin*2)
				 .attr('y1', yScale(d.target.__data__['value']))
				 .attr('x2', pt[0])
				 .attr('y2', yScale(d.target.__data__['value']))
				 .style('stroke', 'black')
				 .style('stroke-dasharray', '3' )
			}

			function handleMouseLeave(){
			  // 移除文字、軸線標籤
			  g.select('.infoText').remove()
			  g.select('.dashed-Y').remove()
			}
		    // 加上辨識標籤
			  const tagsWrap =  g.append('g')
				   .selectAll('g')
				   .attr('class', 'tags')
				   .data(subgroups)
				   .enter()
				   .append('g')
				   
			  if(window.innerWidth < 780){
				tagsWrap.attr('transform', "translate(-70,0)")
			  }
				  
			  tagsWrap.append('rect')
				   .attr('x', (d,i)=> (i+1)*marginBottom*1.3)
				   .attr('y', rwdSvgHeight-marginBottom/2)
				   .attr('width', 20)
				   .attr('height', 20)
				   .attr('fill', d => color(d))

			  tagsWrap.append('text')
					  .attr('x', (d,i)=> (i+1)*marginBottom*1.3)
					  .attr('y', rwdSvgHeight-10)
					  .style('fill', '#000')
					  .style('font-size', '12px')
					  .style('font-weight', 'bold')
					  .style("text-anchor", 'middle')
					  .text(d=>d)
					  
		group.exit().remove();

		for(var temp=1;temp<12;temp++){
			hi=setTimeout(function(x){
			console.log(x);
			if(x === 1){
				console.log("here in 1");
				update(datas[0]);
			}
			if(x === 2){
				console.log("here in 2");
				update(datas[1]);				
			}
			if(x === 3){
				console.log("here in 3");
				update(datas[2]);				
			}			
			if(x === 4){
				console.log("here in 4");
				update(datas[3]);				
			}
			if(x === 5){
				console.log("here in 5");
				update(datas[4]);				
			}
			if(x === 6){
				console.log("here in 6");
				update(datas[5]);				
			}
			if(x === 7){
				console.log("here in 7");
				update(datas[6]);				
			}
			if(x === 8){
				console.log("here in 8");
				update(datas[7]);				
			}
			if(x === 9){
				console.log("here in 9");
				update(datas[8]);				
			}
			if(x === 10){
				console.log("here in 10");
				update(datas[9]);				
			}
			if(x === 11){
				console.log("here in 11");
				update(datas[10]);
			}				
			},1000,temp)
		}
		}
}
d3.select(window).on('resize', drawBarChart);
</script>
</div>
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
	
	<input type="submit" name="fetch" value="OK">
	</form>
</div>


</html>