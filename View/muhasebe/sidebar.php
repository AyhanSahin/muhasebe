 <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">ANA EKRAN</span>
                               
                            </a>
                         
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">İşlemler</h3>
                        </li>
                        <li class="nav-item <?php
                        switch (ayhan::functionName()) {
                            case 'musteri':
                            case 'musteri_listesi':    
                                echo ' start active';
                                break;
                            default:
                                break;
                        }
                        ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">SATIŞLAR</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                
                                
                                <li class="nav-item  <?php
                        switch (ayhan::functionName()) {
                            case 'teklifler':
                                echo ' start active';
                                break;
                            default:
                                break;
                        }
                        ?>"><a href="ui_colors.html" class="nav-link ">
                                        <span class="title">Teklifler</span>
                                    </a>
                                </li>
                                
                                
                                
                                <li class="nav-item <?php
                        switch (ayhan::functionName()) {
                            case 'fatura':
                                echo ' open';
                                break;
                            default:
                                break;
                        }
                        ?>"><a href="<?php SELF::go("satislar/fatura"); ?>l" class="nav-link ">
                                        <span class="title">Faturalar</span>
                                    </a>
                                </li>
                                
                                
                                
                                <li class="nav-item  <?php
                        switch (ayhan::functionName()) {
                            case 'musteri':
                            case 'musteri_listesi':
                                echo 'open';
                                break;
                            default:
                                break;
                        }
                        ?>"><a href="<?php SELF::go("musteri/musteri_listesi"); ?>" class="nav-link ">
                                        <span class="title">Müşteriler</span>
                                    </a>
                                </li>
                                
                                
                                
                               
                      <li class="nav-item  <?php
                        switch (ayhan::functionName()) {
                            case 'satis_raporu':
                                echo 'open';
                                break;
                            default:
                                break;
                        }
                        ?>"> <a href="<?php SELF::go("satislar/satis_raporu"); ?>" class="nav-link ">
                                        <span class="title">Satış Raporu</span>
                                    </a>
                                </li>
                                
                                     <li class="nav-item  ">
                                    <a href="ui_nestable.html" class="nav-link ">
                                        <span class="title">Tahsilat Raporu</span>
                                    </a>
                                </li>
                                
                                
                                     <li class="nav-item  ">
                                    <a href="ui_nestable.html" class="nav-link ">
                                        <span class="title">Gelir Gider Raporu</span>
                                    </a>
                                </li>
                                
                                
                                     <li class="nav-item  ">
                                    <a href="ui_nestable.html" class="nav-link ">
                                        <span class="title">Satış Raporu</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-paper-plane"></i>
                                <span class="title">GİDERLER</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Date & Time Pickers</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Color Pickers</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_select2.html" class="nav-link ">
                                        <span class="title">Select2 Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_multiselect_dropdown.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiselect Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_multi_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiple Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                                        <span class="title">Select Splitter</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_clipboard.html" class="nav-link ">
                                        <span class="title">Clipboard</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_typeahead.html" class="nav-link ">
                                        <span class="title">Typeahead Autocomplete</span>
                                    </a>
                                </li>
 
                        
                            </ul>
                        </li>
          
                     <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-bank"></i>
                                <span class="title">NAKİT AKIŞI</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Date & Time Pickers</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Color Pickers</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_select2.html" class="nav-link ">
                                        <span class="title">Select2 Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_multiselect_dropdown.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiselect Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_multi_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiple Select</span>
                                    </a>
                                </li>
 
                            </ul>
                        </li>
          
                   
                        <li class="nav-item <?php
                        switch (ayhan::functionName()) {
                            case 'hizmet_urun':
                            case 'hizmeturunekle':
                            case 'irsaliye':
                            case 'yeni_giden_irsaliye_ekle': 
                            case 'fiyat_listesi':
                            case 'flekle':
                            case 'fiyat_listesi_detay': 
                            case 'fl_guncelle':    
                            case 'fl_kopya': 
                                
                                echo ' start active open';
                                break;
                            default:
                                break;
                        }
                        ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-basket-loaded"></i>
                                <span class="title">STOK</span>
                                <span class="arrow <?php
                        switch (ayhan::functionName()) {
                            case 'hizmet_urun':
                            case 'hizmeturunekle':
                            case 'irsaliye':
                            case 'yeni_giden_irsaliye_ekle': 
                            case 'fiyat_listesi':
                            case 'flekle':    
                            case 'fiyat_listesi_detay': 
                            case 'fl_guncelle':
                            case 'fl_kopya':     
                                echo '  open';
                                break;
                            default:
                                break;
                        }
                        ?> "></span>
                            </a>
                            <ul class="sub-menu">
                               
                                 <li class="nav-item  <?php
                        switch (ayhan::functionName()) {
                            case 'hizmet_urun':
                                 case 'hizmeturunekle':
                            
                                
                                echo 'open';
                                break;
                            default:
                                break;
                        }
                        ?>">
                                    <a href="<?php SELF::go("stok/hizmet_urun"); ?>" class="nav-link ">
                                        <span class="title">Hizmet && Ürünler</span>
                                    </a>
                                </li>
                                
                              <li class="nav-item  <?php
                        switch (ayhan::functionName()) {
                            case 'irsaliye':
                                 
                            case 'yeni_giden_irsaliye_ekle':  
                                echo 'open';
                                break;
                            default:
                                break;
                        }
                        ?>">
                                    <a href="<?php SELF::go("stok/irsaliye"); ?>" class="nav-link ">
                                        <span class="title">İrsaliyeler</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                
                                
                              <li class="nav-item  <?php
                        switch (ayhan::functionName()) {
                            case 'fiyat_listesi':
                             case 'flekle':
                            case 'fiyat_listesi_detay':     
                            case 'fl_guncelle':
                            case 'fl_kopya':    
                            case '':  
                                echo 'open';
                                break;
                            default:
                                break;
                        }
                        ?>">
                                    <a href="<?php SELF::go("stok/fiyat_listesi"); ?>"  class="nav-link ">
                                        <span class="title">Fiyat listesi</span>
                                    </a>
                                </li>
                                
                                
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_multiselect_dropdown.html" class="nav-link ">
                                        <span class="title">Stok Geçmişi</span>
                                    </a>
                                </li>
                                
                                
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select.html" class="nav-link ">
                                        <span class="title">Stok Raporu</span>
                                    </a>
                                </li>
                    
             
                        
                            </ul>
                        </li>
            <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-equalizer"></i>
                                <span class="title">AYARLAR</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Date & Time Pickers</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Color Pickers</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_select2.html" class="nav-link ">
                                        <span class="title">Select2 Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_multiselect_dropdown.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiselect Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_multi_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiple Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                                        <span class="title">Select Splitter</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_clipboard.html" class="nav-link ">
                                        <span class="title">Clipboard</span>
                                    </a>
                                </li>
     
                        
                            </ul>
                        </li>
          
               <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-equalizer"></i>
                                <span class="title">TANIMLAMALAR</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Date & Time Pickers</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Color Pickers</span>
                                        <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_select2.html" class="nav-link ">
                                        <span class="title">Select2 Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_multiselect_dropdown.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiselect Dropdowns</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_multi_select.html" class="nav-link ">
                                        <span class="title">Bootstrap Multiple Select</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                                        <span class="title">Select Splitter</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_clipboard.html" class="nav-link ">
                                        <span class="title">Clipboard</span>
                                    </a>
                                </li>
     
                        
                            </ul>
                        </li>
          
                             
                   
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->