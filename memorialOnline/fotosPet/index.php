<?php include '../main/cabecalho.php';
include '../poo/vo/Pet.php';

$ch = curl_init($configConexao.'petById/'.$_GET['id']);
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

$pet = json_decode(curl_exec($ch), true);
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
                        <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Foto</span>
                            <input type="file" class="upload" name="arquivo" id="arquivo">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info waves-effect" data-dismiss="modal">Salvar</button>
                    <a href="../fotosPet/modificar.php">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>

<?php 
if(isset($_FILES['arquivo']['name'])){
    $status = $_GET['status'];
    if($status == 'cadastrar'){
        $data_array = array(
            'foto' => base64_encode(file_get_contents($_FILES['arquivo']['tmp_name'])),
            'pet' => $pet,
            'cd_user' => $_SESSION['id']
        );
        
        $make_call = pullAPI('POST', $configConexao.'fotosPet', json_encode($data_array));
        $response = json_decode($make_call, true);
    }else if($status == 'editar'){
        $data_array = array(
            'foto' => base64_encode(file_get_contents($_FILES['arquivo']['tmp_name'])),
            'pet' => $pet,
            'cd_user' => $_SESSION['id']
        );
    
        $make_call = pullAPI('PUT', $configConexao.'fotosPet/'.$_GET['id'], json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}

include '../main/footer.php';
?>