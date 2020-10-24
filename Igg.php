<?php system('clear');
echo "
	___ ___  __   ___    _                        
	|_ _/ __| \ \ / (_)__| |___ ___                
	| | (_ |  \ V /| / _` / -_) _ \                      Author : MarsHall
	|___\___|   \_/ |_\__,_\___\___/     _               Team   : Xai Syndicate
	|   \ _____ __ ___ _ | |___  __ _ __| |___ _ _       Github : https://github.com/X-MarsHall
	| |) / _ \ V  V / ' \| / _ \/ _` / _` / -_) '_|
	|___/\___/\_/\_/|_||_|_\___/\__,_\__,_\___|_|  
	
	";
echo "
[] Tidak Work Untuk Akun Instagram Yang Privat!!!
";
echo "Masukkan Url Video : ";
$co = trim(fgets(STDIN));
echo "Name to save as : ";
$name = trim(fgets(STDIN));
echo "Downloading...";
function Connect($url, $time = 10, $UserAgent = 'Mozilla/5.0 (Linux; Android 5.1.1; SM-T285) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36') {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, $time);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $shall = curl_exec($curl);
    curl_close($curl);
    return $shall;
}
$url = $co;
$source = Connect($url);
$video = preg_match('@video" content="(.*?)"@', $source, $video) ? end($video) : false;
$u = urldecode($video);
$d = 'wget -O "' . $name . '.mp4" --user-agent="Mozilla/5.0 (Linux; Android 5.1.1; SM-T285) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Safari/537.36" "' . $u . '" -q --show-progress';
system($d);
echo "
[+] Done : " . $name . ".mp4
";
exit(0);
