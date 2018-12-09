<div class="content-wrapper">    <section class="content-header">        <h1>            Gerenciamento de <?= $subtitle; ?>        </h1>    </section>    <section class="content">        <div class="row">            <div class="col-xs-12">                <div class="box box-info">                    <div class="box-header">                        <h3 class="box-title">Cadastre suas imagens personalizadas e use-as no editor de texto utilizando o link direto de cada uma</h3>                        <a href="<?= base_url('admin/upload/inserir'); ?>" class="btn btn-small pull-right btn-flat btn-primary">Inserir nova imagem</a>                    </div>                </div>            </div>        </div>        <div class="row ">                            <?php foreach ($uploads as $foto) { ?>                                                <div class="col-md-3">                             <div class="box box-solid">                                <div class="box-header with-border">                                    <h3 class="box-title"><?= $foto['upl_descricao'] ?></h3>                                </div>                                <div class="box-body">                                    <img src="<?= $foto['upl_linkdireto'] ?>" alt="<?= $foto['upl_descricao']; ?>" title="<?= $foto['upl_descricao']; ?>" class="img-responsive" style="max-width: 100%;">                                </div>                                <div class="box-footer">                                    <input type="text" id="input<?= $foto['upl_id']; ?>" value="<?= $foto['upl_linkdireto']; ?>" readonly="" class="form-control"><br>                                    <button type="button" style="margin-left: 20px" id="button<?= $foto['upl_id']; ?>" class="btn btn-flat btn-info"><i class="fa fa-copy"></i> Copiar Texto</button>                                    <a onclick="deletar(<?= $foto['upl_id']; ?>)" class="btn btn-flat btn-danger"><i class="fa fa-trash"></i> Excluir Foto</a>                                </div>                            </div>                        </div>                                        <script>                        $(function () {                            $('#button<?= $foto['upl_id']; ?>').click(function () {                                var IDnum = $("#input<?= $foto['upl_id']; ?>").val();                                $("#input<?= $foto['upl_id']; ?>").select();                                document.execCommand("copy");                                alert("Link Copiado: " + IDnum);                            });                        });                    </script>                <?php } ?>                    </div>    </section></div> <script>                                       function deletar(id) {                        if (confirm("Deseja mesmo excluir?")) {                            window.location.href = "<?= base_url('admin/upload/excluir/'); ?>" + id;                        }                    }</script>    