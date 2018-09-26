<div class="container padding-20">
	<h2>Categorias</h2>
	<div align="right">

		<button type="button" class="btn btn-link" onclick="window.location.href='/'"><i class="fa fa-tasks"></i> Tarefas</button>
		<button type="button" id="modal_button" class="btn btn-info">Adicionar</button>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Cód.</th>
				<th>Descrição</th>
				<th>Status</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($categorias  as $cat){ ?>
			<tr>
				<td>
					<span>
						<?php echo $cat->id;?></span>
				</td>
				<td>
					<span>
						<?php echo $cat->description;?></span>
				</td>
				<?php if($cat->status == 0){ ?>
				<td>
					<b>INATIVO</b>
				</td>
				<?php } else { ?>
				<td>
					<b>ATIVO</b> </td>
				<?php } ?>

				<td>
					<a href="javascript:;" id="<?php echo $cat->id;?>" class="btn btn-warning update">Editar</a>

					<?php if($cat->status == 1){ ?>
					<a href="javascript:;" id="<?php echo $cat->id;?>" data-status="<?php echo $cat->status;?>" class="btn btn-danger delete">Desativar</a>
					<?php } else {?>
					<a href="javascript:;" id="<?php echo $cat->id;?>" data-status="<?php echo $cat->status;?>" class="btn btn-success delete">Ativar</a>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


</div>


<div id="customerModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="<?php echo site_url('category/setCategoria'); ?>" name="frmCadastro">
				<div class="modal-header">
					<h4 class="modal-title">Adicionar Categoria</h4>
				</div>
				<div class="modal-body">
					<label>Descrição</label>
					<input type="text" name="description" id="description" class="form-control" required />
					<br />

				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="submit" name="action" id="action" class="btn btn-success" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="confirm" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">Confirmação</div>
			<div class="modal-body">Deseja mudar status deste registro?</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-warning" id="delete">Desativar</button>
				<button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
			</div>

		</div>
	</div>

</div>



</body>

</html>