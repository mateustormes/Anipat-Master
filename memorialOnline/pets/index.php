<?php include '../main/cabecalho.php';
include '../poo/vo/RacaAnimal.php';
$ch = curl_init($configConexao.'racaAnimalAll');
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

$racaAnimal = json_decode(curl_exec($ch), true);
curl_close($ch);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <?php if($_GET['status'] == 'cadastrar'){ ?>
                <h4 class="modal-title" id="cadastrar">Adicionar Pets</h4>
            <?php }else{ ?>
                <h4 class="modal-title" id="editar">Editar Pets</h4>
            <?php } ?>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="form-horizontal form-material">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                    </div>
                    <div class="col-md-12 m-b-20">
                        <select class="form-control" name="raca_animal" id="raca_animal">
                            <?php foreach($racaAnimal as $raca){ ?>
                                <option value="<?php echo $raca['id']; ?>"><?php echo $raca['descricao']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento">
                    </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect" data-dismiss="modal">Salvar</button>
                <a href="<?php echo 'fotosPet/index.php?id='.$_GET['id']; ?>">
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
        $racaAnimal = new RacaAnimal();
        $racaAnimal->setId($_POST['raca_animal']);
        $data_array = array(
            'nome' => $_POST['nome'],
            'data_nascimento' => $_POST['data_nascimento'],
            'cd_user' => $_SESSION['id'], 
            'racaAnimal' =>  $racaAnimal
        );
    
        $make_call = pullAPI('POST', $configConexao.'pet', json_encode($data_array));
        $response = json_decode($make_call, true);
    }else if($status == 'editar'){
        $data_array = array(
            'nome' => $_POST['nome'],
            'data_nascimento' => $_POST['data_nascimento'],
            'cd_user' => $_SESSION['id'], 
            'racaAnimal' =>  $racaAnimal 
        );
    
        $make_call = pullAPI('PUT', $configConexao.'pet/'.$_GET['id'], json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}
include '../main/footer.php';
?>