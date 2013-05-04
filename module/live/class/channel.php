<?php

class live_channel extends XoopsObject {
	
	public function live_channel() {
		$this->initVar ( 'channel_id', XOBJ_DTYPE_INT );
	   $this->initVar ( 'channel_hits', XOBJ_DTYPE_INT );
	   
		$this->db = $GLOBALS ['xoopsDB'];
		$this->table = $this->db->prefix ( 'live_channel' );
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

class LiveChannelHandler extends XoopsPersistableObjectHandler {
	
	public function LiveChannelHandler($db) {
		parent::XoopsPersistableObjectHandler ( $db, 'live_channel', 'live_channel', 'channel_id', 'channel_hits' );
	}
	
}	
?>