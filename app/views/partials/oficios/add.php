<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Adicionar novo</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="oficios-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("oficios/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="agenda">Agenda </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-agenda"  value="<?php  echo $this->set_field_value('agenda',""); ?>" type="number" placeholder="Nº da Agenda" step="1"  name="agenda"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="data">Data </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-data" class="form-control datepicker  datepicker"  value="<?php  echo $this->set_field_value('data',""); ?>" type="datetime" name="data" placeholder="Clique para escolher" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="destino">Destino </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-destino"  value="<?php  echo $this->set_field_value('destino',""); ?>" type="text" placeholder="Comece a digitar para buscar" list="destino_list"  name="destino"  class="form-control " />
                                                            <datalist id="destino_list">
                                                                <?php 
                                                                $destino_options = $comp_model -> oficios_destino_option_list();
                                                                if(!empty($destino_options)){
                                                                foreach($destino_options as $option){
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                ?>
                                                                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="oficio">Oficio </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-oficio"  value="<?php  echo $this->set_field_value('oficio',""); ?>" type="text" placeholder="Nº do ofício"  name="oficio"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="pauta">Pauta <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-pauta"  value="<?php  echo $this->set_field_value('pauta',""); ?>" type="text" placeholder="Comece a digitar para buscar" list="pauta_list"  required="" name="pauta"  class="form-control " />
                                                                    <datalist id="pauta_list">
                                                                        <?php 
                                                                        $pauta_options = $comp_model -> oficios_pauta_option_list();
                                                                        if(!empty($pauta_options)){
                                                                        foreach($pauta_options as $option){
                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                        ?>
                                                                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                        <?php
                                                                        }
                                                                        }
                                                                        ?>
                                                                    </datalist>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="destinatario">Destinatário </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <select  id="ctrl-destinatario" name="destinatario"  placeholder="Selecione um valor ..."    class="custom-select" >
                                                                        <option value="">Selecione um valor ...</option>
                                                                        <?php 
                                                                        $destinatario_options = $comp_model -> oficios_destinatario_option_list();
                                                                        if(!empty($destinatario_options)){
                                                                        foreach($destinatario_options as $option){
                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                        $selected = $this->set_field_selected('destinatario',$value, "");
                                                                        ?>
                                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                            <?php echo $label; ?>
                                                                        </option>
                                                                        <?php
                                                                        }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="andamento">Andamento </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <?php
                                                                    $andamento_options = Menu :: $andamento;
                                                                    if(!empty($andamento_options)){
                                                                    foreach($andamento_options as $option){
                                                                    $value = $option['value'];
                                                                    $label = $option['label'];
                                                                    //check if current option is checked option
                                                                    $checked = $this->set_field_checked('andamento', $value, "");
                                                                    ?>
                                                                    <label class="custom-control custom-radio custom-control-inline">
                                                                        <input id="ctrl-andamento" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio"   name="andamento" />
                                                                            <span class="custom-control-label"><?php echo $label ?></span>
                                                                        </label>
                                                                        <?php
                                                                        }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="observacoes">Observações </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <textarea placeholder="Observações adicionais que julgar pertinente. Lembre-se: O que você adicionar aqui irá te ajudar a encontrar depois pela pesquisa" id="ctrl-observacoes"  rows="5" name="observacoes" class="htmleditor form-control"><?php  echo $this->set_field_value('observacoes',""); ?></textarea>
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Por favor insira o texto</div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="arquivos">Arquivos </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <div class="dropzone " input="#ctrl-arquivos" fieldname="arquivos"    data-multiple="true" dropmsg="Clique para escolher ou arraste aqui para enviar"    btntext="procurar" extensions=".jpg,.png,.gif,.jpeg,.docx,.doc,.xls,.xlsx,.xml,.csv,.pdf,.xps,.zip,.gzip,.rar,.7z,.mp3,.mp4,.wav,.avi,.mpg,.mpeg" filesize="300" maximum="300">
                                                                            <input name="arquivos" id="ctrl-arquivos" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('arquivos',""); ?>" type="text"  />
                                                                                <!--<div class="invalid-feedback animated bounceIn text-center">Por favor, escolha um arquivo</div>-->
                                                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                            </div>
                                                                        </div>
                                                                        <small class="form-text">Você pode enviar quantos arquivos achar pertinente</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="adicionado_por">Adicionado Por <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-adicionado_por"  value="<?php ECHO USER_NAME; ?>" type="text" placeholder="Entrar  Adicionado Por"  readonly required="" name="adicionado_por"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                <div class="form-ajax-status"></div>
                                                                <button class="btn btn-primary" type="submit">
                                                                    Enviar
                                                                    <i class="icon-paper-plane"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
