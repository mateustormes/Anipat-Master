<?php include '../main/cabecalho.php';
// Iniciamos a função do CURL:
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


<div class="row">
    <div class="col-12">
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Status</h4>
                <h6 class="card-subtitle">Você pode modificar os status</h6>
                <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="3">
                    <thead>
                        <tr>
                            <th data-hide="phone, tablet">#</th>
                            <th data-hide="phone, tablet">Descrição</th>
                            <th data-hide="phone, tablet">Ação</th>
                        </tr>
                    </thead>
                    <div class="m-t-40">
                        <div class="d-flex">
                            <div class="mr-auto">
                                <div class="form-group">
                                    <a href="../status/index.php?status=cadastrar">
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
                        <?php foreach($status as $stats){
                            ?>
                        <tr>
                            <td><?php echo $stats['id']; ?></td>
                            <td><?php echo $stats['descricao']; ?></td>
                            <!-- <td><span class="label label-table label-success"><?php echo $usuario['fk_status']['descricao'] == 'Ativo' ? 'Ativo': 'Inativo'; ?></span> </td> -->
                            <td>
                                <a href="../status/index.php?status=editar">
                                    <button type="button" class="btn btn-info btn btn-sm btn-icon btn-pure btn-outline editar-row-btn" data-toggle="tooltip" data-original-title="Editar"><i class="ti-pencil" aria-hidden="true"></i></button>
                                </a>
                                <button type="button" class="btn btn-danger btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
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
<?php include '../main/footer.php'; ?>