

        <section>
            <div class="second-page-container">

                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="block-breadcrumb">
                                <ul class="breadcrumb">
                                    <li><a href="<?php SELF::go('index/home'); ?>">ANA SAYFA</a></li>
                                  <!--  <li><a href="#"><?php echo $sayfa; ?></a></li> -->
                                    <li class="active"><?php echo $anabaslik; ?> </li>
                                </ul>
                            </div>
                            <div class="block-blog">
                                 <div class="block">
                                   <!-- <div class="header-for-light">
                                        <h1 class="wow fadeInRight animated" data-wow-duration="1s"><?php echo $anabaslik; ?> <span></span></h1>

                                    </div> -->
                                     <style> p { font-family: inherit !important;} </style>  
                          <?php  
                          
                        $icerik =  call_user_func(array($cls, $fnc)); 
                         
                          echo html_entity_decode($icerik); ?>           
                                     
                                     
                           
     </div>



                        </div>
                    
                    </div>
                </div>  
            </div>

        </section>
