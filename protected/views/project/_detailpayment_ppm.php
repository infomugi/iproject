<div id="col-xs-12">
		<div class="row text-right text-muted well well-sm no-shadow">
			<div class="col-md-10 col-lg-6">
				<p>
					<strong>
						Sub Total : <br>
						Amount: <br>
						Credit : <br>
						Disc  : <br>
						<!-- Payee : <br> -->
					</strong>
				</p>
			</div>
			<div class="col-md-2 col-lg-6" >
				<strong>
				
					<div class="text-green">
						<?php 
						$subTotal = Yii::app()->numberFormatter->format("Rp ###,###,###",((Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount / $model->month))); 
						echo $subTotal;
						?> 
					</div>

					<div class="text-green">
						<?php 
						$amount = Yii::app()->numberFormatter->format("Rp ###,###,###",$model->amount); 
						echo $amount;
						?> 
					</div>

					<div class="text-green">
						<?php 
						$totalCredit = Yii::app()->numberFormatter->format("Rp ###,###,###",($model->amount - Yii::app()->db->createCommand("SELECT COUNT(id_project) FROM invoice where id_project=$model->id_project")->queryScalar() * $model->amount / $model->month)); 
						echo $totalCredit;
						?>
					</div>

					<div class="text-green">
						<?php 
						$totaldiscount = Yii::app()->numberFormatter->format("Rp ###,###,###",($model->amount / $model->month / 100 * Yii::app()->db->createCommand("SELECT SUM(discount) FROM invoice where id_project=$model->id_project")->queryScalar())); 
						echo $totaldiscount;
						?> (
							<?php 
							$discountitem = Yii::app()->db->createCommand("SELECT SUM(discount) FROM invoice where id_project=$model->id_project")->queryScalar(); 
							echo $discountitem;
							?> %)
						</div>


						<!-- 						
						<div class="text-green">
							<?php 
							$totalPayee = $subTotal - $totaldiscount; 
							echo Yii::app()->numberFormatter->format("Rp ###,###,###",$totalPayee);
							?>
						</div> 
					-->

				</strong>	
			</div>
	</div>