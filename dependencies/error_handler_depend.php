<?php

class errorHandler extends Exception 
{
	public static $showError = 0;
	public static $logError = 0;

	public static function log($message,$treat_as)
	{
		//1 = critical
		//2 = normal
		if(self::$logError == 1)
		{
			// log error
			$log = "";
			$date = date("M d, Y g:i:s a");
			if($treat_as == 1)
			{
				
				$log = "Error: [Critical][{$date}] $message \n";
			}
			else
			{
				$log = "Error: [Normal][{$date}] $message \n";
			}

			$location = "logs/error_logs.txt";
			$fh = fopen($location,"a+");
			fwrite($fh, $log);
			fclose($fh);
		}
		else
		{
			// show error
			$color = ($treat_as == 1) ? "#f20" : "yellow";
			?>
				<div style="background: <?=$color?>; display: inline-block; padding: 30px; font-size: 17px; box-shadow: 0px 0px 7px #eee; border: 1px solid #eee; <?=($treat_as == 1) ? "color: #fff;" : "color: #000;"?>">
					<h2 style="margin: 0; <?=($treat_as == 1) ? "border-bottom: 1px solid #fff;" : "border-bottom: 1px solid #000;"?>  padding-bottom: 5px;">Pihype Error</h2>
					<p><?=$message?></p>
					<p>
						<span>Error Flag: </span> <b style="<?=($treat_as == 1) ? "background: #fff; color: {$color};" : "background: #fff; color: #000;"?> padding: 5px;"><?=($treat_as == 1) ? "Critical": "Normal"?></b>
					</p>
				</div>
			<?php
		}

	}
}