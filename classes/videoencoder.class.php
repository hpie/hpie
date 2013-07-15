<?php

 $encoder = new videoencoder();
 $thumbnail = $encoder->export_thumb("rio-fer.3gp");
 $duration = $encoder->get_duration("rio-fer.3gp");
 $videofile = $encoder->export_video("rio-fer.3gp");
 
class videoencoder{
	
	function __construct(){
		$this->ffmpegpath = 	"/usr/local/bin/ffmpeg"; 					#path to ffmpeg binary
		$this->nohuppath = 		"/usr/bin/nohup";							#path to nohup on your system
		$this->tmpdir = 		"/home/bkrishan/temp/grab";				#path to a dedicated tmpdir outside your docroot, where apache can read/write
		$this->readyfiledir = 	"/var/www/videostreaming/uploads/media";		#path to the files where php will move the new media files
	}
	
	public function get_duration($file=""){ #returns seconds
		if(!file_exists($file)){
			die();
		}
		$duration=shell_exec($this->ffmpegpath." -i ".$file." 2>&1 | grep \"Duration\" | cut -d ' ' -f 4 | sed s/,//");
		$duration_array=explode(":",$duration);
		$secs=$duration_array[2]+0;
		$mins=$duration_array[1]+0;
		return $secs+($mins*60);
	}
	
	public function export_thumb($file=""){ #will export a series of jpgs and grab the biggest file (ie it's not just black or some bars but probably actual content)
		$done = false;
		if(!file_exists($file)){
			die();
		}		
		$pid = $this->run_in_background($this->ffmpegpath." -y -i ".$file." -an -vcodec mjpeg -s 352x288 -cropleft 4 -cropright 4 -croptop 12 -cropbottom 12 ".$this->tmpdir."/grab_".md5($file)."_%d.jpg");
		while($this->is_process_running($pid)){
			sleep(1);
		}
		if($handle = opendir($this->tmpdir)){
		    while(false !== ($file = readdir($handle))){
		        if($file != "." && $file != ".."){
					$files[filesize($this->tmpdir."/".$file)] = $file;
				}
		    }
		    closedir($handle);
		}
		ksort($files,SORT_NUMERIC);
		$files = array_reverse($files);
		$topfile = current($files);
		if(is_file($this->tmpdir."/".$topfile)){
			if(copy($this->tmpdir."/".$topfile, $this->readyfiledir."/".$topfile)){
				$done = true;
			}
		}
		if($handle = opendir($this->tmpdir)){
		    while(false !== ($file = readdir($handle))){
		        if($file != "." && $file != ".."){
					if(is_file($this->tmpdir."/".$file)){
						unlink($this->tmpdir."/".$file);
					}
				}
		    }
		    closedir($handle);
		}	
		if($done){
			return $topfile;
		}		
	}
	
	public function export_video($file){ #tweak settings as you wish, default below is for a simple flv file (using the spark codec)
		if(!file_exists($file)){
			die();
		}		
		$pid = $this->run_in_background($this->ffmpegpath." -y -i ".$file." -ar 22050 -ab 96 -b 900 -ac 1 -qmin 6 -qmax 10 -s 352x288 ".$this->readyfiledir."/".md5($file).".flv");
		while($this->is_process_running($pid)){
			sleep(1);
		}
		if(file_exists($this->readyfiledir."/".md5($file).".flv")){
			return md5($file).".flv";
		}
	}
	
	private function run_in_background($command){
		$PID = shell_exec($this->nohuppath." nice -n 19 $command >/dev/null & echo $!");	
		return($PID);
	}
	
	private function is_process_running($PID){
		exec("ps $PID", $ProcessState);
		return(count($ProcessState) >= 2);
	}
		
}
