<style>
	
	.actives-users-panel{
		padding-left: 0px !important;
		padding-right: 0px !important;
		margin: 2.5px;
	}
	
	.panels-body{
		padding: 15px;
	}
	
	.openModalTxt{
		cursor: pointer;
	}

</style>

<br/>
<div>
    <h1 class="page-header letterSize"><span>Dashboard</span></h1>
</div>

<div class="row">

    <div class="col-md-6 squareBox">
        <div class="col-md-12 squareTitle">
            TOTAL
        </div>
        <div class="col-md-3">
            <div class="row heightSquare rightSquare darkBlue">
                <span class="verticalAlign box-dash"><br/>Salões<br/>Ativos</span>
            </div>
            <div class="row heightFirstSpace">
            </div>
            <div class="row heightSquare rightSquare darkBlue delivery">
                <?php echo $qtdSaloes[0][0]['total'];?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="row heightSquare rightSquare darkBlue">
                <span class="verticalAlign box-dash" style="vertical-align:middle"><br/>Usuários Ativos</br>no dia</span>
            </div>
            <div class="row heightFirstSpace">
            </div>
            <div class="row heightSquare rightSquare darkBlue delivery openModalTxt" data-toggle="modal" data-target="#myModal">
                 <?php echo $activeusers[0][0]['count(*)']; ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="row heightSquare rightSquare darkBlue">
                <span class="verticalAlign box-dash"><br/>Vendas</br>no dia</span>
            </div>
            <div class="row heightFirstSpace">
            </div>
            <div class="row heightSquare rightSquare darkBlue delivery currency">
                R$<?php echo str_replace(".", ",", $vendasDoDia[0][0]['total']); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row heightSquare rightSquare darkBlue">
                <span class="verticalAlign box-dash"><br/>Indicações</br>de salões</span>
            </div>
            <div class="row heightFirstSpace">
            </div>
            <div class="row heightSquare rightSquare darkBlue delivery">
                <?php echo $indicationscount[0][0]['count(*)']; ?>
            </div>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">USUÁRIOS ATIVOS NO DIA</h5>
      </div>
      <div class="modal-body row panels-body">
		
		<?php if(!empty($arrayUsersActives)){
		foreach($arrayUsersActives as $active){?>
					<div class="panel panel-default col-md-3 text-center actives-users-panel">
						<div class="panel-body">
								<div>
									<img src="<?php echo $active['users']['photo'];?>" class="img-circle" width="50%"/>
								</div>
								<small><strong><?php echo $active['users']['name'];?></small></strong><br/>
								<small><?php $date= date_create($active['users']['last_update']); echo date_format($date,"d/m/Y H:i"); ?></small>
						</div>
					</div>
		<?php } }?>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
