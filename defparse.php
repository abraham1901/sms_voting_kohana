<?php
$poll_id = 1;
$base_url = 'http://xn--80aaddchifut6arpli8nd.xn--p1ai/select/kandidat/';
$sql = array();
$reg = '#<td class="pl_40">\s*<p>(.*?)</p>#';
for($i = 1; $i <= 500; $i++)
{
	$url = "$base_url$i.html";
	echo "$i\t$url";
	$content = file_get_contents($url);
	preg_match_all($reg, $content, $out);
	$title = $out[1][0];
	if($title)
	{
		$sql[] = "INSERT INTO `answers`(`id`, `poll_id`, `title`, `url`) VALUES (null,$poll_id,\"$title\",\"$url\");\n";
		echo "\tsuccess!";
	}
	echo "\n";
}
$f = fopen('def.sql', 'w');
if($f)
{
  fwrite($f, implode('',$sql));
  fclose($f);
}
echo "end\n";