<?php include '../main/cabecalho.php';
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
                <h4 class="modal-title" id="cadastrar">Adicionar Categoria Usuário</h4>
            <?php }else{ ?>
                <h4 class="modal-title" id="editar">Editar Categoria Usuário</h4>
            <?php } ?>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="form-horizontal form-material">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
                    </div>
                    <div class="col-md-12 m-b-20">
                        <select class="form-control" name="status" id="status">
                            <?php foreach($status as $raca){ ?>
                                <option value="<?php echo $raca['id']; ?>"><?php echo $raca['descricao']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect" data-dismiss="modal">Salvar</button>
                <a href="../categoriaUsuario/modificar.php">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
                </a>
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
            'descricao' => $_POST['descricao'],
            'cd_user' => $_SESSION['id'], 
            'status' =>  $status
        );
    
        $make_call = pullAPI('POST', $configConexao.'categoriaUsuario', json_encode($data_array));
        $response = json_decode($make_call, true);
    }else if($status == 'editar'){
        $status = new Status();
        $status->setId($_POST['status']);
        $data_array = array(
            'descricao' => $_POST['descricao'],
            'cd_user' => $_SESSION['id'], 
            'status' =>  $status
        );
    
        $make_call = pullAPI('PUT', $configConexao.'categoriaUsuario/'.$_GET['id'], json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}
include '../main/footer.php';
?>