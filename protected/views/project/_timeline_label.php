					<div class="label bg-black"><?php echo Yii::app()->db->createCommand("SELECT COUNT(status) FROM projectdetail where id_project=$model->id_project AND status=0")->queryScalar();?> Step</div>

					<?php
					$sql = 'SELECT * FROM projectdetail WHERE status!=1 AND id_project = ' . $model->id_project .'';
					$rows = Yii::app()->db->createCommand($sql)->queryAll();
					$idx = 1;

					if(!empty($rows))
						foreach ($rows as $row)
						{
							echo '<span class="label label-danger" data-original-title="'.($row['member']) .'" data-toggle="tooltip">'.($row['job']) .'</span> ';
							$idx++;
						}
						?><BR><BR>