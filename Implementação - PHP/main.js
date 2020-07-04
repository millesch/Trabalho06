$(document).ready(function () {
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function () {
		if (this.checked) {
			checkbox.each(function () {
				this.checked = true;
			});
		} else {
			checkbox.each(function () {
				this.checked = false;
			});
		}
	});
	checkbox.click(function () {
		if (!this.checked) {
			$("#selectAll").prop("checked", false);
		}
	});
});

$(document).on("click", ".edit", function () {
	var myBookId = $(this).data('id');
	$(".modal-body #editID").val(myBookId);

	$(".modal-body #edit-nome").val($(this).data('nome'));
	$(".modal-body #edit-e_mail").val($(this).data("e_mail"));
	$(".modal-body #edit-logradouro").val($(this).data("logradouro"));
	$(".modal-body #edit-numero").val($(this).data("numero"));
	$(".modal-body #edit-bairro").val($(this).data("bairro"));
	$(".modal-body #edit-cidade").val($(this).data("cidade"));
	$(".modal-body #edit-estado").val($(this).data("estado"));
	$(".modal-body #edit-telefone").val($(this).data("telefone"));
});

$(document).on("click", ".delete", function () {
	var myBookId = $(this).data('id');
	$(".modal-body #deleteID").val(myBookId);
});