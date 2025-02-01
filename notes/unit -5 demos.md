
1. basic
- front-end
```html
<html>
<head>
<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form action="">
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>
```

- back-end
```php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
```
2. database
- front-end
```html
<html>
<head>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","family.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">Peter Griffin</option>
    <option value="2">Lois Griffin</option>
    <option value="3">Joseph Swanson</option>
    <option value="4">Glenn Quagmire</option>
    </select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
```
- back-end
```php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','peter','abc123');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['Hometown'] . "</td>";
  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($con);
```

3. XML
- front-end
```html
<html>  
<head>  
<script>  
function showCD(str) {  
  if (str=="") {  
    document.getElementById("txtHint").innerHTML="";  
    return;  
  }  
  var xmlhttp=new XMLHttpRequest();  
  xmlhttp.onreadystatechange=function() {  
    if (this.readyState==4 && this.status==200) {  
      document.getElementById("txtHint").innerHTML=this.responseText;  
    }  
  }  
  xmlhttp.open("GET","getcd.php?q="+str,true);  
  xmlhttp.send();  
}  
</script>  
</head>  
<body>  
  
<form>  
Select a CD:  
<select name="cds" onchange="showCD(this.value)">  
  <option value="">Select a CD:</option>  
  <option value="Bob Dylan">Bob Dylan</option>  
  <option value="Bee Gees">Bee Gees</option>  
  <option value="Cat Stevens">Cat Stevens</option>  
</select>  
</form>  
<div id="txtHint"><b>CD info will be listed here...</b></div>  
  
</body>  
</html>
```
- back-end
```php
<?php  
$q=$_GET["q"];  
  
$xmlDoc = new DOMDocument();  
$xmlDoc->load("cd_catalog.xml");  
  
$x=$xmlDoc->getElementsByTagName('ARTIST');  
  
for ($i=0; $i<=$x->length-1; $i++) {  
  //Process only element nodes  
  if ($x->item($i)->nodeType==1) {  
    if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {  
      $y=($x->item($i)->parentNode);  
    }  
  }  
}  
  
$cd=($y->childNodes);  
  
for ($i=0;$i<$cd->length;$i++) {  
  //Process only element nodes  
  if ($cd->item($i)->nodeType==1) {  
    echo("<b>" . $cd->item($i)->nodeName . ":</b> ");  
    echo($cd->item($i)->childNodes->item(0)->nodeValue);  
    echo("<br>");  
  }  
}  
?>
```

```xml
<?xml version="1.0" encoding="utf-8"?>
<CATALOG>
  <CD>
    <TITLE>Empire Burlesque</TITLE>
    <ARTIST>Bob Dylan</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <COMPANY>Columbia</COMPANY>
    <PRICE>10.90</PRICE>
    <YEAR>1985</YEAR>
  </CD>
  <CD>
    <TITLE>Hide your heart</TITLE>
    <ARTIST>Bonnie Tyler</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>CBS Records</COMPANY>
    <PRICE>9.90</PRICE>
    <YEAR>1988</YEAR>
  </CD>
  <CD>
    <TITLE>Greatest Hits</TITLE>
    <ARTIST>Dolly Parton</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <COMPANY>RCA</COMPANY>
    <PRICE>9.90</PRICE>
    <YEAR>1982</YEAR>
  </CD>
  <CD>
    <TITLE>Still got the blues</TITLE>
    <ARTIST>Gary Moore</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Virgin records</COMPANY>
    <PRICE>10.20</PRICE>
    <YEAR>1990</YEAR>
  </CD>
  <CD>
    <TITLE>Eros</TITLE>
    <ARTIST>Eros Ramazzotti</ARTIST>
    <COUNTRY>EU</COUNTRY>
    <COMPANY>BMG</COMPANY>
    <PRICE>9.90</PRICE>
    <YEAR>1997</YEAR>
  </CD>
  <CD>
    <TITLE>One night only</TITLE>
    <ARTIST>Bee Gees</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Polydor</COMPANY>
    <PRICE>10.90</PRICE>
    <YEAR>1998</YEAR>
  </CD>
  <CD>
    <TITLE>Sylvias Mother</TITLE>
    <ARTIST>Dr.Hook</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>CBS</COMPANY>
    <PRICE>8.10</PRICE>
    <YEAR>1973</YEAR>
  </CD>
  <CD>
    <TITLE>Maggie May</TITLE>
    <ARTIST>Rod Stewart</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Pickwick</COMPANY>
    <PRICE>8.50</PRICE>
    <YEAR>1990</YEAR>
  </CD>
  <CD>
    <TITLE>Romanza</TITLE>
    <ARTIST>Andrea Bocelli</ARTIST>
    <COUNTRY>EU</COUNTRY>
    <COMPANY>Polydor</COMPANY>
    <PRICE>10.80</PRICE>
    <YEAR>1996</YEAR>
  </CD>
  <CD>
    <TITLE>When a man loves a woman</TITLE>
    <ARTIST>Percy Sledge</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <COMPANY>Atlantic</COMPANY>
    <PRICE>8.70</PRICE>
    <YEAR>1987</YEAR>
  </CD>
  <CD>
    <TITLE>Black angel</TITLE>
    <ARTIST>Savage Rose</ARTIST>
    <COUNTRY>EU</COUNTRY>
    <COMPANY>Mega</COMPANY>
    <PRICE>10.90</PRICE>
    <YEAR>1995</YEAR>
  </CD>
  <CD>
    <TITLE>1999 Grammy Nominees</TITLE>
    <ARTIST>Many</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <COMPANY>Grammy</COMPANY>
    <PRICE>10.20</PRICE>
    <YEAR>1999</YEAR>
  </CD>
  <CD>
    <TITLE>For the good times</TITLE>
    <ARTIST>Kenny Rogers</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Mucik Master</COMPANY>
    <PRICE>8.70</PRICE>
    <YEAR>1995</YEAR>
  </CD>
  <CD>
    <TITLE>Big Willie style</TITLE>
    <ARTIST>Will Smith</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <COMPANY>Columbia</COMPANY>
    <PRICE>9.90</PRICE>
    <YEAR>1997</YEAR>
  </CD>
  <CD>
    <TITLE>Tupelo Honey</TITLE>
    <ARTIST>Van Morrison</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Polydor</COMPANY>
    <PRICE>8.20</PRICE>
    <YEAR>1971</YEAR>
  </CD>
  <CD>
    <TITLE>Soulsville</TITLE>
    <ARTIST>Jorn Hoel</ARTIST>
    <COUNTRY>Norway</COUNTRY>
    <COMPANY>WEA</COMPANY>
    <PRICE>7.90</PRICE>
    <YEAR>1996</YEAR>
  </CD>
  <CD>
    <TITLE>The very best of</TITLE>
    <ARTIST>Cat Stevens</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Island</COMPANY>
    <PRICE>8.90</PRICE>
    <YEAR>1990</YEAR>
  </CD>
  <CD>
    <TITLE>Stop</TITLE>
    <ARTIST>Sam Brown</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>A and M</COMPANY>
    <PRICE>8.90</PRICE>
    <YEAR>1988</YEAR>
  </CD>
  <CD>
    <TITLE>Bridge of Spies</TITLE>
    <ARTIST>T'Pau</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Siren</COMPANY>
    <PRICE>7.90</PRICE>
    <YEAR>1987</YEAR>
  </CD>
  <CD>
    <TITLE>Private Dancer</TITLE>
    <ARTIST>Tina Turner</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>Capitol</COMPANY>
    <PRICE>8.90</PRICE>
    <YEAR>1983</YEAR>
  </CD>
  <CD>
    <TITLE>Midt om natten</TITLE>
    <ARTIST>Kim Larsen</ARTIST>
    <COUNTRY>EU</COUNTRY>
    <COMPANY>Medley</COMPANY>
    <PRICE>7.80</PRICE>
    <YEAR>1983</YEAR>
  </CD>
  <CD>
    <TITLE>Pavarotti Gala Concert</TITLE>
    <ARTIST>Luciano Pavarotti</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>DECCA</COMPANY>
    <PRICE>9.90</PRICE>
    <YEAR>1991</YEAR>
  </CD>
  <CD>
    <TITLE>The dock of the bay</TITLE>
    <ARTIST>Otis Redding</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <COMPANY>Stax Records</COMPANY>
    <PRICE>7.90</PRICE>
    <YEAR>1968</YEAR>
  </CD>
  <CD>
    <TITLE>Picture book</TITLE>
    <ARTIST>Simply Red</ARTIST>
    <COUNTRY>EU</COUNTRY>
    <COMPANY>Elektra</COMPANY>
    <PRICE>7.20</PRICE>
    <YEAR>1985</YEAR>
  </CD>
  <CD>
    <TITLE>Red</TITLE>
    <ARTIST>The Communards</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <COMPANY>London</COMPANY>
    <PRICE>7.80</PRICE>
    <YEAR>1987</YEAR>
  </CD>
  <CD>
    <TITLE>Unchain my heart</TITLE>
    <ARTIST>Joe Cocker</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <COMPANY>EMI</COMPANY>
    <PRICE>8.20</PRICE>
    <YEAR>1987</YEAR>
  </CD>
</CATALOG> 
```

4. live search
- front-end
```html
<html>  
<head>  
<script>  
function showResult(str) {  
  if (str.length==0) {  
    document.getElementById("livesearch").innerHTML="";  
    document.getElementById("livesearch").style.border="0px";  
    return;  
  }  
  var xmlhttp=new XMLHttpRequest();  
  xmlhttp.onreadystatechange=function() {  
    if (this.readyState==4 && this.status==200) {  
      document.getElementById("livesearch").innerHTML=this.responseText;  
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";  
    }  
  }  
  xmlhttp.open("GET","livesearch.php?q="+str,true);  
  xmlhttp.send();  
}  
</script>  
</head>  
<body>  
  
<form>  
<input type="text" size="30" onkeyup="showResult(this.value)">  
<div id="livesearch"></div>  
</form>  
  
</body>  
</html>
```
- back-end
```php
<?php  
$xmlDoc=new DOMDocument();  
$xmlDoc->load("links.xml");  
  
$x=$xmlDoc->getElementsByTagName('link');  
  
//get the q parameter from URL  
$q=$_GET["q"];  
  
//lookup all links from the xml file if length of q>0  
if (strlen($q)>0) {  
  $hint="";  
  for($i=0; $i<($x->length); $i++) {  
    $y=$x->item($i)->getElementsByTagName('title');  
    $z=$x->item($i)->getElementsByTagName('url');  
    if ($y->item(0)->nodeType==1) {  
      //find a link matching the search text  
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {  
        if ($hint=="") {  
          $hint="<a href='" .  
          $z->item(0)->childNodes->item(0)->nodeValue .  
          "' target='_blank'>" .  
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";  
        } else {  
          $hint=$hint . "<br /><a href='" .  
          $z->item(0)->childNodes->item(0)->nodeValue .  
          "' target='_blank'>" .  
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";  
        }  
      }  
    }  
  }  
}  
  
// Set output to "no suggestion" if no hint was found  
// or to the correct values  
if ($hint=="") {  
  $response="no suggestion";  
} else {  
  $response=$hint;  
}  
  
//output the response  
echo $response;  
?>
```

```xml
<?xml version="1.0" encoding="utf-8"?>
<pages>
  <link>
    <title>HTML a tag</title>
    <url>https://www.w3schools.com/tags/tag_a.asp</url>
  </link>
  <link>
    <title>HTML br tag</title>
    <url>https://www.w3schools.com/tags/tag_br.asp</url>
  </link>
  <link>
    <title>CSS background Property</title>
    <url>https://www.w3schools.com/cssref/css3_pr_background.asp</url>
  </link>
  <link>
    <title>CSS border Property</title>
    <url>https://www.w3schools.com/cssref/pr_border.asp</url>
  </link>
  <link>
    <title>JavaScript Date Object</title>
    <url>https://www.w3schools.com/jsref/jsref_obj_date.asp</url>
  </link>
  <link>
    <title>JavaScript Array Object</title>
    <url>https://www.w3schools.com/jsref/jsref_obj_array.asp</url>
  </link>
</pages>
```

5. poll
- front-end
```html
<html>  
<head>  
<script>  
function getVote(int) {  
  var xmlhttp=new XMLHttpRequest();  
  xmlhttp.onreadystatechange=function() {  
    if (this.readyState==4 && this.status==200) {  
      document.getElementById("poll").innerHTML=this.responseText;  
    }  
  }  
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);  
  xmlhttp.send();  
}  
</script>  
</head>  
<body>  
  
<div id="poll">  
<h3>Do you like PHP and AJAX so far?</h3>  
<form>  
Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>  
No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">  
</form>  
</div>  
  
</body>  
</html>
```
- back-end
```php
<?php  
$vote = $_REQUEST['vote'];  
  
//get content of textfile  
$filename = "poll_result.txt";  
$content = file($filename);  
  
//put content in array  
$array = explode("||", $content[0]);  
$yes = $array[0];  
$no = $array[1];  
  
if ($vote == 0) {  
  $yes = $yes + 1;  
}  
if ($vote == 1) {  
  $no = $no + 1;  
}  
  
//insert votes to txt file  
$insertvote = $yes."||".$no;  
$fp = fopen($filename,"w");  
fputs($fp,$insertvote);  
fclose($fp);  
?>  
  
<h2>Result:</h2>  
<table>  
<tr>  
<td>Yes:</td>  
<td><img src="poll.gif"  
width='<?php echo(100*round($yes/($no+$yes),2)); ?>'  
height='20'>  
<?php echo(100*round($yes/($no+$yes),2)); ?>%  
</td>  
</tr>  
<tr>  
<td>No:</td>  
<td><img src="poll.gif"  
width='<?php echo(100*round($no/($no+$yes),2)); ?>'  
height='20'>  
<?php echo(100*round($no/($no+$yes),2)); ?>%  
</td>  
</tr>  
</table>
```

poll_result.txt

```txt 
5 3
```
