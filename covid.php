<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search COVID-19 Vaccine Center Online</title>
    <meta name="description" content="Hello i Am Vishal Baste"/>
    <meta name="keywords" content="Vishal Baste,Vishal"/>
    <meta name=”geo.placename” content=”Global” />
    <meta name="distribution" content="Global" />
    <meta name=copyright content="www.vishalbaste.com" />
    <meta name="author" content="Vishal Baste">
<!-- Header Part -->
<?php 
    include 'header.php';
?>
<div class="container">
<form action="" method="GET">
		<label>
		<input type="text" name="pincode" class="pincode" id="pincode" placeholder="pincode" value="422209" hidden required ></label>
		<label>
		<input type="text" class="date" id="date" name="date" value="<?php echo date('d-m-Y'); ?>" hidden required></label>
	</form>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
       .apikey {
            text-align:center;margin:15px;
            color: rgba(12, 54, 241, 0.822) !important;
            font-size: 1.6rem !important;
        }
        #data{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .card{
                width:48% !important;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            }
        #data div{
               margin: 10px;
               padding: 10px;
               border: 2px solid black;
               border-radius:30px ;
        }
        .wait{
            text-align:center;
            color:red;
            font-size: 34px;
        }
        .card-body{
            background: #F3B03B;
            text-align:center;
        }
        @media only screen and (max-width:990px){
            #data{display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-content: space-around;
        }
        .card{
                width:90vw !important;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

                
            }
            .card-body,.card-title{
                font-size: 14px !important;
            }
            #data div{
               margin: 10px;
               padding: 10px;
               border: 2px solid black;
               border-radius:30px ;
        }
            .list-group-item{
                font-size: 12px !important;
                
            }
        };
    </style>


<h3 id="apikey" class="apikey" style="">Data Status</h3>
<div id="data" class="wait">Please Wait Data Loading....</div>

</div>


<script>
    let pincode=  prompt("Enter Your Pin Code");

 let pincode1=  document.getElementById("pincode").value=pincode;
 
 
 // let date= prompt("Enter Your Date DD-MM-YYYY");
  
  
  let date=  document.getElementById("date").value;
    // covin.php
function api() {
    xhttp = new XMLHttpRequest();
    xhttp.onprogress=function() {
     //   document.getElementById("apikey").innerText= 'Wait Loading...';
        console.log("Wait Data Loading");
    };
    xhttp.onload = function() {
       let re=this.response;
      let abc= JSON.parse(re);        
        let cen=abc.centers;
        let cenHTML=""
        cen.forEach(function (element) {
            cenHTML +=  `
                        <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Center ID: ${element.center_id} & Pin Code ${element.pincode} <br> Date: ${date}</h5>
                        <p class="card-text">Name: ${element.name}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Address:</b> ${element.address}</li>
                            <li class="list-group-item"><b>block Name: </b>${element.block_name}</li>
                            <li class="list-group-item"><b>district Name:</b> ${element.district_name}</li>
                            <li class="list-group-item"><b>fee_type:</b> ${element.fee_type}</li>
                            <li class="list-group-item"><b>Latitude:</b> ${element.lat}</li>
                            <li class="list-group-item"><b>Longitude:</b> ${element.long}</li>
                            <li class="list-group-item"><b>From:</b> ${element.from} To: ${element.to}</li>
                        </ul>
                        </div>
            `

          console.log(element)
        });
        document.getElementById("data").classList.remove("wait");
      let wait=  document.getElementById("data").innerHTML= cenHTML;

        console.log(abc)
        
    
    }
xhttp.open("GET", `https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin?pincode=${pincode}&date=${date}`, true);

xhttp.onreadystatechange = function () {
  if(xhttp.readyState === XMLHttpRequest.DONE) {
    if (xhttp.status === 0 || (xhttp.status >= 200 && xhttp.status < 400)) {
        document.getElementById("apikey").innerText= 'The Request Has Been Completed Successfully';
      console.log("The request has been completed successfully");
    } else {
        document.getElementById("apikey").innerText= 'Oh no! There has been an error with the request!';
        console.log("Oh no! There has been an error with the request!");
    }
  }
};


xhttp.send();
}
api();
</script>

<?php 
    include 'footer.php';

?>