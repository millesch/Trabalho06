<?php
require_once "banco.php";
require_once "getClientes.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>XYZ Transportadora</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="main.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>

<body>
    <div class="container-xlg">
        <div class="table-responsive mt-0">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Controle de <b>Clientes</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                                <span>Adicionar Cliente</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($row_no = $clientes->num_rows - 1; $row_no >= 0; $row_no--) {
                            $clientes->data_seek($row_no);
                            $linha = $clientes->fetch_assoc(); ?>
                            <tr>
                                <td><?= $linha["nome"] ?></td>
                                <td><?= $linha["e_mail"] ?></td>
                                <td><?= $linha["logradouro"] ?>, <?= $linha["numero"] ?>, <?= $linha["bairro"] ?>. <?= $linha["cidade"] ?> / <?= $linha["estado"] ?></td>
                                <td><?= $linha["telefone"] ?></td>
                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="<?= $linha["id"] ?>" data-nome="<?= $linha["nome"] ?>" data-e_mail="<?= $linha["e_mail"] ?>" data-logradouro="<?= $linha["logradouro"] ?>" data-numero="<?= $linha["numero"] ?>" data-bairro="<?= $linha["bairro"] ?>" data-cidade="<?= $linha["cidade"] ?>" data-estado="<?= $linha["estado"] ?>" data-telefone="<?= $linha["telefone"] ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="<?= $linha["id"] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="insertClientes.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input name="email" type="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Logradouro</label>
                            <input name="logradouro" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input name="numero" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Bairro</label>
                            <input name="bairro" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input name="cidade" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input name="estado" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input name="telefone" type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-success" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="updateClientes.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editID">
                        <div class="form-group">
                            <label>Nome</label>
                            <input id="edit-nome" name="nome" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input id="edit-e_mail" name="email" type="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Logradouro</label>
                            <input id="edit-logradouro" name="logradouro" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input id="edit-numero" name="numero" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Bairro</label>
                            <input id="edit-bairro" name="bairro" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input id="edit-cidade" name="cidade" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input id="edit-estado" name="estado" type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input id="edit-telefone" name="telefone" type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-info" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="deleteCliente.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Deletar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="deleteID">
                        <p>
                            Você tem certeza?
                        </p>
                        <p class="text-warning">
                            <small>Esta ação não pode ser disfeita!</small>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>