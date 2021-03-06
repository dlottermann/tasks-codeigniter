$(document).ready(function() {

    //Adicionar registro
    $('#modal_button').click(function() {
        $('#customerModal').modal('show'); //Abrir Modal
        $('#description').val(''); //Limpar os campos
        $('.modal-title').text("Adicionar Categoria"); //Trocamos o label
        $('#action').val('Salvar'); //Trocamos o texto do botão
    });

    //Atualizar
    $('.update').on('click', function() {
        var id = $(this).attr("id");
        var action = "getCategoria";
        $.ajax({
            url: "category/getCategoria/"+id,
            method: "GET",
            dataType: "json",
            success: function(data) {
                $('#customerModal').modal('show'); //Abrir Modal
                $('.modal-title').text("Atualizar Categoria"); //Trocamos o label
                $('#action').val('Atualizar'); //Trocamos o texto do botão
                $('form[name="frmCadastro"]').attr("action", "category/setCategoria");
                $('#id').val(id);
                $('#description').val(data[0].description);
            }
        });
    });

    //desativar
    $('.delete').on('click', function(e) {
        var id = $(this).attr("id");
        var status = $(this).data("status");
	   
		if(status===0){
			$('#delete').text("Ativar");
			$('#delete').removeClass('btn-warning');
			$('#delete').addClass('btn-success');
		}

        e.preventDefault();
        //Confirmação
        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        }).one('click', '#delete', function(e) {
            $.ajax({
                url: "category/inativaCategoria/"+id,
                method: "GET",
                success: function(data) {
                    window.location.reload();
                }
            });

        });


    });

});



$(document).ready(function() {
    $('.date').mask('00/00/0000');
});


$(document).ready(
    function() {

        //Adicionar registro
        $('#modal_button_task').click(function() {
            $('#customerModal').modal('show'); //Abrir Modal
            $('#description').val(''); //Limpar os campos
            $('.modal-title').text("Adicionar Tarefa"); //Trocamos o label
            $('#action').val('Salvar'); //Trocamos o texto do botão
        });

        //Atualizar
        $('.updateTask').on(
            'click',
            function() {
                var id = $(this).attr("id");
              
                $.ajax({
                    url: "tasks/getTask/"+id,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#customerModal').modal('show'); //Abrir Modal
                        $('.modal-title').text("Modificar Tarefa"); //Trocamos o label
                        $('#action').val('Atualizar'); //Trocamos o texto do botão
                        $('form[name="frmCadastro"]').attr("action", "tasks/setTask");
                        $('#id').val(id);
                        $('#title').val(data[0].title);
						$('#description').val(data[0].description);

                        dt = data[0].created.split("-");
                        $('#created').val(dt[2] + "/" + dt[1] + "/" + dt[0]);
                       
                    }
                });
            });

        //Excluir
        $('.deleteTask').on('click',
            function(e) {
                var id = $(this).attr("id");
                e.preventDefault();

                //Confirmação
                $('#confirm').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                    .one('click', '#delete', function(e) {
                        $.ajax({
                            url: "tasks/deleteTask/"+id,
                            method: "GET",
                            async: false,
                            success: function(data) {
                                window.location.href = "tasks";
                            }
                        });

                    });

            });


        //Atualizar
        $('.ative').on('click',
            function(e) {
                var id = $(this).attr("id");
                var status = $(this).data("status");
		
				if(status == 0){
					$('#deleteTask').text("Ativar");
					$('#deleteTask').removeClass('btn-warning');
					$('#deleteTask').addClass('btn-success');
				}

                e.preventDefault();
                //Confirmação
                $('#confirm_dois').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                    .one('click', '#delete', function(e) {
                        $.ajax({
                            url: "tasks/inativaTask/"+id,
                            method: "GET",
                            async: false,
                            success: function(data) {
                                window.location.href = "tasks";
                            }
                        });

                    });

            });
	});
	