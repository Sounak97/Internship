


<html>

<head>
<title>Template Choice</title>
<style type="text/css">
h1{
text-align : center;

}
#temp_choice{
  text-align : center;

}
.button{
display:inline-block;
padding:35em 12em;
border:100em solid #FFFFFF;
margin:0 3900in 3900in 0;
border-radius:12em;
box-sizing: border-box;
text-decoration:none;
font-family:'Roboto',sans-serif;
font-weight:3000;
color:#FFFFFF;
text-align:center;
transition: all 0.2s;
}
.button:hover{
color:#000000;
background-color:#FFFFFF;
}
@media all and (max-width:30em){
.button{
display:block;
margin:0.4em auto;
}
}

</style>


</head>
<body>
  <div id="page_heading">
   
  </div>
  <div id="temp_choice">
  <!--  <button type="button"> Template 1 </button>
	<button type="button"> Template 2</button>
	<button type="button"> Template 3</button>
	-->
	<div class="row">
				<h1> Let us look at Templates! </h1>
				<!-- Templates -->
			
				<?php
					$templates = collectTemplates();
				?>
				<?php for ($i = 0, $n = count($templates); $i < $n; $i++) : ?>
					
						<button type="button" class="btn" data-toggle="modal" data-target="#<?php echo $templates[$i]['name'] . $i; ?>" 
						onclick="<?php replaceTemplate(readTemplate($template[$i]['name'])); ?>">
						  <?php echo $templates[$i]['name']; ?>
						</button></br>
					
				<?php endfor; ?>
				
	</div>

	
  
  
  </div>
  
</body>


</html>

<?php 
function collectTemplates(){
	
	$templateDir = __DIR__ . '/templates';
	$templates   = array();
    if ($handle = opendir($templateDir))
	{
		$i = 0;

		while (false !== ($entry = readdir($handle)))
		{
			if ($entry != '.' && $entry != '..')
			{
				preg_match("/.*.html/", $entry, $template);

				if (count($template))
				{
					$templates[$i]['path'] = __DIR__ . '/templates/' . $entry;
					$templates[$i]['name'] = str_replace('.html', '', $entry);

					$i++;
				}
			}
		}

		closedir($handle);
	}

	return $templates;
	
}

function readTemplate($file)
{
	$handle   = fopen($file, "r");
	$content  = fread($handle, filesize($file));
	fclose($handle);

	return $content;
}

function replaceTemplate($content)
{
	$content = str_replace('{full_name}', $_POST['full_name'], $content);
	$content = str_replace('{resume_title}', $_POST['resume_title'], $content);
	$content = str_replace('{mobile}', $_POST['mobile'], $content);
	$content = str_replace('{email}', $_POST['email'], $content);
	$content = str_replace('{address}', $_POST['address'], $content);
	$content = str_replace('{profile_info}', $_POST['profile_info'], $content);
	$content = str_replace('{programming_language}', $_POST['programming_language'], $content);
	$content = str_replace('{web}', $_POST['web'], $content);
	$content = str_replace('{framework}', $_POST['framework'], $content);
	$content = str_replace('{operating_system}', $_POST['os'], $content);

	//$master  =$_POST['master']." ". $_POST['master_college']." ".$_POST['master_completion'];
	//$content = str_replace('{master}', $master, $content);

	//$bachlor           = $_POST['bechlor']." ". $_POST['bachlor_college']." ".$_POST['bechlor_complrtion'];
	$content = str_replace('{bachelor}', $.POST['bacehlor'], $content);
	$content = str_replace('{bachelor_college}', $.POST['bacehlor_college'], $content);
	$content = str_replace('{bachelor_completion}', $.POST['bacehlor_completion'], $content);
     
//	$class12           = $_POST['class_12']." ".$_POST['board_name']." ".$_POST['completion_12'];
	$content = str_replace('{class_12}', $_POST['class_12'], $content);
	$content = str_replace('{completion_12}', $_POST['completion_12'], $content);
    
	//$class10           =$_POST['class_10']." ".$_POST['schoolboard']." ".$_POST['completion_10'];
	//$content = str_replace('{class_10}', $_POST['class_10'], $content);

	$content = str_replace('{project1}', $_POST['project1'], $content);
	$content = str_replace('{p1_desc}', $_POST['project1abstract'], $content);

	$content = str_replace('{project2}', $_POST['project2'], $content);
	$content = str_replace('{p2_desc}', $_POST['project2abstract'], $content);

	$content = str_replace('{project3}', $_POST['project3'], $content);
	$content = str_replace('{p3_desc}', $_POST['project3abstract'], $content);

	//$content = str_replace('{project4}', $_POST['project4'], $content);
	//$content = str_replace('{p4_desc}', $_POST['project4abstract'], $content);

//	$content = str_replace('{extra_activity}', $_POST['extra_activity'], $content);

	//$content = str_replace('{gaurdian}', $_POST['gaurdian'], $content);
	//$content = str_replace('{gender}', $_POST['gender'], $content);
	//$content = str_replace('{dob}', $_POST['dob'], $content);
	//$content = str_replace('{nationality}', $_POST['nationality'], $content);
	//$content = str_replace('{maritalstatus}', $_POST['maritalstatus'], $content);
	//$content = str_replace('{languagesknown}', $_POST['languagesknown'], $content);
	$fp = fopen('usercontent.html','w');
	fwrite($fp,$content);
	fclose($fp);
    echo "$content";
	return $content;
}



?>






