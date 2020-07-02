<div class="keterangan">
  <div class="row p-b-20">
    <div class="col-7"></div>
    <div class="col-5">
      <div class="text-right">
<!--         <button class="btn btn-primary"><i class="fa fa-excel"></i> Download Excel</button>
 -->        <button class="btn btn-primary" id="download-pdf"><i class="fa fa-excel"></i> Download PDF</button>

      </div>
    </div>  
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Grafik Permintaan Layanan perbulan</h4>
          <div>
            <canvas id="chart2" height="105"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-7">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Grafik Permintaan Layanan pertahun</h4>
          <div>
            <canvas id="chart1" height="105"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Prosentase Berdasarkan Status Pemohon </h4>
          <div>
            <canvas id="chart3" height="150"> </canvas>
          </div>
        </div>
      </div>
    </div> 
  </div>
      <!-- Laporan Bulanan -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div id="content2">
            <h4 class="card-title">Laporan Bulan</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>Bulan</th>
                      <th>Status</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($laporan_bulanan as $s){?>
                      <tr>
                        <td><?php echo $s->bulan; ?></td>
                        <td><?php echo $s->status; ?></td>
                        <td><?php echo $s->total; ?> Pemohon</td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Laporan Tahunan -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div id="content">
            <h4 class="card-title">Laporan Tahunan</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>Tahun</th>
                      <th>Status</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    foreach($laporan_tahunan as $s){?>
                      <tr>
                        <td><?php echo $s->tahun; ?></td>
                        <td><?php echo $s->status; ?></td>
                        <td><?php echo $s->jumlah; ?> Pemohon</td>
                      </tr>
                    <?php } ?>
               
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    




<!--Add External Libraries - JQuery and jspdf 
check out url - https://scotch.io/@nagasaiaytha/generate-pdf-from-html-using-jquery-and-jspdf
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>