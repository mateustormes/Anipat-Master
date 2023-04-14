<?php include '../main/cabecalho.php';
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <?php if($_GET['status'] == 'cadastrar'){ ?>
                <h4 class="modal-title" id="cadastrar">Adicionar Albúm</h4>
            <?php }else{ ?>
                <h4 class="modal-title" id="editar">Editar Albúm</h4>
            <?php } ?>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="form-horizontal form-material">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Type name">
                    </div>
                    <div class="col-md-12 m-b-20">
                        <select class="form-control" name="publico" id="publico">
                            <option value="S">S</option>
                            <option value="N">N</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect" data-dismiss="modal">Salvar</button>
                <a href="../album/modificar.php">
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
            'publico' => $_POST['publico'],
            'cd_user' => $_SESSION['id'], 
            'status' =>  $status
        );
    
        $make_call = pullAPI('POST', $configConexao.'albumFotos', json_encode($data_array));
        $response = json_decode($make_call, true);
    }else if($status == 'editar'){
        $status = new Status();
        $status->setId($_POST['status']);
        $data_array = array(
            'descricao' => $_POST['descricao'],
            'publico' => $_POST['publico'],
            'cd_user' => $_SESSION['id'], 
            'status' =>  $status
        );
    
        $make_call = pullAPI('PUT', $configConexao.'albumFotos/'.$_GET['id'], json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}
include '../main/footer.php';
?>