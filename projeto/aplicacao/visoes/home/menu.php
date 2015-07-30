		<section id="logo-section" class="text-center">
			<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo text-center">
                            <h1><?php print $tituloMenu; ?></h1>
                            <span><?php print $subtituloMenu; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="mainbody-section text-center">
            <div class="container">
                <div class="row">     
                    <div class="col-md-3">
                        <div class="menu-item vermelhoEscuro">
                            <a href="#<?php print $opcao1var; ?>" data-toggle="modal">
                                <i class="glyphicon glyphicon-new-window"></i>
                                <p><?php print $opcao1; ?></p>
                            </a>
                        </div>                       
                        <div class="menu-item azulClaro">
                            <a href="#<?php print $opcao2var; ?>" data-toggle="modal">
                                <i class="glyphicon glyphicon-open"></i>
                                <p><?php print $opcao2; ?></p>
                            </a>
                        </div>                  
                        <div class="menu-item laranjaClaro">
                            <a href="#<?php print $opcao3var; ?>" data-toggle="modal">
                                <i class="glyphicon glyphicon-cog"></i>
                                <p><?php print $opcao3; ?></p>
                            </a>
                        </div> 
                    </div>                   
                    <div class="col-md-6">    
                        <!-- Start Carousel Section -->
                        <div class="home-slider">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="padding-bottom: 30px;">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="<?php print $imagem1;?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?php print $imagem2;?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="<?php print $imagem3;?>" class="img-responsive" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-3">               
                        <div class="menu-item azulEscuro">
                            <a href="#<?php print $opcao4var; ?>" data-toggle="modal">
                                <i class="glyphicon glyphicon-import"></i>
                                <p><?php print $opcao4; ?></p>
                            </a>
                        </div>
                        
                        <div class="menu-item laranjaEscuro">
                            <a href="#<?php print $opcao5var; ?>" data-toggle="modal">
                                <i class="glyphicon glyphicon-export"></i>
                                <p><?php print $opcao5; ?></p>
                            </a>
                        </div>
                        
                        <div class="menu-item roxo">
                            <a href="#<?php print $opcao6var; ?>" data-toggle="modal">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <p><?php print $opcao6; ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>