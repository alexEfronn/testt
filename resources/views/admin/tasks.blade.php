@extends('admin')

@section('content')
<script src="/js/ajax-tasks.js?v=<?php echo time() ?>" type="text/javascript"></script>
<div class="kt-subheader kt-grid__item" id="kt_subheader">
	<div class="kt-subheader__main">
		<h3 class="kt-subheader__title">Задания</h3>
	</div>
</div>

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon-users"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Список заданий
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						<a data-toggle="modal" href="#new" class="btn btn-success btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Добавить задание
						</a>
					</div>	
				</div>
			</div>
		</div>
		
		<div class="kt-portlet__body">

			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable" id="ajax-users">
				<thead>
					<tr>
						<th>ID</th>
						<th>Название</th>
						<th>Участников</th>
						<th>Банк</th>
						<th>Дедлайн</th>
						<th>Статус</th>
						
					</tr>
				</thead>
			</table>

			<!--end: Datatable -->
		</div>
	</div>
</div>

<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="newLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Новое задание</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="kt-form-new" method="post" action="/admin/tasks/add">
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Тип задания:</label>
						<select class="form-control" name="challengeId">
							<option value="1">Jackpot</option>
							<option value="2">Wheel</option>
							<option value="3">Battle</option>
							<option value="4">PvP</option>
							<!-- <option value="5">Битва рефералов</option> --> -->
						</select>
					</div>
					<div class="form-group">
						<label for="name">Банк:</label>
						<input type="text" class="form-control" required placeholder="Сумма" name="bank">
					</div>
					<div class="form-group">
						<label for="name">Количество победителей:</label>
						<select class="form-control" name="countWinners">
							<option value="1">3 победителя</option>
							<option value="2">10 победителей</option>
							<option value="3">20 победителей</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">Сумма взноса:</label>
						<input type="text" class="form-control" required placeholder="100" name="deposit">
					</div>
					<div class="form-group">
						<label for="name">Дедлайн:</label>
						<input type="text" class="form-control" required placeholder="Кол-во дней (1-60)" name="deadline">
					</div>
					<div class="form-group">
						<label for="name">Время итогов:</label>
						<input type="text" pattern="[0-9]{2}:[0-9]{2}" class="form-control" required placeholder="12:00" name="endTime">
					</div>
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
					<button type="submit" class="btn btn-primary">Добавить</button>
				</div>
            </form>
        </div>
    </div>
</div>


@endsection