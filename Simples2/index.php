<?php
include_once("./connect.php");

$stmt = $pdo->prepare("SELECT COUNT(*) FROM perfis");
$stmt->execute();
$rows = $stmt->fetch();

// get total no. of pages
$total_pages = ceil($rows[0]/$row_limit);

$sql = "select * from perfis";
$sth = $pdo->query($sql);
$nr = $sth->rowCount();

require_once('./header.php');
?>
<div class="text-center"><h4><b>Encontrado(s)</b>: <?=$nr?></h4></div>
        <div class="row">
            <!-- Adicionar registro -->
            <div class="text-left col-md-5 top">
                <a href="./add.php" class="btn btn-primary pull-left">
                    <span class="glyphicon glyphicon-plus"></span> Adicionar
                </a>
            </div>

            <!-- Relatório-->
            <div class="col-md-3">
                <a href="./relatorio.php" class="btn btn-primary pull-left">
                    <span class="glyphicon glyphicon-plus"></span> Relatório
                </a>
            </div>

            <!-- Form de busca-->
            <div class="col-md-4">
                <form action="./search.php" method="get" >
                  <div class="pull-right top">
                  <span class="pull-right">  
                    <label class="control-label" for="palavra" style="padding-right: 5px;">
                      <input type="text" value="" placeholder="Nome ou parte" class="form-control" name="keyword">
                    </label>
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Busca</button>&nbsp;
                  </span>                 
                  </div>
                </form>
            </div>
	    </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody id="pg-results">
            </tbody>
        </table>
        <div class="panel-footer text-center">
            <div class="pagination"></div>
        </div>
    </div>
</div>
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script src="https://cdn.tutorialjinni.com/bootpag/1.0.7/jquery.bootpag.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#pg-results").load("./fetch_data.php");
    $(".pagination").bootpag({
        total: <?=$total_pages?>,
        page: 1,
        maxVisible: 18,
        leaps: true,
        firstLastUse: true,
        first: 'Primeira',//←
        last: 'Última',//→
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    }).on("page", function(e, page_num){
        //e.preventDefault();
        $("#results").prepend('<div class="loading-indication"> Loading...</div>');
        $("#pg-results").load("./fetch_data.php", {"page": page_num});
    });
});
</script>

<?php require_once './footer.php'; ?>
