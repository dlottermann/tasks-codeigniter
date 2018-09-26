
	<div class="container">
		<div class="header clearfix">

		<h3 class="text-muted">TASK-LIST</h3>
        
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
					<tr th:each="task : ${tasks}">
						<td>
							<span th:text="${task.title}"></span>
						</td>
						<td>
							<span th:text="${task.description}"></span>
						</td>
						<td>
							<span th:text="${#dates.format(task.created, 'dd/MM/yyyy')}"></span>
						</td>
						<td>
							<span th:text="${task.category.description}"></span>
						</td>
						<td th:switch="${task.status}">
							<a href="javascript:;" th:id="${task.id}" th:attr="data-status=${task.status}" class="btn btn-primary ative" th:case="'1'">Desativar</a>
							<a href="javascript:;" th:id="${task.id}" th:attr="data-status=${task.status}" class="btn btn-success ative" th:case="'0'">Ativar</a>
						
							<a href="javascript:;" th:id="${task.id}" class="btn btn-warning update">Editar</a>
							
						
							<a href="javascript:;" th:id="${task.id}" class="btn btn-danger delete">Excluir</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>


	</div>


	<div id="customerModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="task/save" name="frmCadastro">
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

						<select id="categoria_id" name="categoria_id" class="form-control">
							<option th:each="cat : ${categories}" th:value="${cat.id}" th:text="${cat.description}"></option>
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

<script type="text/javascript" src="/webjars/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/webjars/bootstrap/3.3.7-1/js/bootstrap.min.js"></script>
	
<script type="text/javascript" src="jquery.mask.min.js"></script>
</body>

</html>