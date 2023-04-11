<?php
$idContato = $_GET["idContato"];
$sql = "SELECT * FROM dbContatos WHERE idContato= {$idContato}";
$rs = mysqli_query($conexao,$sql) or die ("Erro ao recuperar os dados do registro. " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>
<header>
    <h3><i class="bi bi-pencil-square"></i></i> Editar Contato</h3>
</header>
<div class="row">
<div class="col-6">
    <form class="needs-validation" action="index.php?menuop=atualizar-contato" method="post" novalidate>
        <div class="mb-3">
            <label for="nomeContato" class="form-label">ID</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                <input type="text" class="form-control"  name="idContato" value="<?=$dados["idContato"]?>" readonly>
            </div>
        </div>

        <div class="mb-3">
            <label for="nomeContato"  class="form-label">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" name="nomeContato" value="<?=$dados["nomeContato"]?>" required>
                <div class="valid-feedback">
                Tudo OK
            </div>
            <div class="invalid-feedback">
                Necessário preencher o campo
            </div>
        </div>
</div>

        <div class="mb-3">
            <label for="emailContato"   class="form-label">E-mail</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                <input type="email" class="form-control" name="emailContato" value="<?=$dados["emailContato"]?>" required>
                <div class="valid-feedback">
                Tudo OK
            </div>
            <div class="invalid-feedback">
                Necessário preencher o campo
            </div>
        </div> 
 </div>
        
        <div class="mb-3">
            <label for="telefoneContato">Telefone</label>
            <div class="input-group">
                <span class="input-group-text"> <i class="bi bi-telephone-fill"></i></span>
                <input type="text" class="form-control" name="telefoneContato" value="<?=$dados["telefoneContato"]?>" required>
                <div class="valid-feedback">
                Tudo OK
            </div>
            <div class="invalid-feedback">
                Necessário preencher o campo
            </div>
        </div>
        </div>

        <div class="mb-3">
            <label for="enderecoContato">Endereço</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></i></span>
                <input type="text" class="form-control" name="enderecoContato" value="<?=$dados["enderecoContato"]?>" required>
                <div class="valid-feedback">
                Tudo OK
            </div>
            <div class="invalid-feedback">
                Necessário preencher o campo
            </div>
        </div>
        </div>

    <div class="row">
        <div class="mb-3 col-6 ">
            <label for="sexoContato" class="form-label" >Sexo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-gender-trans"></i></span>
                            <select name="sexoContato" class="form-control" id="sexoContato" required>
                                <option value="" <?php echo ($dados['sexoContato']=='')?'selected':'' ?> value="">Selecione o genero do contato</option>
                                <option <?php echo ($dados['sexoContato']=='M')?'selected':'' ?> value="M">Masculino</option>
                                <option <?php echo ($dados['sexoContato']=='F')?'selected':'' ?> value="F">Feminino</option>
                                <option <?php echo ($dados['sexoContato']=='O')?'selected':'' ?> value="O">Outros</option>
                            </select>
                            <div class="valid-feedback">
                               Tudo OK
                            </div>
                            <div class="invalid-feedback">
                               Necessário preencher o campo
                            </div>
        
                </div>
        </div>
        <div class="mb-3 col-6">
            <label for="dataNascContato" class="form-label">Data de Nascimento</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                <input type="date" class="form-control" name="dataNascContato" value="<?=$dados["dataNascContato"]?>" readonly>
            </div>
        </div> 
    </div>   

        <div class="mb-3">
            <input class="btn btn-outline-warning" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div> 
<div class="col-6">
    <?php
      if($dados["nomeFotoContato"]=="" or !file_exists('./paginas/contatos/fotos-contatos/'. $dados["nomeFotoContato"])){
        $nomeFoto = "semfoto.jpg";
      }else{
          $nomeFoto = $dados["nomeFotoContato"];
      }

    ?>
        <div class="mb-3">
            <img id="foto-contato" class="img-fluid img-thumbnail" width="500" src="./paginas/contatos/fotos-contatos/<?=$nomeFoto?>" alt="fotocontato">
        </div>

        <div class="mb-3">
            <button class="btn btn-info" id="btn-editar-foto">
                <i class="bi bi-camera-fill"></i> Editar Foto
            </button>
        </div>

        <div id="editar-foto">
            <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idContato" value="<?=$idContato?>">
                <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>
            
                <div class="input-group">
                    <input class="form-control" type="file" name="arquivo" id="arquivo">
                    <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                </div>
            </form>
            <div id="mensagem" class="mb-3 alert alert-success">
            
            </div>

            <div id="preloader" class="progress">
                <div id="barra"
                    class="progress-bar bg-danger" 
                    role="progressbar" 
                    class="progress-bar bg-danger" 
                    style="width: 0%"
                    aria-valuenow="0" 
                    aria-valuemin="0" 
                    aria-valuemax="100">0%</div>
                </div>
            </div>
        
    </div>
</div>