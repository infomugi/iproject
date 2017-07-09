<div id="col-xs-12">
		<div class="row text-right text-muted well well-sm no-shadow">
			<div class="col-xs-2 col-xs-offset-8">
				<p>
					<strong>
						Amount: <br>
						Sub Total : <br>
						Payee : <br>
						Disc  : <br>
						Grand Total : <br>
					</strong>
				</p>
			</div>
			<div class="col-xs-2" >
				<strong>
					<div class="text-green"><?php echo Project::model()->rupiah($model->amount); ?> </div>
					<div class="text-green"><?php echo Project::model()->rupiah(Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount * $model->Term->percent / 100); ?> </div>
					<div class="text-green"><?php echo Project::model()->rupiah(Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount * $model->Term->percent / 100) - ((Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount * $model->Term->percent / 100) / 100 * Yii::app()->db->createCommand("SELECT SUM(discount) FROM invoice where id_project=$model->id_project")->queryScalar()) )); ?> </div>
						<div class="text-green"><?php echo Yii::app()->db->createCommand("SELECT SUM(discount) FROM invoice where id_project=$model->id_project")->queryScalar(); ?> %</div>
						<div class="text-green"><?php echo Project::model()->rupiah($model->amount - Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount * $model->Term->percent / 100); ?></div></strong>
					</div>
				</div>
		</div>