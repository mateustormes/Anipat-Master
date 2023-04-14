<?php include '../main/cabecalho.php';
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"></button>
            <?php if($_GET['status'] == 'cadastrar'){ ?>
                <h4 class="modal-title" id="myModalLabel">Adicionar Status</h4>
            <?php }else{ ?>
                <h4 class="modal-title" id="editar">Editar Status</h4>
            <?php } ?>
        </div>
        <div class="modal-body">
            <form class="form-horizontal form-material" action="">
                <div class="form-group">
                    <div class="col-md-12 m-b-20">
                        <input type="text" class="form-control" placeholder="Descrição">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal" onclick="Salvar()">Salvar</button>
            <a href="../status/modificar.php">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button>
            </a>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<script>
    class Status {
        constructor(id, descricao, cd_user, dt_user) {
            this.id = id;
            this.descricao = descricao;
            this.cd_user = cd_user;
            this.dt_user = dt_user;
        }
    }
    function Salvar(){
        let obj = new Status(null, "Ford", null, null);

        fetch($configConexao.'status', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ obj })
        })
        .then(response => response.json())
        .then(response => console.log(JSON.stringify(response)));
    }

    function Editar(){
        fetch($configConexao.'status', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ "id": 78912,
                                    "descricao": "teste" })
        })
        .then(response => response.json())
        .then(response => console.log(JSON.stringify(response)));
    }
</script>
<?php include '../main/footer.php';
?>