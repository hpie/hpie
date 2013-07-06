<?	ob_start();
session_start();
include ('../include.php');
require_once("../config.php");
include('../constants.php');

if($_COOKIE['sessIsSuperAdmin'] =='1')
{
	if(isset($_REQUEST['id']) && $_REQUEST['id'] != "" && isset($_REQUEST['action']) && $_REQUEST['action'] != ""){
		$id = $_REQUEST['id'];
		$stage	= $_REQUEST['action'];
		switch($stage){
			case 'users':
				$tableName	  = TBL_USERS;
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['userDeleted'] = "User Record Deleted Successfully";
				header("Location: users.php");
				break;
					
			case 'contractor':
				$tableName	  = 'contractor_detail';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['userDeleted'] = "Contractor Record Deleted Successfully";
				header("Location: contractors.php");
				break;

			case 'division':
				$tableName	  = 'm_division';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Division Deleted Successfully";
				header("Location: division.php");
				break;
				 
			case 'departments':
				$tableName	  = 'm_forest_department';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Forest Department Deleted Successfully";
				header("Location: departments.php");
				break;

			case 'forests':
				$tableName	  = 'm_forest';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Forest Deleted Successfully";
				header("Location: forests.php");
				break;

			case 'trees':
				$tableName	  = 'm_trees';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Tree Deleted Successfully";
				header("Location: trees.php");
				break;

			case 'tree_price':
				$tableName	  = 'm_price';
				$arrCondition = array('i_forest_id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Tree Price Deleted Successfully";
				header("Location: trees_price.php");
				break;
					
			case 'timber_price':
				$tableName	  = 'm_timber_price';
				$arrCondition = array('i_forest_id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Timber Price Deleted Successfully";
				header("Location: timber_price.php");
				break;

			case 'timbers':
				$tableName	  = 'm_timber';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Timber Deleted Successfully";
				header("Location: timbers.php");
				break;

			case 'timbers_type':
				$tableName	  = 'm_timber_type';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Timber Type Deleted Successfully";
				header("Location: timbers_type.php");
				break;

			case 'units':
				$tableName	  = 'm_units';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Unit Deleted Successfully";
				header("Location: units.php");
				break;

			case 'volume_table':
				$tableName	  = 'm_forest_volume';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Volume Table Deleted Successfully";
				header("Location: volume_tables.php");
				break;

			case 'categories':
				$tableName	  = 'm_category';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Category Deleted Successfully";
				header("Location: categories.php");
				break;
					
			case 'cat_volume':
				$tableName	  = 'm_volume_table';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Category Volume Deleted Successfully";
				header("Location: categories_volume.php");
				break;

			case 'overhead_entity':
				$tableName	  = 'm_overhead_entities';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Overhead Entity Deleted Successfully";
				header("Location: overhead_entities.php");
				break;
					
			case 'treetype':
				$tableName	  = 'm_treetype';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Tree Type Deleted Successfully";
				header("Location: tree_types.php");
				break;

			case 'category_timber':
				$tableName	  = 'c_category_timber';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Category Timber Deleted Successfully";
				header("Location: category_timbers.php");
				break;

			case 'c_filling':
				$tableName	  = 'c_conversion_felling';
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['recordDeleted'] = "Conversion Filling Deleted Successfully";
				header("Location: conversion_fillings.php");
				break;
				 

			case 'page':

				$tableName	  = TBL_PAGES;
				$arrCondition = array('id'=>$id);
				$db->delete($tableName,$arrCondition);
				$_SESSION['PageDeleted'] = "Page Deleted Successfully";
				header("Location: pages.php");
				break;
					
		}
	}
	
}
else
{
	echo "User don't  have permission to  delete the record";
	return;
}
?>