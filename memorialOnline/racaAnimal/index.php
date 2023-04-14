<?php 
include '../main/cabecalho.php';
include '../poo/vo/CategoriaAnimal.php';
$ch = curl_init($configConexao.'categoriaAnimalAll');
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

$categoriaAnimal = json_decode(curl_exec($ch), true);
curl_close($ch);



?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <?php if($_GET['status'] == 'cadastrar'){ ?>
                <h4 class="modal-title" id="cadastrar">Adicionar Raça de Animal</h4>
            <?php }else{ ?>
                <h4 class="modal-title" id="editar">Editar Raça de Animal</h4>
            <?php } ?>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="form-horizontal form-material">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <select class="form-control" name="fk_categoria_animal" id="fk_categoria_animal">
                            <?php foreach($categoriaAnimal as $cat){ ?>
                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['descricao']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <input name="descricao" id="descricao" type="text" class="form-control" placeholder="Descrição" name="descricao" id="descricao">
                    </div>
                    <?php if($_GET['status'] == 'cadastrar'){ ?>
                        <button type="submit" class="btn btn-info waves-effect" onclick="btnSalvar('cadastrar')" data-dismiss="modal">Salvar</button>
                    <?php }else{ ?>
                            <button type="submit" class="btn btn-info waves-effect" onclick="btnSalvar('editar')" data-dismiss="modal">Atualizar</button>
                    <?php } ?>
                    <a href="../racaAnimal/modificar.php">
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
        $categoriaAnimal = new CategoriaAnimal();
        $categoriaAnimal->setId($_POST['fk_categoria_animal']);
        $data_array = array(
            'descricao' => $_POST['descricao'],
            'cd_user' => $_SESSION['id'], 
            'categoria_animal' =>  $categoriaAnimal
        );
    
        $make_call = pullAPI('POST', $configConexao.'racaAnimal', json_encode($data_array));
        $response = json_decode($make_call, true);
    }else if($status == 'editar'){
        $categoriaAnimal = new CategoriaAnimal();
        $categoriaAnimal->setId($_POST['fk_categoria_animal']);
        $data_array = array(
            'descricao' => $_POST['descricao'],
            'cd_user' => $_SESSION['id'], 
            'categoria_animal' =>  $categoriaAnimal
        );
    
        $make_call = pullAPI('PUT', $configConexao.'racaAnimal/'.$_GET['id'], json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}
include '../main/footer.php';
?>