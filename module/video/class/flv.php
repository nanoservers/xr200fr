<?php

class flv
{
    public $ffmpegPath;
    public $srcPath;
    public $destPath;
    public $input;
    public $output;
    public $outputWidth;
    public $outputHeight;
    public $audioSampleRate;
    public $audioBitRate;
    public $acodec;
    public $vcodec;
    public $rate;
    public $maxRate;
    public $logo;
    public $overlayHeight;
    public $overlayWidth;

    /**
     * @return the $ffmpegPath
     */
    public function getFfmpegPath()
    {
        return $this->ffmpegPath;
    }

    /**
     * @param field_type $ffmpegPath
     */
    public function setFfmpegPath($ffmpegPath)
    {
        $this->ffmpegPath = $ffmpegPath;
    }

    /**
     * @return the $srcPath
     */
    public function getSrcPath()
    {
        return $this->srcPath;
    }

    /**
     * @param field_type $srcPath
     */
    public function setSrcPath($srcPath)
    {
        $this->srcPath = $srcPath;
    }

    /**
     * @return the $destPath
     */
    public function getDestPath()
    {
        return $this->destPath;
    }

    /**
     * @param field_type $destPath
     */
    public function setDestPath($destPath)
    {
        $this->destPath = $destPath;
    }

    /**
     * @return the $input
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param field_type $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    /**
     * @return the $output
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param field_type $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * @return the $outputWidth
     */
    public function getOutputWidth()
    {
        return $this->outputWidth;
    }

    /**
     * @param field_type $outputWidth
     */
    public function setOutputWidth($outputWidth)
    {
        $this->outputWidth = $outputWidth;
    }

    /**
     * @return the $outputHeight
     */
    public function getOutputHeight()
    {
        return $this->outputHeight;
    }

    /**
     * @param field_type $outputHeight
     */
    public function setOutputHeight($outputHeight)
    {
        $this->outputHeight = $outputHeight;
    }

    /**
     * @return the $audioSampleRate
     */
    public function getAudioSampleRate()
    {
        return $this->audioSampleRate;
    }

    /**
     * @param field_type $audioSampleRate
     */
    public function setAudioSampleRate($audioSampleRate)
    {
        $this->audioSampleRate = $audioSampleRate;
    }

    /**
     * @return the $audioBitRate
     */
    public function getAudioBitRate()
    {
        return $this->audioBitRate;
    }

    /**
     * @param field_type $audioBitRate
     */
    public function setAudioBitRate($audioBitRate)
    {
        $this->audioBitRate = $audioBitRate;
    }

    /**
     * @return the $acodec
     */
    public function getAcodec()
    {
        return $this->acodec;
    }

    /**
     * @param field_type $acodec
     */
    public function setAcodec($acodec)
    {
        $this->acodec = $acodec;
    }

    /**
     * @return the $vcodec
     */
    public function getVcodec()
    {
        return $this->vcodec;
    }

    /**
     * @param field_type $acodec
     */
    public function setVcodec($vcodec)
    {
        $this->vcodec = $vcodec;
    }

    /**
     * @return the $rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param field_type $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return the $maxRate
     */
    public function getMaxRate()
    {
        return $this->maxRate;
    }

    /**
     * @param field_type $maxRate
     */
    public function setMaxRate($maxRate)
    {
        $this->maxRate = $maxRate;
    }

    /**
     * @return the $logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param field_type $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return the $overlayHeight
     */
    public function getOverlayHeight()
    {
        return $this->overlayHeight;
    }

    /**
     * @param field_type $overlayHeight
     */
    public function setOverlayHeight($overlayHeight)
    {
        $this->overlayHeight = $overlayHeight;
    }

    /**
     * @return the $overlayWidth
     */
    public function getOverlayWidth()
    {
        return $this->overlayWidth;
    }

    /**
     * @param field_type $overlayWidth
     */
    public function setOverlayWidth($overlayWidth)
    {
        $this->overlayWidth = $overlayWidth;
    }

    public function flv($ffmpeg, $srcPath, $destPath, $outWidth, $outHeight, $sampleRate, $bitRate, $acodec, $vcodec, $rate, $maxRate, $logo, $overlayHeight, $overlayWidth)
    {
        $this->setFfmpegPath($ffmpeg);
        $this->setSrcPath($srcPath);
        $this->setDestPath($destPath);
        $this->setOutputWidth($outWidth);
        $this->setOutputHeight($outHeight);
        $this->setAudioSampleRate($sampleRate);
        $this->setAudioBitRate($bitRate);
        $this->setAcodec($acodec);
        $this->setVcodec($vcodec);
        $this->setRate($rate);
        $this->setMaxRate($maxRate);
        $this->setLogo($logo);
        $this->setOverlayHeight($overlayHeight);
        $this->setOverlayWidth($overlayWidth);
    }

    public function convert($input, $output, $type = 'normal')
    {
        $this->setInput($input);
        $this->setOutput($output);

        // ffmpeg -i input.flv -s 640x480 -ab 128000  -ar 44000 -f flv output.flv
        // ffmpeg -i input.flv -s 640x480 -acodec libfaac -vcodec libx264 -vpre max -r 30  -maxrate 1000 -ab 128000  -ar 44000 -f flv output.flv
        // ffmpeg -i input.flv -s 400x300 -acodec libfaac -vcodec libx264 -vpre max -r 30  -maxrate 1000 -ab 16000  -ar 16000 -f flv -vf 'movie=/home/voltan/logo.png [logo];[in][logo] overlay=50:50:1 [out]' output.flv

        switch ($type) {
            case 'short':
                $command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " -ar " . $this->audioSampleRate . " -ab " . $this->audioBitRate . " -f flv -s " . $this->outputWidth . "x" . $this->outputHeight . " " . $this->destPath . "\\" . $this->output;
                break;

            case 'normal':
                //$command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " -ar " . $this->audioSampleRate . " -ab " . $this->audioBitRate . " -acodec " . $this->acodec . " -vcodec " . $this->vcodec . " -r " . $this->rate . " -maxrate " . $this->maxRate . " -f flv -s " . $this->outputWidth . "x" . $this->outputHeight . " " . $this->destPath . "\\" . $this->output;
                $command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " -s " . $this->outputWidth . "x" . $this->outputHeight . " -aspect 4:3 -maxrate " . $this->maxRate . " -r " . $this->rate . " -vcodec " . $this->vcodec . " -vpre fastfirstpass -acodec " . $this->acodec . " -ac 1 -ar " . $this->audioSampleRate . " -ab " . $this->audioBitRate . " -f flv  " . $this->destPath . "\\" . $this->output;
                break;

            case 'local':
                //$command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " -ar " . $this->audioSampleRate . " -ab " . $this->audioBitRate . " -acodec " . $this->acodec . " -vcodec " . $this->vcodec . " -r " . $this->rate . " -maxrate " . $this->maxRate . " -f flv -s " . $this->outputWidth . "x" . $this->outputHeight . " " . $this->destPath . "\\" . $this->output;
                $command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " -s " . $this->outputWidth . "x" . $this->outputHeight . " -aspect 4:3 -maxrate " . $this->maxRate . " -r " . $this->rate . " -vcodec " . $this->vcodec . " -acodec " . $this->acodec . " -ac 1 -ar " . $this->audioSampleRate . " -ab " . $this->audioBitRate . " -f flv  " . $this->destPath . "\\" . $this->output;
                break;

            case 'logo':
                //$command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " -ar " . $this->audioSampleRate . " -ab " . $this->audioBitRate . " -acodec " . $this->acodec . " -vcodec " . $this->vcodec . " -r " . $this->rate . " -maxrate " . $this->maxRate . " -f flv -s " . $this->outputWidth . "x" . $this->outputHeight . " -vf 'movie=" . $this->logo . " [logo];[in][logo] overlay=" . $this->overlayWidth . ":" . $this->overlayHeight . ":1 [out]' " . $this->destPath . "\\" . $this->output;
                $command = $this->ffmpegPath . " -i " . $this->srcPath . "\\" . $this->input . " -s " . $this->outputWidth . "x" . $this->outputHeight . " -aspect 4:3 -maxrate " . $this->maxRate . " -r " . $this->rate . " -vcodec " . $this->vcodec . " -vpre fastfirstpass -acodec " . $this->acodec . " -ac 1 -ar " . $this->audioSampleRate . " -ab " . $this->audioBitRate . " -f flv -vf 'movie=" . $this->logo . " [logo];[in][logo] overlay=" . $this->overlayWidth . ":" . $this->overlayHeight . ":1 [out]' " . $this->destPath . "\\" . $this->output;
                break;
        }

        exec($command);
        return $command;
    }

    public function duration($input)
    {
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
        $duration = ($arr[0] * 60 * 60) + ($arr[1] * 60) + ($arr[2]);
        return $duration;
    }
}
