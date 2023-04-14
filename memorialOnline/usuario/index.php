<?php include '../main/cabecalho.php';
include '../poo/vo/Usuario.php';
include '../poo/vo/Status.php';

$ch = curl_init($configConexao.'statusAll');
curl_setopt_array($ch, [
    // Equivalente ao -X:
    CURLOPT_CUSTOMREQUEST => 'GET',
    // Equivalente ao -H:
    CURLOPT_HTTPHEADER => [
        'JsonOdds-API-Key: yourapikey'
    ],
    // Permite obter o resultado
    CURLOPT_RETURNTRANSFER => 1,
]);

$status = json_decode(curl_exec($ch), true);
curl_close($ch);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <?php if($_GET['status'] == 'cadastrar'){ ?>
                <h4 class="modal-title" id="myModalLabel">Adicionar Usuário</h4>
            <?php }else{ ?>
                <h4 class="modal-title" id="editar">Editar Usuário</h4>
            <?php } ?>
        </div>
        <div class="modal-body">
            <form class="form-horizontal form-material" action="" method="POST" enctype="multipart/form-data" accept="image/*">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome">
                    </div>
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" placeholder="CPF" name="cpf" id="cpf">
                    </div>
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" placeholder="E-mail" name="email" id="email">
                    </div>
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" placeholder="Senha" name="senha" id="senha">
                    </div>
                    <div class="col-md-12 m-b-20">
                        <select class="form-control" name="status" id="status">
                            <?php foreach($status as $raca){ ?>
                                <option value="<?php echo $raca['id']; ?>"><?php echo $raca['descricao']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Foto</span>
                            <input type="file" class="upload" name="arquivo" id="arquivo">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info waves-effect" data-dismiss="modal">Salvar</button>
                    <a href="../usuario/modificar.php">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>

<?php 

if(isset($_POST['nome'])){
    $status = $_GET['status'];
    if($status == 'cadastrar'){
        $status = new Status();
        $status->setId($_POST['status']);
        $data_array = array(
            'nome' => $_POST['nome'],
            'cpf' => $_POST['cpf'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => base64_encode(file_get_contents($_FILES['arquivo']['tmp_name'])),
            'cd_user' => $_SESSION['id'], 
            'fk_status' =>  $status,
            'fk_nivel_acesso' => 1
        );
        
        $make_call = pullAPI('POST', $configConexao.'usuario', json_encode($data_array));
        $response = json_decode($make_call, true);
    }else if($status == 'editar'){
        $status = new Status();
        $status->setId($_POST['status']);
        $data_array = array(
            'nome' => $_POST['nome'],
            'cpf' => $_POST['cpf'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => base64_encode(file_get_contents($_FILES['arquivo']['tmp_name'])),
            'cd_user' => $_SESSION['id'], 
            'fk_status' =>  $status,
            'fk_nivel_acesso' => 1
        );
    
        $make_call = pullAPI('PUT', $configConexao.'usuario/'.$_GET['id'], json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}

include '../main/footer.php';
?>