<?php 


include 'connect.php';
$b=$_GET["Page"];
$tit=$_GET["search"];

$c=($b*5)-5;
$catego=$_GET['category'];
IF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="None" && $_GET['category']!="ALL" )
{
$query="SELECT * FROM ideas WHERE categoryID=$catego AND ideaTitle LIKE '%%%$tit%%%'";
$query1="SELECT * FROM ideas WHERE categoryID=$catego AND ideaTitle LIKE '%%%$tit%%%'";
}

ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="mostviewed" && $_GET['category']!="ALL" )
{
   
    $query=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' AND categoryID=$catego order by viewCount desc limit 5 ";
      $query1="  SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' AND categoryID=$catego order by viewCount desc limit 5 ";
}

ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="latestcomment" && $_GET['category']!="ALL" )
{

$que="SELECT * FROM comments order by commentID desc limit 1";

$resu = mysqli_query($Connect, $que);
if (mysqli_num_rows($resu) > 0) {
    $arr1 = mysqli_fetch_array($resu);
    $lastcmt=$arr1['ideaID'];
    $query="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
 $query1="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
     }
}


ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="latestidea" && $_GET['category']!="ALL" )
{
     $query=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' AND categoryID=$catego order by ideaID desc limit 5";
       $query2=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' AND categoryID=$catego order by ideaID desc limit 5";
}


ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="mostpopular" && $_GET['category']!="ALL" )
{
     $query=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' AND categoryID=$catego order by (likeCount-dislikeCount) desc Limit 5";
    $query1=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' AND categoryID=$catego order by (likeCount-dislikeCount) desc Limit 5";
}
//


ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="None" && $_GET['category']=="ALL" )
{
 $query=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%'  limit $c,5  ";
  $query1=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' ";
}
ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="mostviewed" && $_GET['category']=="ALL" )
{
     $query="SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' order by viewCount desc limit 5  ";

     $query1="SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' order by viewCount desc limit 5  ";
}
ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="latestcomment" && $_GET['category']=="ALL" )
{
   
$que="SELECT * FROM comments order by commentID desc limit 1";

$resu = mysqli_query($Connect, $que);
if (mysqli_num_rows($resu) > 0) {
    $arr1 = mysqli_fetch_array($resu);
    $lastcmt=$arr1['ideaID'];
    $query="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
 $query1="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
     }
}
ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="latestidea" && $_GET['category']=="ALL" )
{
    $query=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' order by ideaID desc limit 5"; 
      $query1=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' order by ideaID desc limit 5"; 
}
ElseIF($_GET['Page'] && $_GET['search']!="" && $_GET['filter']=="mostpopular" && $_GET['category']=="ALL" )
{
     $query=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' order by (likeCount-dislikeCount) desc Limit 5 ";
     $query1=" SELECT * FROM ideas WHERE ideaTitle LIKE '%%%$tit%%%' order by (likeCount-dislikeCount) desc Limit 5 ";
}


Else
IF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="None" && $_GET['category']!="ALL" )
{
 $query="SELECT * FROM ideas WHERE categoryID='$catego'  ";
  $query1="SELECT * FROM ideas WHERE categoryID='$catego' ";
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="mostviewed" && $_GET['category']!="ALL" )
{
     $query=" SELECT * FROM ideas  WHERE categoryID='$catego']' order by viewCount desc limit 5 ";
     $query1=" SELECT * FROM ideas  WHERE categoryID='$catego']' order by viewCount desc limit 5 ";
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="latestcomment" && $_GET['category']!="ALL" )
{

$que="SELECT * FROM comments order by commentID desc limit 1";

$resu = mysqli_query($Connect, $que);
if (mysqli_num_rows($resu) > 0) {
    $arr1 = mysqli_fetch_array($resu);
    $lastcmt=$arr1['ideaID'];
    $query="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
 $query1="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
     }
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="latestidea" && $_GET['category']!="ALL" )
{
   $query= "SELECT * FROM ideas  WHERE categoryID='$catego' order by ideaID desc limit 5" ;  
      $query1= "SELECT * FROM ideas  WHERE categoryID='$catego' order by ideaID desc limit 5 ";  
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="mostpopular" && $_GET['category']!="ALL" )
{
    $query=" SELECT * FROM ideas  WHERE categoryID='$catego' order by (likeCount-dislikeCount) desc Limit 5 " ; 
     $query1=" SELECT * FROM ideas  WHERE categoryID='$catego' order by (likeCount-dislikeCount) desc Limit 5  "; 
}



ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="None" && $_GET['category']=="ALL" )
{
 $query="  SELECT * FROM ideas LIMIT $c,5";
  $query1="  SELECT * FROM ideas";
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="mostviewed" && $_GET['category']=="ALL" )
{
  $query=' SELECT * FROM ideas order by viewCount desc limit 5 ';   
    $query1=' SELECT * FROM ideas order by viewCount desc limit 5 ';
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="latestcomment" && $_GET['category']=="ALL" )
{
$que="SELECT * FROM comments order by commentID desc limit 1";

$resu = mysqli_query($Connect, $que);
if (mysqli_num_rows($resu) > 0) {
    $arr1 = mysqli_fetch_array($resu);
    $lastcmt=$arr1['ideaID'];
    $query="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
 $query1="SELECT * FROM ideas WHERE ideaID='$lastcmt'";
     }
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="latestidea" && $_GET['category']=="ALL" )
{
     $query=' SELECT * FROM ideas order by ideaID desc limit 5 ';
     $query1=' SELECT * FROM ideas order by ideaID desc limit 5 ';
}
ElseIF($_GET['Page'] && $_GET['search']=="" && $_GET['filter']=="mostpopular" && $_GET['category']=="ALL" )
{
   $query='SELECT * FROM ideas order by (likeCount-dislikeCount) desc Limit 5  ';  
    $query1='SELECT * FROM ideas order by (likeCount-dislikeCount) desc Limit 5  ';  
}

Else 
{

      }
 ?>
