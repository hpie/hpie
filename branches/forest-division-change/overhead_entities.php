<?
$markId         =       $_GET['markId'];
$arrRecords     =		array();
$table			=		'm_overhead_entities';

$arFieldValues=array();

if(isset($_POST['submit'])=="Update"){

	$arrCondition = array('i_mark_id'=>$markId);
	$db->delete('c_overhead_detail',$arrCondition);
	extract($_POST);

	foreach($_POST as $k=>$v){

		if($k != 'submit'){

			foreach($_POST[$k] as $key=>$value){

				$arFieldValues[$key] = $value;
				$arFieldValues['i_mark_id']= $markId;
			}
			$id = $db->insert('c_overhead_detail',$arFieldValues);
				
		}
		$arCondition = array('id'=>$markId);
		$arFieldValuesNew =array('i_overhead_status'=>'1');
		$id = $db->update('c_mark_detail',$arFieldValuesNew,$arCondition);

		//die();
		ob_end_clean();
		header("Location:".BASE_URL."index.php?page=markCompleteDetail&markId=".$markId);
	}
}
$arrRecords     =       $common->getOverheadEntity($markId);

$arrTreeType    =       $common->getAllOption("m_treetype");

if(!empty($arrRecords)){
include("html/overhead_entities.php");
}else{
  echo "There is no entity across this Forest Department.";
}
?>