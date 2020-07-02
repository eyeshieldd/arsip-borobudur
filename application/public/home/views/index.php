<!-- revolution slider begin -->
<!-- content begin -->
<div id="content" class="">
  <section id="section-slider" class="fullwidthbanner-container full-height home-slider" aria-label="section-slider" >
    <div id="revolution-slider">
      <ul class="list-unstyled">
        <?php
        if (isset($rs_slider) && !empty($rs_slider)):
            foreach ($rs_slider as $key => $vslider):
              if(!empty($vslider['image_url']) && is_file($vslider['image_url'])){
                  $vslider['image_url'] = base_url($vslider['image_url']);
              } else {
                  $vslider['image_url'] = base_url('assets/image/identitas/image-not-found.png');
              }
            ?>
            <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="" >
            <!--  BACKGROUND IMAGE -->
              <img src="<?=$vslider['image_url']?>" alt="" />
              <div class="tp-caption bottom-description  d-none d-md-block" data-speed="400" data-start="0" data-easing="easeInOutExpo">
                <div class="container">
                  <div class="content py:15">
                    <?=$vslider['caption']?>
                  </div>
                </div>
              </div>
            </li>
          <?php
        endforeach;
        endif;
        ?>
      </ul>
      <!-- ******************* -->
      <!-- BEGIN STATIC LAYERS -->
      <!-- ******************* -->
      <div class="tp-static-layers d-flex align-items-center justify-content-center" >
        <!-- BEGIN STATIC LAYER -->
        <div class="tp-static-layer">
          <div class="container w-100">
            <h1 class="text-white slider-title mb-4 text-center text-shadow">
              Borobudur Conservation Archives
            </h1>
            <form class="search-form mb:90 pb:80" action="http://arsip.borobudurpedia.id/index.php/informationobject/browse" method="get">
              <input type="hidden" name="topLod" value="0">
              <input type="hidden" name="sort" value="relevance">
              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari arsip" name="query" />
                    <div class="input-group-append">
                      <button class="btn btn-primary d-none d-md-block" type="submit" >
                        Cari
                      </button>
                      <button class="btn btn-primary d-block d-md-none icon" type="submit" >
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- END STATIC LAYER -->
      </div>
      <!-- END STATIC LAYERS -->
      <div
        class="tp-bullets container xs:bullet-custom md:number w-100 d-flex justify-content-center justify-content-md-end"
      ></div>
    </div>
  </section>
  <!-- revolution slider close -->
 </div>