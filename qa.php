<?php
	session_start();
	ob_start();
	include('connect.php');
?>
<html>
	<head>
	<!-- CSS styles for standard search box -->	
	<link rel="stylesheet" href="HomeCss.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" media="all" />
	<script src="tabcontent.js" type="text/javascript"></script>		
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
	<script src = 'jquery-2.1.4.js'></script>

	<script type="text/javascript">
					function opacity(el,opacity)
					{
						setStyle(el,"filter:","alpha(opacity="+opacity+")");
						setStyle(el,"-moz-opacity",opacity/100);
						setStyle(el,"-khtml-opacity",opacity/100);
						setStyle(el,"opacity",opacity/100);
					}
					function calendar()
					{
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var year = date.getYear();
						if(year<=200)
						{
							year += 1900;
						}
						months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
						days_in_month = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
						if(year%4 == 0 && year!=1900)
						{
							days_in_month[1]=29;
						}
						total = days_in_month[month];
						var date_today = day+' '+months[month]+' '+year;
						beg_j = date;
						beg_j.setDate(1);
						if(beg_j.getDate()==2)
						{
							beg_j=setDate(0);
						}
						beg_j = beg_j.getDay();
						document.write('<table class="cal_calendar" onload="opacity(document.getElementById(\'cal_body\'),20);"><tbody id="cal_body"><tr><th colspan="7">'+date_today+'</th></tr>');
						document.write('<tr class="cal_d_weeks"><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>');
						week = 0;
						for(i=1;i<=beg_j;i++)
						{
							document.write('<td class="cal_days_bef_aft">'+(days_in_month[month-1]-beg_j+i)+'</td>');
							week++;
						}
						for(i=1;i<=total;i++)
						{
							if(week==0)
							{
								document.write('<tr>');
							}
							if(day==i)
							{
								document.write('<td class="cal_today">'+i+'</td>');
							}
							else
							{
								document.write('<td>'+i+'</td>');
							}
							week++;
							if(week==7)
							{
								document.write('</tr>');
								week=0;
							}
						}
						for(i=1;week!=0;i++)
						{
							document.write('<td class="cal_days_bef_aft">'+i+'</td>');
							week++;
							if(week==7)
							{
								document.write('</tr>');
								week=0;
								}		
						}
						document.write('</tbody></table>');
						opacity(document.getElementById('cal_body'),70);
						return true;
					}
					
					jQuery(document).ready(function($){
					$('.my-form .add-box').click(function(){
						var n = $('.text-box').length + 1
						var box_html = $('<p class="text-box" style="color:#0B0B61"><label for="box' + n + '">Question <span class="box-number">' + n + '</span></label> <input type="text" name="boxes[]" size="70" value="" id="box' + n + '" /> <select name="boxes[]"><option name="answer" value="multi">Multiple Choices</option><option name="answer" value="brief">Brief Answer</option></select> <a href="#" class="remove-box">Remove</a></p>');
						box_html.hide();
						$('.my-form p.text-box:last').after(box_html);
						box_html.fadeIn('slow');
						return false;
					});
					
					$('.my-form').on('click', '.remove-box', function(){
					$(this).parent().css( 'background-color', '#FF6C6C' );
					$(this).parent().fadeOut("slow", function() {
						$(this).remove();
						$('.box-number').each(function(index){
							$(this).text( index + 1 );
						});
					});
					return false;
				});
					
				});
				
				$('#ca-container').contentcarousel();
				</script>
	</head>
		<body>
			<header id="menu">
			<center><img src = "head.png" width="1180px" /></center>
			
			<nav><ul>
					<li><a href="index.php">HOME</a></li> 
					<li><a href="course.php">MANAGED COURSE</a></li> 
					<li><a href="qa.php">MANAGED QUESTION</a></li> 
					<li><a href="stat.php">STATISTIC</a></li> 
					<li><a href="index.php">ABOUT US</a></li>
				</ul></nav>
			</header>
			<header id="status">
				<ul id="status" align="center">
					<?php
						if($_SESSION['username']!=NULL && $_SESSION['passport'] == 2){
						echo"
							<li>
								<a href='user.php' onmouseover='showOrHide(log-out)'>
									WELCOME: ".$_SESSION['firstname'] ."							
								</a>
									<ul class='sub-menu'>
										<li>
											<a href='logout.php'>logout</a>
										</li>
									</ul>
							</li>";
						}
						else{
							header("location:shome.php");
						}
					?>
				</ul>
			</header>
			
			


		<article class="log-in">
		<br>
		
			<?php
				if($_SESSION['username']!=NULL)
				{
					
				}
			else
			{	
				echo'
					<form action="login.php" autocomplete="on" method="POST">
					<table border="0" align="center">
						<tr>
							<th id="head" colspan="2">
								LOG IN
							</th>
						</tr>
						<tr>
							<td>
								USERNAME : 
							</td>
							<td>
								<input type="text" name = "user" id = "user" pattern = "[A-Za-z0-9]{3,20}" title ="UserName" placeholder ="username" required />
							</td>
						</tr>
						<tr>
							<td>
								PASSWORD : 
							</td>
							<td>
								<input type="password" name = "pass" id = "pass" pattern = "[A-Za-z0-9]{3,20}" title = "Password" placeholder ="password" required />
							</td>
						</tr>
						<tr>
							<td>
								STATUS    : 
							</td>
							<td>
								<input type="radio" name="status" value="student">student   <input type="radio" name="status" value="staff">staff
							</td>
						</tr>
						<tr>
							<th id="head" colspan="2">
								<input type="submit" value="login"/>
							</th>
						</tr>
					</table>
				</form>
				';
			}
			?>
			
				<br>
				
				<div align="center">
					<script type="text/javascript">
						calendar();
					</script>
				</div>
			
		</article>
		<article class="select">
		
		<div class="my-form" id="qa-form" >
		<h2>Managed Question</h2>
			<form role="form" method="post" action="questionAddData.php">
			<p class="text-box" style="color:#0B0B61">
				<label for="box1">Question <span class="box-number">1</span></label>
				<input type="text" name="boxes[]" size="70" value="" id="box1" />
				<select name="boxes[]">
					<option name="answer" value="multi">Multiple Choices</option>
					<option name="answer" value="brief">Brief Answer</option>
				</select>
				<a class="add-box" href="#">Add More</a>
			</p>
			<p><input type="submit" value="Submit" /></p>
			</form>
		</div></article>
		<footer id="footer" class="body"><p>
			
		</footer>
		</body>
</html>