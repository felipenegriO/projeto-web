<div class="section-modal modal fade" id="<?php print $opcao1var; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h1>Novo Projeto</h1>
                    <p>Preencha as informações</p>
                </div>
            </div>
           
                <div class="row">
                    <h3><label class="label label-default" id="labelNomeProjeto"for="nome" > Nome do projeto: </label></h3>
                    <div class="input-group input-group-lg">
                        <span onclick="gerarNomeAleatorio()" class="input-group-addon glyphicon glyphicon-folder-open" id="spanNomeProjeto"></span>
                        <DIV ID="dek" CLASS="dek"></DIV>
                        <input type="text" value='' title="Você pode gerar um nome aleatório clicando no icone do nome"class="form-control" required="required" id="nomeProjeto" name="nomeProjeto" placeholder="Nome do projeto" onblur="verificarNomeProjeto()" aria-describedby="basic-addon1">
                    </div><br/>
                    <h3><label class="label label-default" id="labelClassePrincipal"> Classe Principal: <label></h3>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <input type="checkbox"name="checkClasse" id="checkClasse" value="ok"checked aria-label="...">
                                    </span>
                                    <input type="text" class="form-control" placeholder="Classe principal"name="classePrincipal" id="classePrincipal" aria-label="...">
                                </div>
                </div>
                <br />
                <div class="input-group-addon "style="background-color:white;border:0px;">
                    <button class="feature" type="button" onclick="cadastrar()"  style="background-color:white;border:0px;"><i class="glyphicon glyphicon-ok"></i></button>
                    <button  data-dismiss="modal" class="feature" style="background-color:white;border:0px;"><i class="glyphicon glyphicon-remove"></i></button>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function cadastrar(){
var nome =document.getElementById('nomeProjeto').value;
var classe= document.getElementById('classePrincipal').value
location.href='index.php?acao=cadastrarProjeto&nomeProjeto='+nome+'&classePrincipal='+classe;
}
</script>

<div class="section-modal modal fade" id="<?php print $opcao2var; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h3>Abrir projeto</h3>
                    <p>Aqui você encontra todos os projetos em andamento</p>
                </div>
            </div>
                                            <div class="row">
                                                <form >
                                                    <!-- /implementar acesso a bd com projetos cadastrados-->

                                                    <div class="input-group-addon "style="background-color:white;border:0px;">
                                                        <button class="feature" type="submit" style="background-color:white;border:0px;"><i class="glyphicon glyphicon-ok"></i></button>
                                                        <button  data-dismiss="modal" class="feature" style="background-color:white;border:0px;"><i class="glyphicon glyphicon-remove"></i></button>
                                                    </div>
                                                </form>

                                            </div><!-- /.row -->
                                        </div>

                                    </div>
                                </div>
                                <div class="section-modal modal fade" id="<?php print $opcao3var; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-content">
                                        <div class="close-modal" data-dismiss="modal">
                                            <div class="lr">
                                                <div class="rl">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="row">
                                                <div class="section-title text-center">
                                                    <h3>About Us</h3>
                                                    <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="about-text">
                                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident. It has roots in a piece of classical Latin literature from 45 BC</p>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-6">
                                                                <ul>
                                                                    <li><i class="fa fa-check-square"></i>Sed ut perspiciatis unde omnis iste natus</li>
                                                                    <li><i class="fa fa-check-square"></i>Nor again is there anyone who loves</li>
                                                                    <li><i class="fa fa-check-square-o"></i>At vero eos et accusamus et iusto odio</li>
                                                                    <li><i class="fa fa-check-square-o"></i>Et harum quidem rerum facilis</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6">
                                                                <ul>
                                                                    <li><i class="fa fa-check-square"></i>Nor again is there anyone who loves</li>
                                                                    <li><i class="fa fa-check-square"></i>Nor again is there anyone who loves</li>
                                                                    <li><i class="fa fa-check-square-o"></i>Et harum quidem rerum facilis</li>
                                                                    <li><i class="fa fa-check-square-o"></i>At vero eos et accusamus et iusto odio</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6">
                                                                <ul>
                                                                    <li><i class="fa fa-check-square"></i>Nor again is there anyone who loves</li>
                                                                    <li><i class="fa fa-check-square"></i>Nor again is there anyone who loves</li>
                                                                    <li><i class="fa fa-check-square-o"></i>Et harum quidem rerum facilis</li>
                                                                    <li><i class="fa fa-check-square-o"></i>At vero eos et accusamus et iusto odio</li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div>
                                                </div>
                                            </div><!-- /.row -->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="skill-shortcode">

                                                        <!-- Progress Bar -->
                                                        <div class="skill">
                                                            <p>Web Design</p>          
                                                            <div class="progress">         
                                                                <div class="progress-bar" role="progressbar"  data-percentage="60">
                                                                    <span class="progress-bar-span" >60%</span>
                                                                    <span class="sr-only">60% Complete</span>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                        <!-- Progress Bar -->
                                                        <div class="skill">
                                                            <p>HTML & CSS</p>          
                                                            <div class="progress">         
                                                                <div class="progress-bar" role="progressbar"  data-percentage="95">
                                                                    <span class="progress-bar-span" >95%</span>
                                                                    <span class="sr-only">95% Complete</span>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                        <!-- Progress Bar -->
                                                        <div class="skill">
                                                            <p>Wordpress</p>          
                                                            <div class="progress">         
                                                                <div class="progress-bar" role="progressbar"  data-percentage="80">
                                                                    <span class="progress-bar-span" >80%</span>
                                                                    <span class="sr-only">80% Complete</span>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                        <!-- Progress Bar -->
                                                        <div class="skill">
                                                            <p>Joomla</p>          
                                                            <div class="progress">         
                                                                <div class="progress-bar" role="progressbar"  data-percentage="100">
                                                                    <span class="progress-bar-span" >100%</span>
                                                                    <span class="sr-only">100% Complete</span>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                        <!-- Progress Bar -->
                                                        <div class="skill">
                                                            <p>Extension</p>          
                                                            <div class="progress">         
                                                                <div class="progress-bar" role="progressbar"  data-percentage="70">
                                                                    <span class="progress-bar-span" >70%</span>
                                                                    <span class="sr-only">70% Complete</span>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="custom-tab">

                                                        <ul class="nav nav-tabs nav-justified" role="tablist">
                                                            <li class="active"><a href="#tab-1" role="tab" data-toggle="tab">Our Mission</a></li>
                                                            <li><a href="#tab-2" role="tab" data-toggle="tab">Our Vission</a></li>
                                                            <li><a href="#tab-3" role="tab" data-toggle="tab">Company History</a></li>
                                                        </ul>

                                                        <div class="tab-content">

                                                            <div class="tab-pane active" id="tab-1">
                                                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                                                            </div>


                                                            <div class="tab-pane" id="tab-2">
                                                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                                                            </div>


                                                            <div class="tab-pane" id="tab-3">
                                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                                                            </div>

                                                        </div><!-- /.tab-content -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="section-modal modal fade" id="<?php print $opcao4var; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-content">
                                        <div class="close-modal" data-dismiss="modal">
                                            <div class="lr">
                                                <div class="rl">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="section-title text-center">
                                                    <h3>Importar Projeto</h3>
                                                    <p>Aqui você pode importar projetos</p>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <form id="upload" action="index.html" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
                                                    <div>
                                                        <label for="fileselect">Clique aqui para importar:</label>
                                                        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                                        <div id="filedrag">	Ou arraste o arquivo neste espaço</div>
                                                    </div>
                                                    <div id="messages">
                                                        <p>Estado do(s) Arquivo(s)</p>
                                                    </div>
                                                    <button type="submit">Carregar</button>
                                                </form>

                                            </div><!-- /.row -->
                                        </div>

                                    </div>
                                </div>
                                <div class="section-modal modal fade" id="<?php print $opcao5var; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-content">
                                        <div class="close-modal" data-dismiss="modal">
                                            <div class="lr">
                                                <div class="rl">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="row">
                                                <div class="section-title text-center">
                                                    <h3>Our Expert Team</h3>
                                                    <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                                                </div>
                                            </div>
                                            <div class="row">

                                            </div><!-- /.row -->
                                        </div>

                                    </div>
                                </div>
                                <div class="section-modal modal fade contact" id="<?php print $opcao6var; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-content">
                                        <div class="close-modal" data-dismiss="modal">
                                            <div class="lr">
                                                <div class="rl">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container">
                                            <div class="row">
                                                <div class="section-title text-center">
                                                    <h3>Contact With Us</h3>
                                                    <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="footer-contact-info">
                                                        <h4>Contact info</h4>
                                                        <ul>
                                                            <li><strong>E-mail :</strong> your-email@mail.com</li>
                                                            <li><strong>Phone :</strong> +8801-6778776</li>
                                                            <li><strong>Mobile :</strong> +8801-45565378</li>
                                                            <li><strong>Web :</strong> yourdomain.com</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="footer-social text-center">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="footer-contact-info">
                                                        <h4>Working Hours</h4>
                                                        <ul>
                                                            <li><strong>Mon-Wed :</strong> 9 am to 5 pm</li>
                                                            <li><strong>Thurs-Fri :</strong> 12 pm to 10 pm</li>
                                                            <li><strong>Sat :</strong> 9 am to 3 pm</li>
                                                            <li><strong>Sunday :</strong> Closed</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div><!--/.row -->
                                            <div class="row" style="padding-top: 80px;">
                                                <div class="col-md-12">
                                                    <form name="sentMessage" id="contactForm" novalidate>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                                                    <p class="help-block text-danger"></p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                                                    <p class="help-block text-danger"></p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                                                    <p class="help-block text-danger"></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                                                    <p class="help-block text-danger"></p>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="col-lg-12 text-center">
                                                                <div id="success"></div>
                                                                <button type="submit" class="btn btn-primary">Send Message</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
