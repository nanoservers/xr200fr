<?php

class tv_list extends XoopsObject {

	public function tv_list() {
		$this->initVar ( 'list_id', XOBJ_DTYPE_INT );
		$this->initVar ( 'list_day', XOBJ_DTYPE_INT );
		$this->initVar ( 'list_title', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'list_item', XOBJ_DTYPE_INT );
      $this->initVar ( 'list_minute', XOBJ_DTYPE_TXTBOX );
      $this->initVar ( 'list_hour', XOBJ_DTYPE_TXTBOX );
      $this->initVar ( 'list_minute2', XOBJ_DTYPE_TXTBOX );
      $this->initVar ( 'list_hour2', XOBJ_DTYPE_TXTBOX );
      $this->initVar ( 'list_minute3', XOBJ_DTYPE_TXTBOX );
      $this->initVar ( 'list_hour3', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'list_situation', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'list_status', XOBJ_DTYPE_INT , '1');
		$this->initVar ( 'list_order', XOBJ_DTYPE_INT );
	   $this->initVar ( 'list_created', XOBJ_DTYPE_INT );
	   
		$this->db = $GLOBALS ['xoopsDB'];
		$this->table = $this->db->prefix ( 'tv_list' );
	}
	
	public function getListForm() {	
		$form = new XoopsThemeForm ( _AM_TV_LIST_FORM, 'list', 'backend.php', 'post' );
		$form->setExtra ( 'enctype="multipart/form-data"' );
		if ($this->isNew ()) {
			$form->addElement ( new XoopsFormHidden ( 'op', 'addlist' ) );
		} else {
			$form->addElement ( new XoopsFormHidden ( 'op', 'editlist' ) );
		}
		$form->addElement ( new XoopsFormHidden ( 'list_id', $this->getVar ( 'list_id', 'e' ) ) );
		$form->addElement ( new XoopsFormText ( _AM_TV_LIST_TITLE, 'list_title', 50, 255, $this->getVar ( 'list_title', 'e' ) ), true );
      // day
      $day = new XoopsFormSelect(_AM_TV_LIST_DAY, 'list_day',$this->getVar ( 'list_day', 'e' ));
		$day->addOption("1", _AM_TV_LIST_DAY1);
		$day->addOption("2", _AM_TV_LIST_DAY2);
		$day->addOption("3", _AM_TV_LIST_DAY3);
		$day->addOption("4", _AM_TV_LIST_DAY4);
		$day->addOption("5", _AM_TV_LIST_DAY5);
		$day->addOption("6", _AM_TV_LIST_DAY6);
		$day->addOption("7", _AM_TV_LIST_DAY7);
		$form->addElement($day);
		
		// time 1
		$time1 = new XoopsFormElementTray(_AM_TV_LIST_TIME,' ');
		$hour1 = new XoopsFormSelect(_AM_TV_LIST_HOUR, 'list_hour',$this->getVar ( 'list_hour', 'e' ));
		$hour1->addOption('00');
		$hour1->addOption('01');
		$hour1->addOption('02');
		$hour1->addOption('03');
		$hour1->addOption('04');
		$hour1->addOption('05');
		$hour1->addOption('06');
		$hour1->addOption('07');
		$hour1->addOption('08');
      $hour1->addOption('09');
      $i = 10;
		while($i < 25) {
			$hour1->addOption($i++);
		}	
		$time1->addElement($hour1);
		
		$minute1 = new XoopsFormSelect(_AM_TV_LIST_MINUTE, 'list_minute',$this->getVar ( 'list_minute', 'e' ));
		$minute1->addOption('00');
		$minute1->addOption('01');
		$minute1->addOption('02');
		$minute1->addOption('03');
		$minute1->addOption('04');
		$minute1->addOption('05');
      $minute1->addOption('06');
		$minute1->addOption('07');
		$minute1->addOption('08');
		$minute1->addOption('09');
		$i = 10;
		while($i < 60) {
			$minute1->addOption($i++);
		}	
		$time1->addElement($minute1);
		
		$form->addElement($time1);

      // time 2
		$time2 = new XoopsFormElementTray(_AM_TV_LIST_TIME2,' ');
		$hour2 = new XoopsFormSelect(_AM_TV_LIST_HOUR, 'list_hour2',$this->getVar ( 'list_hour2', 'e' ));
		$hour2->addOption('00');
		$hour2->addOption('01');
		$hour2->addOption('02');
		$hour2->addOption('03');
		$hour2->addOption('04');
		$hour2->addOption('05');
		$hour2->addOption('06');
		$hour2->addOption('07');
		$hour2->addOption('08');
      $hour2->addOption('09');
      $i = 10;
		while($i < 25) {
			$hour2->addOption($i++);
		}	
		$time2->addElement($hour2);
		
		$minute2 = new XoopsFormSelect(_AM_TV_LIST_MINUTE, 'list_minute2',$this->getVar ( 'list_minute2', 'e' ));
		$minute2->addOption('00');
		$minute2->addOption('01');
		$minute2->addOption('02');
		$minute2->addOption('03');
		$minute2->addOption('04');
		$minute2->addOption('05');
      $minute2->addOption('06');
		$minute2->addOption('07');
		$minute2->addOption('08');
		$minute2->addOption('09');
		$i = 10;
		while($i < 60) {
			$minute2->addOption($i++);
		}	
		$time2->addElement($minute2);
		
		$form->addElement($time2);
		
      // time 3
		$time3 = new XoopsFormElementTray(_AM_TV_LIST_TIME3,' ');
		$hour3 = new XoopsFormSelect(_AM_TV_LIST_HOUR, 'list_hour3',$this->getVar ( 'list_hour3', 'e' ));
		$hour3->addOption('00');
		$hour3->addOption('01');
		$hour3->addOption('02');
		$hour3->addOption('03');
		$hour3->addOption('04');
		$hour3->addOption('05');
		$hour3->addOption('06');
		$hour3->addOption('07');
		$hour3->addOption('08');
      $hour3->addOption('09');
      $i = 10;
		while($i < 25) {
			$hour3->addOption($i++);
		}	
		$time3->addElement($hour3);
		
		$minute3 = new XoopsFormSelect(_AM_TV_LIST_MINUTE, 'list_minute3',$this->getVar ( 'list_minute3', 'e' ));
		$minute3->addOption('00');
		$minute3->addOption('01');
		$minute3->addOption('02');
		$minute3->addOption('03');
		$minute3->addOption('04');
		$minute3->addOption('05');
      $minute3->addOption('06');
		$minute3->addOption('07');
		$minute3->addOption('08');
		$minute3->addOption('09');
		$i = 10;
		while($i < 60) {
			$minute3->addOption($i++);
		}	
		$time3->addElement($minute3);
		
		$form->addElement($time3);

      // item
		$item_handler = xoops_getmodulehandler('item', 'tv');
		$criteria = new CriteriaCompo ();
      $criteria->add ( new Criteria ( 'item_status', '1' ) );
		$items = $item_handler->getObjects ( $criteria );
		if(!$items) {
			redirect_header("item.php?op=new_item", 3, _AM_TV_MSG_ADDITEM);
			// Include footer
			xoops_cp_footer ();
			exit ();
		}	
	   $item_sel = new XoopsFormSelect(_AM_TV_LIST_ITEM, 'list_item', $this->getVar ( 'list_item' ));
      $i = 1;
      foreach (array_keys($items) as $i) {
         $item_sel->addOption($items[$i]->getVar("item_id"), $items[$i]->getVar("item_title"));
      }
		$form->addElement($item_sel);
		
		$form->addElement ( new XoopsFormRadioYN ( _AM_TV_LIST_STATUS, 'list_status', $this->getVar ( 'list_status', 'e' ) ) );
		// Situation
      $situation = new XoopsFormSelect(_AM_TV_LIST_SITUATION, 'list_situation',$this->getVar ( 'list_situation', 'e' ));
      $situationArray = explode('|',xoops_getModuleOption ( 'situation', 'tv' ));
	   foreach( $situationArray as $situation1 ) {
	      $situation->addOption($situation1);
	   }
		$form->addElement($situation);
		// Submit buttons
		$button_tray = new XoopsFormElementTray ( '', '' );
		$submit_btn = new XoopsFormButton ( '', 'post', _SUBMIT, 'submit' );
		$button_tray->addElement ( $submit_btn );
		$cancel_btn = new XoopsFormButton ( '', 'cancel', _CANCEL, 'cancel' );
		$cancel_btn->setExtra ( 'onclick="javascript:history.go(-1);"' );
		$button_tray->addElement ( $cancel_btn );
		$form->addElement ( $button_tray );
		$form->display ();
	}
	
	public function toArray() {
		$ret = array ();
		$vars = $this->getVars ();
		foreach ( array_keys ( $vars ) as $i ) {
			$ret [$i] = $this->getVar ( $i );
		}
		return $ret;
	}
}

class tvListHandler extends XoopsPersistableObjectHandler {
	
	public function tvListHandler($db) {
		parent::XoopsPersistableObjectHandler ( $db, 'tv_list', 'tv_list', 'list_id', 'list_title' );
	}
	
	public function setorder() {
		$criteria = new CriteriaCompo ();
		$criteria->setSort ( 'list_order' );
		$criteria->setOrder ( 'DESC' );
		$criteria->setLimit ( 1 );
		$last = $this->getObjects ( $criteria );
		$order = 1;
		foreach ( $last as $item ) {
			$order = $item->getVar ( 'list_order' ) + 1;
		}
		return $order;
	}
	
	public function adminList($info) {
		$ret = array ();
		$criteria = new CriteriaCompo ();
		if($info ['list_day']) {
			$criteria->add ( new Criteria ( 'list_day', $info ['list_day'] ) );
		}
      $criteria->setSort ( $info ['list_sort'] );
		$criteria->setOrder ( $info ['list_order'] );
		$criteria->setLimit ( $info ['list_limit'] );
		$criteria->setStart ( $info ['list_start'] );
		
		$obj = $this->getObjects ( $criteria, false );
		if ($obj) {
			foreach ( $obj as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['list_time'] = $root->getVar ( 'list_hour' ) . ':' . $root->getVar ( 'list_minute' );
				$tab ['list_time2'] = $root->getVar ( 'list_hour2' ) . ':' . $root->getVar ( 'list_minute2' );
				$tab ['list_time3'] = $root->getVar ( 'list_hour3' ) . ':' . $root->getVar ( 'list_minute3' );
				$tab ['list_dayname'] = $this->dayname($root->getVar ( 'list_day' ));
				$ret [] = $tab;
			}	
		}
		
		return $ret;	
	}	

	public function userList() {
		$ret = array ();
		$criteria = new CriteriaCompo ();
		$criteria->add ( new Criteria ( 'list_status', 1 ) );
      $criteria->setSort ( 'list_order' );
		$criteria->setOrder ( 'ASC' );
		
		$obj = $this->getObjects ( $criteria, false );
		if ($obj) {
			foreach ( $obj as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['list_time'] = $root->getVar ( 'list_hour' ) . ':' . $root->getVar ( 'list_minute' );
				$tab ['list_time2'] = $root->getVar ( 'list_hour2' ) . ':' . $root->getVar ( 'list_minute2' );
				$tab ['list_time3'] = $root->getVar ( 'list_hour3' ) . ':' . $root->getVar ( 'list_minute3' );
				$ret [] = $tab;
			}	
		}
		
		return $ret;	
	}	
	
	public function todayList($today) {
		$ret = array ();
		$criteria = new CriteriaCompo ();
		$criteria->add ( new Criteria ( 'list_status', 1 ) );
		$criteria->add ( new Criteria ( 'list_day', $today ) );
		$criteria->setSort ( 'list_order' );
		$criteria->setOrder ( 'ASC' );
		
		$obj = $this->getObjects ( $criteria, false );
		if ($obj) {
			foreach ( $obj as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['list_time'] = $root->getVar ( 'list_hour' ) . ':' . $root->getVar ( 'list_minute' );
				$tab ['list_time2'] = $root->getVar ( 'list_hour2' ) . ':' . $root->getVar ( 'list_minute2' );
				$tab ['list_time3'] = $root->getVar ( 'list_hour3' ) . ':' . $root->getVar ( 'list_minute3' );
				$ret [] = $tab;
			}	
		}
		
		return $ret;
	}
		
	public function dayname($day) {
		switch($day) {
			case '1':
			   $dayname = _AM_TV_LIST_DAY1;
				break;
			case '2':
			   $dayname = _AM_TV_LIST_DAY2;
				break;
			case '3':
			   $dayname = _AM_TV_LIST_DAY3;
				break;
         case '4':
			   $dayname = _AM_TV_LIST_DAY4;
				break;
         case '5':
			   $dayname = _AM_TV_LIST_DAY5;
				break;
         case '6':
			   $dayname = _AM_TV_LIST_DAY6;
				break;
			case '7':
			   $dayname = _AM_TV_LIST_DAY7;
				break;	
		}
		return $dayname;	
	}
		
	public function listCount() {
		$criteria = new CriteriaCompo ();
		return $this->getCount ( $criteria );
	}
}	

?>