<?php include '../main/cabecalho.php';
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <?php if($_GET['status'] == 'cadastrar'){ ?>
                <h4 class="modal-title" id="cadastrar">Adicionar Porte Físico</h4>
            <?php }else{ ?>
                <h4 class="modal-title" id="editar">Editar Porte Físico</h4>
            <?php } ?>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="form-horizontal form-material">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <input name="descricao" id="descricao" type="text" class="form-control" placeholder="Descrição do Porte Físico">
                    </div>
                    <button type="submit" class="btn btn-info waves-effect" data-dismiss="modal">Salvar</button>
                    <a href="../porteFisico/modificar.php">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
                    </a>
                </div>
                
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>

<?php 

if(isset($_POST['descricao']) && isset($_GET['status'])){
    $status = $_GET['status'];
    if($status == 'cadastrar'){
        $data_array = array(
            'descricao' => $_POST['descricao'],
            'cd_user' => $_SESSION['id']  
        );
    
        $make_call = pullAPI('POST', $configConexao.'porteFisico', json_encode($data_array));
        $response = json_decode($make_call, true);
    }else if($status == 'editar'){
        $data_array = array(
            'descricao' => $_POST['descricao'],
            'cd_user' => $_SESSION['id']  
        );
    
        $make_call = pullAPI('PUT', $configConexao.'porteFisico/'.$_GET['id'], json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}
include '../main/footer.php';
?>