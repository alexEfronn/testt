"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#ajax-users');
		let tasksTypeInfo = {
			"1": "Jackpot",
			"2": "Wheel",
			"3": "Battle",
			"4": "PvP"
		};
		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: "/admin/tasksAjax",
				type: "POST"
			},
			columns: [
				{ data: "id", searchable: true },
				{
					searchable: true,
					render: (data, type, row) => {
						return "Челлендж " + tasksTypeInfo[row.challengeId]
					}
				},
				{
					data: "count",
					searchable: true
				},
				{ data: "bank", searchable: true },
				{ data: "ended_at", searchable: true },
				{
					data: "status",
					searchable: true,
					render: function (data, type, row) {
						if(row.status == 1) {
							return "Завершен"
						}
						if(row.status == 0) {
							return "Активен"
						}
					}
				},
			],
			"language": {
				  "processing": "Подождите...",
				  "search": "Поиск:",
				  "lengthMenu": "Показать _MENU_ записей",
				  "info": "Записи с _START_ по _END_ из _TOTAL_ записей",
				  "infoEmpty": "Записи с 0 до 0 из 0 записей",
				  "infoFiltered": "(отфильтровано из _MAX_ записей)",
				  "infoPostFix": "",
				  "loadingRecords": "Загрузка записей...",
				  "zeroRecords": "Записи отсутствуют.",
				  "emptyTable": "В таблице отсутствуют данные",
				  "paginate": {
					"first": "Первая",
					"previous": "Предыдущая",
					"next": "Следующая",
					"last": "Последняя"
				  },
				  "aria": {
					"sortAscending": ": активировать для сортировки столбца по возрастанию",
					"sortDescending": ": активировать для сортировки столбца по убыванию"
				  }
			}
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

window.onload = () => {
	KTDatatablesDataSourceAjaxServer.init();
}
