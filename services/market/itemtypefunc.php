 <?php


 /**
  * Create by WU JIANFENG
  * 2016/5/26
  * Pucun-FleaMarket WebApp
  * item_type identify function
  */

  if(isset($item_type)){
    switch($item_type){

      case 'iType-sale';
      $itype = '1';
      break;

      case 'iType-exchange';
      $itype = '2';
      break;

      case 'iType-exchange';
      $itype = '3';
      break;

      case 'iType-house';
      $itype = '4';
      break;

      case 'iType-house';
      $itype = '5';
      break;

    }
  }

  if(isset($itype)){
    switch($itype){

      case '1';
      $itypename = '物品出售';
      break;

      case '2';
      $itypename = '物品交换';
      break;

      case '3';
      $itypename = '物品出租';
      break;

      case '4';
      $itypename = '房屋出租';
      break;

      case '5';
      $itypename = '寻找宿友';
      break;

    }
  }

?>
