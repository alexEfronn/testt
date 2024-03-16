<?php $__env->startSection('content'); ?>
<div class="section">
	<div class="sendmoney_block">
		<div class="sendmoney">
			<div class="cont-b">
				<div class="ref">
					<div class="info">
						<h3 class="title">Перевод средств</h3>
					</div>
					<div class="code">
						<div class="code-title">ID игрока:</div>
						<div class="value">
							<input type="text" placeholder="123456789" class="targetID value-send" style="color: #fff;">
						</div>
					</div>
					<div class="code">
						<div class="code-title">Cумму перевода:</div>
						<div class="value">
							<input type="text" placeholder="Желаемая сумма" class="sum value-send" id="sumToSend">
						</div>
					</div>
					<div class="info">
						<h3 class="title">Будет списанно: <span id="minusSum">0</span> <i class="fas fa-coins"></i></h3>
						<h3 class="title" style="font-size: 12px; color: #949494;">(комиссия 5%)</h3>
					</div>
					<div class="info">
						<div class="desc">
							Минимальная сумма перевода 1 рубль<br>
						</div>
					</div>
					<a class="btn sendButton" style="margin-top: 10px;margin-bottom: 20px;">ПЕРЕВЕСТИ</a>
					<div class="code">
						<div class="code-title">Ваш ID для переводов:</div>
						<div class="value">
							<input type="text" value="<?php echo e($u->user_id); ?>" id="userID" readonly="" class="value-send">
							<i class="fas fa-copy tooltip tooltipstered" onclick="copyToClipboard('#userID')"></i>
						</div>
					</div>
					<div class="desc">Он позволит вам получать деньги от других пользователей!</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
.sendmoney_block {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 6px;
    height: 100%;
    width: 100%;
}

.value-send {
	height: 44px;
    font-size: 14px;
    padding: 0 12px;
    width: 240px;
    outline: none!important;
    border-radius: 6px;
    color: #fff;
    background: #9bb1bb;
    border: 1px solid transparent;
    font-family: Open Sans,sans-serif;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/html/resources/views/pages/paySend.blade.php */ ?>