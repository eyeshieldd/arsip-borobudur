

<script>
  $(function() {


   new Chart(document.getElementById("chart1"),
   {
    "type":"line",
    "data":{"labels":<?php echo json_encode($tah); ?>,
    "datasets":[{
      "label":"Grafik Permintaan Layanan Per tahun",
      "data": <?php echo json_encode($tot); ?>,
      "fill":false,
      "borderColor":"rgb(86, 192, 216)",
      "lineTension":0.1,
    }]
  },
  "options":{}});

   new Chart(document.getElementById("chart2"),
   {
    "type":"bar",
    "data":{
      "labels":<?php echo json_encode($bul); ?>,
      "datasets":[
      {
        "type" : "line",
        "label":"total",
        "data": <?php echo json_encode($totl); ?>,
        "fill":false,
        "borderColor":"rgb(86, 192, 216)",

        "lineTension":0.1,
      },
      {
        "type":"bar",
        "label":<?php echo json_encode('akademisi'); ?>,
        "data":[

        <?php echo json_encode ($total['akademisi'][4]); ?>,
        <?php echo json_encode ($total['akademisi'][3]); ?>,
        <?php echo json_encode ($total['akademisi'][2]); ?>,
        <?php echo json_encode ($total['akademisi'][1]); ?>,
        <?php echo json_encode ($total['akademisi'][0]); ?>,

        ],

        "fill":true,
        "backgroundColor":"rgb(239, 83, 80)", 
      },
      {
        "type":"bar",
        "label":<?php echo json_encode('umum'); ?>,
        "data":[
        <?php echo json_encode ($total['umum'][4]); ?>,
        <?php echo json_encode ($total['umum'][3]); ?>,
        <?php echo json_encode ($total['umum'][2]); ?>,
        <?php echo json_encode ($total['umum'][1]); ?>,
        <?php echo json_encode ($total['umum'][0]); ?>,
        ],

        "fill":true,
        "backgroundColor":"rgb(255, 178, 43)", 
      },
      {
        "type":"bar",
        "label":<?php echo json_encode('instansi pemerintah'); ?>,
        "data":[
        <?php echo json_encode ($total['instansi pemerintah'][4]); ?>,
        <?php echo json_encode ($total['instansi pemerintah'][3]); ?>,
        <?php echo json_encode ($total['instansi pemerintah'][2]); ?>,
        <?php echo json_encode ($total['instansi pemerintah'][1]); ?>,
        <?php echo json_encode ($total['instansi pemerintah'][0]); ?>,

        ],

        "fill":true,
        "backgroundColor":"rgb(57, 139, 247)", 
      },
      ]
    },"options":{
      // scales: {
      //     xAxes: [{
      //         type: 'time',
      //         time: {
      //           unit: 'month'
      //         }
      //     }]
      // }
    }});
   new Chart(document.getElementById("chart3"),
   {
    "type":"pie",
    "data":{"labels": <?php echo json_encode($status_grafik); ?>,
    "datasets":[{
      "label":"My First Dataset",
      "data":<?php echo json_encode($jumlah_grafik); ?>,
      "backgroundColor":["rgb(239, 83, 80)","rgb(57, 139, 247)","rgb(255, 178, 43)"]}
      ]},
    });

 })

  document.getElementById('download-pdf').addEventListener("click", downloadPDF);
  
  // download file PDF
  function downloadPDF() {

    var newCanvas = document.querySelector("#chart1");
    newContext = newCanvas.getContext('2d');

    var newCanvas1 = document.querySelector("#chart3");
    newContext = newCanvas1.getContext('2d');

    var newCanvas2 = document.querySelector("#chart2");
    newContext = newCanvas2.getContext('2d');


  //create image from dummy canvas
  var newCanvasImg = newCanvas.toDataURL("image/PNG");
  var newCanvasImg1 = newCanvas1.toDataURL("image/PNG");
  var newCanvasImg2 = newCanvas2.toDataURL("image/PNG");
  
    //creates PDF from img
    var doc = new jsPDF('landscape');
    var specialElementHandlers = {
    };
    doc.addImage(newCanvasImg, 'PNG', 10, 120, 0, 60 );
    doc.addImage(newCanvasImg1, 'PNG',185, 120, 0, 0 );
    doc.addImage(newCanvasImg2, 'PNG',5, 0, 0, 100 );
    doc.fromHTML($('#content2').html(), 40, 200, {
      'width': 10,
      'elementHandlers': specialElementHandlers
    })
    doc.fromHTML($('#content').html(), 40, 400, {
      'width': 10,
      'elementHandlers': specialElementHandlers
    });

    doc.save('laporan-chart.pdf');
  }

</script> 


