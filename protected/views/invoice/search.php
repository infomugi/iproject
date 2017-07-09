<h1>Buat Laporan</h1>

<?PHP

$user=Yii::app()->db->createCommand()
->select("*")
->from("invoice")
// ->andWhere("usertype=:id",array(':id'=>1))
// ->andWhere("isactive=:status",array(':status'=>1))
->queryAll();
print_r($user);

?>