
	<div class="container padding-20">
		<div class="header clearfix">


		</div>
		
		

		<div class="container">
			<h2>Tarefas</h2>
			<div align="right">
				
			<button type="button" class="btn btn-link" onclick="window.location.href='/category'" ><i class="fa fa-paperclip "></i> Categorias</button>
			<button type="button" id="modal_button" class="btn btn-info">Adicionar</button>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Descrição</th>
						<th>Data</th>
						<th>Categoria</th>
						<th colspan="3"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($tasks  as $task){ ?>
					<tr>
						<td>
							<span><?php echo $task->title;?></span>
						</td>
						<td>
							<span><?php echo $task->description;?></span>
						</td>
						<td>
							<span><?php echo bancoData($task->created);?></span>
						</td>
						<td>
							<span><?php echo $task->cat_description;?></span>
						</td>
						<td>
							<?php if($task->status == 1){?>
								<a href="javascript:;" id="<?php echo $task->id;?>" data-status="<?php echo $task->status;?>" class="btn btn-primary ative" >Desativar</a>
							<?php }else{ ?>
								<a href="javascript:;" id="<?php echo $task->id;?>" data-status="<?php echo $task->status;?>" class="btn btn-success ative" >Ativar</a>
							<?php } ?>
							<a href="javascript:;" id="<?php echo $task->id;?>" class="btn btn-warning updateTask">Editar</a>							
						
							<a href="javascript:;" id="<?php echo $task->id;?>" class="btn btn-danger deleteTask">Excluir</a>
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
				<form method="POST" action="<?php echo site_url('tasks/setTask'); ?> " name="frmCadastro">
					<div class="modal-header">
						<h4 class="modal-title">Adicionar Tarefa</h4>
					</div>
					<div class="modal-body">
						<label>Titulo</label>
						<input type="text" name="title" id="title" class="form-control" required />
						<br />

						<label>Data</label>
						<input type="text" name="created" id="created" class="form-control date" required />
						<br />

						<label>Descrição</label>
						<textarea name="description" id="description" class="form-control"> </textarea>
						<br />

						<label>Categoria</label>

						<select id="categoria_id" name="category_id" class="form-control" required>
							<option value="">Selecione...</option>
						<?php foreach($categorias  as $cat){ ?>
							<option value="<?php echo $cat->id;?>" ><?php echo $cat->description;?></option>
						<?php } ?>
						</select>
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
				<div class="modal-body">Deseja remover este registro?</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Excluir</button>
					<button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
				</div>

			</div>
		</div>

	</div>
	
	<div id="confirm_dois" class="modal fade">
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
