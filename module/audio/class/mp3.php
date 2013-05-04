<?php
class mp3 {	public $ffmpegPath;	public $srcPath;	public $destPath;	public $input;	public $output;	public $audioSampleRate;	public $audioBitRate;	public $acodec;
	/**	 * @return the $ffmpegPath	 */	public function getFfmpegPath() {		return $this->ffmpegPath;	}	/**	 * @param field_type $ffmpegPath	 */	public function setFfmpegPath($ffmpegPath) {		$this->ffmpegPath = $ffmpegPath;	}
	/**	 * @return the $srcPath	 */	public function getSrcPath() {		return $this->srcPath;	}
	/**	 * @param field_type $srcPath	 */	public function setSrcPath($srcPath) {		$this->srcPath = $srcPath;	}	/**	 * @return the $destPath	 */	public function getDestPath() {		return $this->destPath;	}	/**	 * @param field_type $destPath	 */	public function setDestPath($destPath) {		$this->destPath = $destPath;	}	/**	 * @return the $input	 */	public function getInput() {		return $this->input;	}	/**	 * @param field_type $input	 */	public function setInput($input) {		$this->input = $input;	}
	/**	 * @return the $output	 */	public function getOutput() {		return $this->output;	}	/**	 * @param field_type $output	 */	public function setOutput($output) {		$this->output = $output;	}	/**	 * @return the $audioSampleRate	 */	public function getAudioSampleRate() {		return $this->audioSampleRate;	}	/**	 * @param field_type $audioSampleRate	 */	public function setAudioSampleRate($audioSampleRate) {		$this->audioSampleRate = $audioSampleRate;	}	/**	 * @return the $audioBitRate	 */	public function getAudioBitRate() {		return $this->audioBitRate;	}	/**	 * @param field_type $audioBitRate	 */	public function setAudioBitRate($audioBitRate) {		$this->audioBitRate = $audioBitRate;	}
	/**
	 * @return the $acodec
	 */
	public function getAcodec() {
		return $this->acodec;
	}

	/**
	 * @param field_type $acodec
	 */
	public function setAcodec($acodec) {
		$this->acodec = $acodec;
	}


	public function mp3($ffmpeg, $srcPath, $destPath, $sampleRate = 44100, $bitRate = 128 , $acodec) {		$this->setFfmpegPath ( $ffmpeg );		$this->setSrcPath ( $srcPath );		$this->setDestPath ( $destPath );		$this->setAudioSampleRate ( $sampleRate );		$this->setAudioBitRate ( $bitRate );
		$this->setAcodec ( $acodec );
	}	public function convert($input, $output) {		$this->setInput ( $input );		$this->setOutput ( $output );
		// ffmpeg -i son_origine.avi -vn -ar 44100 -ac 2 -ab 192 -f mp3 son_final.mp3		//$command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . "  -vn -ar " . $this->audioSampleRate . " -ac 2 -ab " . $this->audioBitRate . " -acodec " . $this->acodec . " -f mp3 " . $this->destPath . "\\" . $this->output;		$command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . "  -vn -ar " . $this->audioSampleRate . " -ac 2 -ab " . $this->audioBitRate . " -f mp3 " . $this->destPath . "\\" . $this->output;
		exec ( $command );		return $command;	}
	
	public function duration($input) {
		$command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " 2>&1";
      // Get ffmpeg info
		ob_start();
		passthru($command);
		$duration = ob_get_contents();
		ob_end_clean();
		// Select output
		preg_match('/Duration: (.*?),/', $duration, $matches, PREG_OFFSET_CAPTURE, 3);
		// Make time
		$arr = explode(':', $matches[1][0]);
		$duration = ( $arr[0] * 60 * 60 ) + ( $arr[1] * 60 ) + ( $arr[2] );
		return $duration;
	}}