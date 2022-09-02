<html>
<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<style>
    .wrap{
    position: relative;
    overflow: hidden;
    margin-bottom: 1em;
    }
    .bar{
    background-color: navy;
    width: 2em;
    height: auto;
    margin-right: 5px;
    float: left;
    position: relative;
    color: #fff;
    text-align: center;
    padding-top: 5px;
    }
</style>
<body>
<script>
let data = []
async function getData() {
  // 取資料
  dataGet = await d3.csv('123.csv')
  console.log(dataGet)
  data = dataGet
  drawBarChart()
};
getData()

 // RWD
  function drawBarChart(){
    // 刪除原本的svg.charts，重新渲染改變寬度的svg
    d3.select('.chart svg').remove();

    // RWD 的svg 寬高
    const rwdSvgWidth = parseInt(d3.select('.chart').style('width')),
          rwdSvgHeight = rwdSvgWidth*0.8,
          margin = 40;

    const svg = d3.select('.chart')
                  .append('svg')
                  .attr('width', rwdSvgWidth)
                  .attr('height', rwdSvgHeight);

    // map 資料集
    xData = data.map((i) => i['縣市']);
    yData = data.map((i) => parseInt(i['A.售電量(度)'].split(',').join('')));
	console.log(yData)

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
                          .selectAll("text") // 調整刻度文字標籤傾斜
                          .attr("transform", "translate(-10,0)rotate(-45)")
                          .style("text-anchor", "end");

    // 設定要給 Y 軸用的 scale 跟 axis
    const yScale = d3.scaleLinear()
                    .domain([0, d3.max(yData)])
                    .range([rwdSvgHeight - margin, margin]) // 數值要顛倒，才會從低往高排
                    .nice() // 補上終點值

    const yAxis = d3.axisLeft(yScale)
                    .ticks(5)
                    .tickSize(3)

    // 呼叫繪製y軸、調整y軸位置
    const yAxisGroup = svg.append("g")
                          .call(yAxis)
                          .attr("transform", `translate(${margin*2},0)`)
                    
    // 開始建立長條圖
    const bar = svg.selectAll("rect")
                  .data(data)
                  .join("rect")

    // 加上漸增動畫，注意如果要加動畫，event 要分開寫
    bar.attr("x", d => xScale(d['縣市'])) // 讓長條圖在刻度線中間
      .attr('y', yScale(0))
      .attr("width", xScale.bandwidth())
      .transition()
      .duration(1000)
      .delay((d, i)=> i*100)
      .attr("y", d => yScale(parseInt(d['A.售電量(度)'].split(',').join(''))))
      .attr("height", d => {
                return (rwdSvgHeight - margin) - yScale(parseInt(d['A.售電量(度)'].split(',').join('')))
              })
      .attr("fill", "#69b3a2")

    // 加上滑鼠事件       
    bar.attr('cursor', 'pointer')
        .on("mouseover", handleMouseOver)
        .on("mouseleave", handleMouseLeave)

    function handleMouseOver(d, i){
      // console.log(d)
      // console.log(d.target.__data__)
      d3.select(this)
        .attr('fill', 'red')
      
      // 加上文字標籤
      svg.append('text')
         .attr('class', 'infoText')
         .attr('y', yScale(parseInt(d.target.__data__['A.售電量(度)'].split(',').join('')))-20)
         .attr("x", xScale(d.target.__data__['縣市']) + 50)
         .style('fill', '#000')
         .style('font-size', '18px')
         .style('font-weight', 'bold')
         .style("text-anchor", 'middle')
         .text(d.target.__data__['A.售電量(度)'] + '度');
    }

    function handleMouseLeave(){
      d3.select(this)
        .attr('fill', '#69b3a2')

      // 移除文字標籤
      svg.select('.infoText').remove()
    }
  }

  d3.select(window).on('resize', drawBarChart);

</script>
</body>
</html>