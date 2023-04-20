<?php

$search_param = $_POST["search"];
$search_area = $_POST["area"];

if(isset($_POST["search"]) && isset($_POST["area"]))
{
    //echo $search_param;
    //echo $search_area;

//Connect to database
$host = "localhost";
$dbuser = "id20162156_doctorbhav";
$dbpass = "Abcd1234*#%-";
$dbname = "id20162156_doctordb";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

//$sql = "SELECT ID, DoctorName, DoctorInformation, DoctorImage from doctors 
//where DoctorArea like '%".$search_area."%' and DoctorCategory like '%".$search_param."%'";
$sql = "SELECT * FROM `doctors` WHERE DoctorArea like '%".$search_area."%' and DoctorCategory like '%".$search_param."%'";

$result = $conn->query($sql);



if($result->num_rows > 0)
{
    $data = '</div><b class="lbltitlesection3">Doctor Found in your area</b></div>';
    $doctor_data = "";

    while($row = $result->fetch_assoc())
    {
        $doctorid = $row["ID"];
        $doctorname = $row["DoctorName"];
        $doctorinfo = $row["DoctorInformation"];
        $doctorimage = $row["DoctorImage"];

       $doctor_data = $doctor_data.'<div class="searchsection">
       <div class="search-section">
         <div class="description">
           <p class="find-and-search-your">
           '.$doctorinfo.'
           </p>
         </div>
         <b class="titleforsearch">'.$doctorname.'</b
         ><img
           class="searchimagebg-icon"
           alt=""
           src="public/searchimagebg.svg"
         /><img
           class="searchimage-icon"
           alt=""
           src="'.$doctorimage.'"
         />
       </div>
     </div>';
     /*<div class="search-section">
       <div class="description2">
         <p class="ask-for-an">'.$doctorinfo.'</p>
       </div>
       <b class="titleforsearch">'.$doctorname.'</b
       ><img
         class="searchimagebg-icon"
         alt=""
         src="public/searchimagebg.svg"
       /><img
         class="searchimage-icon"
         alt=""
         src="'.$doctorimage.'"
       />
     </div>*/
    }
    
}
else
{
    $data = '</div><b class="lbltitlesection3">No Doctor Found in your area</b></div>';
    $doctor_data="";
}
}
else
{
    $data = '</div><b class="lbltitlesection3">Bad Query</b></div>';
    $doctor_data="";
}

$data = $data.$doctor_data;
echo $data;


?>
