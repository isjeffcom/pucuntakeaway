 <?php


 /**
  * Create by WU JIANFENG
  * 2016/5/26
  * Pucun-FleaMarket WebApp
  * Item_type Age Identify function
  */
  if(isset($item_age)){

    switch($item_age){

      case 'iAge-bnew';
      $iage = '00';
      break;

      case 'iAge-99';
      $iage = '99';
      break;

      case 'iAge-90';
      $iage = '90';
      break;

      case 'iAge-80';
      $iage = '80';
      break;

      case 'iAge-70';
      $iage = '70';
      break;

      case 'iAge-50';
      $iage = '50';
      break;

      case 'iAge-10';
      $iage = '10';
      break;

    }

  }

  if(isset($iage)){

    switch($iage){

      case '00';
      $iagename = '全新';
      break;

      case '99';
      $iagename = '99成新';
      break;

      case '9';
      $iagename = '9成新';
      break;

      case '80';
      $iagename = '8成新';
      break;

      case '70';
      $iagename = '7成新';
      break;

      case '50';
      $iagename = '5成新';
      break;

      case '10';
      $iagename = '伊拉克';
      break;

    }

  }

?>
