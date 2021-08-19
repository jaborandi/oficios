<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >Andamento dos ofícios</h4>
                </div>
                <div class="col-md-6 comp-grid">
                    <?php $rec_count = $comp_model->getcount_todos();  ?>
                    <a class="animated zoomIn record-count card bg-dark text-white"  href="<?php print_link("oficios/") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Todos</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_oficiosentregues();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("oficios/?oficios_data=&oficios_andamento%5B%5D=OFICIO+ENTREGUE") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Oficios Entregues</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_semprotocolo();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("oficios/?oficios_data=&oficios_andamento%5B%5D=SEM+PROTOCOLO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Sem Protocolo</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_projetosemandamento();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("oficios/?oficios_data=&oficios_andamento%5B%5D=PROJETO+EM+ANDAMENTO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Projetos em Andamento</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_finalizados();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("oficios/?oficios_data=&oficios_andamento%5B%5D=FINALIZADO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Finalizados</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_cancelados();  ?>
                    <a class="animated zoomIn record-count card bg-success text-white"  href="<?php print_link("oficios/?oficios_data=&oficios_andamento%5B%5D=CANCELADO") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Cancelados</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_seminformao();  ?>
                    <a class="animated zoomIn record-count card bg-dark text-white"  href="<?php print_link("oficios/?oficios_data=&oficios_andamento%5B%5D=") ?>">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Sem Informação</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 comp-grid">
                    <h4 >Clique em um dos cards ao lado para ver os ofícios incluídos na contagem, ou no botão abaixo para adicionar um novo</h4>
                    <div class=""><br><br></div>
                        <a  class="btn btn-primary" href="<?php print_link("oficios/add") ?>">
                            <i class="icon-plus icon-3x"></i>                               
                            Adicionar Novo Ofício 
                        </a>
                        <div class=""><br><br></div>
                            <a  class="btn btn-dark" href="<?php print_link("contatos/add") ?>">
                                <i class="icon-plus icon-3x"></i>                               
                                Adicionar Novo Contato 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
