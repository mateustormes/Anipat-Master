<?php include '../main/cabecalho.php';
// Iniciamos a função do CURL:
$ch = curl_init($configConexao.'porteFisicoAll');

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

$porteFisico = json_decode(curl_exec($ch), true);
curl_close($ch);
?>


<div class="row">
    <div class="col-12">
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Porte Físico</h4>
                <h6 class="card-subtitle">Você pode modificar os porte físico</h6>
                <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="3">
                    <thead>
                        <tr>
                            <th data-hide="phone, tablet">#</th>
                            <th data-hide="phone, tablet">Descrição</th>
                            <th data-hide="phone, tablet">Status</th>
                            <th data-sort-ignore="true" class="min-width">Ação</th>
                        </tr>
                    </thead>
                    <div class="m-t-40">
                        <div class="d-flex">
                            <div class="mr-auto">
                                <div class="form-group">
                                    <a href="../porteFisico/index.php?status=cadastrar">
                                        <button id="demo-btn-addrow" class="btn btn-primary btn-sm"><i class="icon wb-plus" aria-hidden="true"></i>Adicionar
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <div class="form-group">
                                    <input id="demo-input-search2" type="text" placeholder="Search" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <tbody>
                        <?php foreach($porteFisico as $porte){ ?>
                        <tr>
                            <td><?php echo $porte['id']; ?></td>
                            <td><?php echo $porte['descricao']; ?></td>
                            <td><span class="label label-table label-success">Active</span> </td>
                            <td>
                                <a href="<?php echo '../porteFisico/index.php?status=editar&id='.$porte['id']; ?>">
                                    <button type="button" class="btn btn-info btn btn-sm btn-icon btn-pure btn-outline editar-row-btn" data-toggle="tooltip" data-original-title="Editar"><i class="ti-pencil" aria-hidden="true"></i></button>
                                </a>
                                <a href="<?php echo '../porteFisico/modificar.php?status=remover&id='.$porte['id']; ?>">
                                    <button type="button" class="btn btn-danger btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="text-right">
                                    <ul class="pagination">
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
if(isset($_GET['id']) && isset($_GET['status'])){
    $status = $_GET['status'];
    $id = $_GET['id'];
    if($status == 'remover'){
        $url = $configConexao.'porteFisico/'.$id;
        $delete_user = pullAPI('DELETE', $url, false);
        $usuariodeletado = json_decode($delete_user, true);


        if(isset($delete_user)){
            echo "O Usuário Foi deletado";
        }else {
            echo "Usuário não encontrado";
        }
    }
}
include '../main/footer.php'; 
?>