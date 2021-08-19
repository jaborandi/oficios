
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="my-4 p-3 bg-light">
                
                <div>
                    <h4><i class="icon-key"></i> Login de usuário</h4>
                    <hr />
                    <?php 
                    $this :: display_page_errors(); 
                    ?>
                    <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                        <div class="input-group form-group">
                            <input placeholder="Nome de usuário ou email" name="username"  required="required" class="form-control" type="text"  />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="form-control-feedback icon-user"></i></span>
                            </div>
                        </div>
                        
                        <div class="input-group form-group">
                            
                            <input  placeholder="Senha" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="form-control-feedback icon-key"></i></span>
                            </div>
                        </div>
                        <div class="row clearfix mt-3 mb-3">
                            
                            <div class="col-6">
                                <label class="">
                                    <input value="true" type="checkbox" name="rememberme" />
                                    Lembre de mim
                                </label>
                            </div>
                            
                            <div class="col-6">
                                <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Redefinir senha</a>
                            </div>
                            
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                <i class="load-indicator">
                                    <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                </i>
                                Entrar <i class="icon-key"></i>
                            </button>
                        </div>
                        <hr />
                        
                        <div class="text-center">
                            Não tem uma conta? <a href="<?php print_link("index/register") ?>" class="btn btn-success">registo
                            <i class="icon-user"></i></a>
                        </div>
                        
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
</div>