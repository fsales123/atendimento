<?php require "database/clientes.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Atendimento</title>
    <link href="assets/css/styles.min.css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
        type='text/css'>

    <script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 align="center">Atendimento</h1>
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4 col-xs-4">
                                <h3 class="panel-title">Painel</h3>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <button class="btn btn-sm btn-primary btn-create" id="abrirModalCliente">Cliente Novo</button>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <button class="btn btn-sm btn-primary btn-create" id="registrarAtendimento">Registrar Atendimento</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-list">
                            <thead>
                                <tr>  
                                    <th>Nome Cliente</th>
                                    <th>CNPJ</th>
                                    <th><em class="fa fa-file-text"></em></th>
                                    <th><em class="fa fa-times"></em></th>
                                </tr>
                            </thead>
                            <tbody id="listar">
                                <tr v-for='cliente in dados'>                             
                                    <td>{{cliente.nomeCli}}</td>
                                    <td>{{cliente.cnpj}}</td>
                                    <td><button class="btn btn-info" id="abrirModal" 
                                    v-bind:data-id="cliente.cli_id">Mostrar</button>
                                    </td>
                                    <td><button class="btn btn-danger" v-bind:data-id="cliente.cli_id">Excluir</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Descricao------------------------------------------------------------------->
    <div id="modalMostrar">
        <div id="descricoes" class="scroll">
            <div class="card" v-for="descricao in descricoes">
                
                <div class="card-header">
                <h3 class="card-title">{{descricao.desc_data}}</h3>
                </div>
                <div class="card-body">
                <div>
                    {{descricao.descricao}} 
                </div>    
                    <button class="fa fa-times btn btn-danger right ml3"               id="removerRegist"></button>
                </div><div>
                    <button class="fa fa-edit btn btn-primary right ml3"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Descricao------------------------------------------------------------------------------->
    <div id="modalRegistrar">
        <form action="database/registrar.php" method="POST">
            <div class="form-group">
            <label for="cli_id">Cliente:</label>
                <select name="cli_id" id="cli_id" class="form-control">
                    <option value="" disable selected>Selecione...</option>
                    <?php foreach(clientes() as $cliente) :  ?>
                        <option value="<?=$cliente['cli_id']?>"><?=$cliente['nomeCli']?></option> 
                    <?php endforeach; ?>
                </select> 
            </div>
            <div class="form-group">
            <label for="inputAddress2">Descrição</label>
                <textarea type="text" rows="5" class="form-control" id="descricao" name="descricao" placeholder="Descrição"></textarea>                 
            </div>
            <button class="btn btn-primary mt-3">Registrar</button>
        </form>
    </div>

    
    <!--Modal Registrar-------------------------------------------------------------------------------->
    <div id="modalCliente">
    <form action="database/cliente.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Nome do Cliente</label>
                                <input type="text" class="form-control" id="nomeCli" name="nomeCli"
                                    placeholder="Nome do Cliente">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">CNPJ</label>
                            <input type="text" id="cnpj" class="form-control" name="cnpj"
                                placeholder="00.000.000/00-00" onfocus="javascript: retirarFormatacao(this);"
                                onblur="javascript: formatarCampo(this);" maxlength="14">
                        </div>
                        <button class="btn btn-primary right">Registrar</button>
                    </form>
    </div>

    <!--tem certeza-->
    <div id="modalRemoverRegist">   
    <p>Tem certeza?</p>
    <form action="database/removerRegistro.php" method="POST">
    <input type="hidden" name="cli_id" value="<?php echo isset($cli_id['cli_id']);?>">
    <button class="btn btn-primary right ml3">Sim</button>
    </form>
    <button class="btn btn-danger right ml3">Não</button>
    </div>

    <!--fim-->

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>