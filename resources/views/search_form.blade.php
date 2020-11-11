<!DOCTYPE html>
<html>
<head>
		<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
        <script type="text/javascript">

			
            function division_view() // class information
            {
                var division = document.getElementById("division").value;
				
				
                var xmlRequest = GetXmlHttpObject();
                if (xmlRequest == null)
                    return;

                var url = "get_by_division?division_id=" + division;

                var browser = navigator.appName;
                if (browser == "Microsoft Internet Explorer")
                {
                    xmlRequest.open("POST", url, true);
                } else
                {
                    xmlRequest.open("GET", url, true);
                }
                xmlRequest.setRequestHeader("Content-Type", "application/x-www-formurlencoded");
                xmlRequest.onreadystatechange = function ()
                {
                    if (xmlRequest.readyState == 4)
                    {
                        HandleAjaxResponse_division_view(xmlRequest);
                    }
                };
                xmlRequest.send(null);
                return false;
            }

            function HandleAjaxResponse_division_view(xmlRequest)
            {
                var xmlT = xmlRequest.responseText;
                document.getElementById("district_view").innerHTML = xmlT;
				console.log(xmlT);
                return false;
            }
            //OBJECT FUNCTION ////////////////////////
            function GetXmlHttpObject()
            {
                var xmlHttp = null;
                try
                {
                    xmlHttp = new XMLHttpRequest();
                } catch (e)
                {
                    // Internet Explorer
                    try
                    {
                        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e)
                    {
                        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                    }
                }
                return xmlHttp;
            }
            //For upazila
            function district_view() // class information
            {
                var district = document.getElementById("district").value;
                var xmlRequest = GetXmlHttpObject();
                if (xmlRequest == null)
                    return;

                var url = "get_by_district?district_id=" + district;

                var browser = navigator.appName;
                if (browser == "Microsoft Internet Explorer")
                {
                    xmlRequest.open("POST", url, true);
                } else
                {
                    xmlRequest.open("GET", url, true);
                }
                xmlRequest.setRequestHeader("Content-Type", "application/x-www-formurlencoded");
                xmlRequest.onreadystatechange = function ()
                {
                    if (xmlRequest.readyState == 4)
                    {
                        HandleAjaxResponse_district_view(xmlRequest);
                    }
                };
                xmlRequest.send(null);
                return false;
            }

            function HandleAjaxResponse_district_view(xmlRequest)
            {
                var xmlT = xmlRequest.responseText;
                document.getElementById("upazilla_view").innerHTML = xmlT;

                return false;
            }
            //OBJECT FUNCTION ////////////////////////
            function GetXmlHttpObject()
            {
                var xmlHttp = null;
                try
                {
                    xmlHttp = new XMLHttpRequest();
                } catch (e)
                {
                    // Internet Explorer
                    try
                    {
                        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e)
                    {
                        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                    }
                }
                return xmlHttp;
            }

        </script>
</head>
<body>
<div class="box-body">
                                                    <form action="/scrap" method="post">
													@csrf
                                                        <span class="custom_label"><b>Period&nbsp; </b></span>

                                                        <select name="year" id="year" class="custom_input"><option value="">Select Year</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option selected="" value="2020">2020</option><option value="2021">2021</option></select>                                                        <span class="custom_label"><b>Month&nbsp; </b></span>

                                                        <select name="month" id="month" class="custom_input"><option value="">Select Month</option><option selected="" value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select>
                                                        <span class="custom_label"><b>Division&nbsp;</b></span>
                                                        <select name="division" id="division" class="custom_input" onchange="division_view()">
                                                            <option value="">Select</option>
                                                                                                                            <option value="6" selected="">Barisal</option>
                                                                                                                                    <option value="2">Chittagong</option>
                                                                                                                                    <option value="1">Dhaka</option>
                                                                                                                                    <option value="5">Khulna</option>
                                                                                                                                    <option value="8">Mymensingh</option>
                                                                                                                                    <option value="3">Rajshahi</option>
                                                                                                                                    <option value="4">Rangpur</option>
                                                                                                                                    <option value="7">Sylhet</option>
                                                                                                                            </select>
                                                        <span class="custom_label"><b>District&nbsp;</b></span>
                                                        <span id="district_view">
                                                            <select name="district" id="district" class="custom_input" onchange="district_view()">
                                                                <option value="">Select</option>
                                                                                                                                    <option value="55">Barguna</option>
                                                                                                                                            <option value="56">Barisal</option>
                                                                                                                                            <option value="57">Bhola</option>
                                                                                                                                            <option value="58">Jhalakati</option>
                                                                                                                                            <option value="59" selected="">Patuakhali</option>
                                                                                                                                            <option value="60">Perojpur</option>
                                                                                                                                    </select>
                                                        </span>
                                                        <span class="custom_label"><b>Upazila&nbsp;</b></span>
                                                        <span id="upazilla_view">
                                                            <select name="upazila" id="upazila" class="custom_input">
                                                                <option value="">Select Upazila</option>
                                                                                                                                    <option value="28">Bauphal Upazila</option>
                                                                                                                                            <option value="29">Dashmina Upazila</option>
                                                                                                                                            <option value="30">Dumki Upazila</option>
                                                                                                                                            <option value="31">Golachipa Upazila</option>
                                                                                                                                            <option value="32">Kalapara Upazila</option>
                                                                                                                                            <option value="33">Mirzaganj Upazila</option>
                                                                                                                                            <option value="34" selected="">Patuakhali Sadar Upazila</option>
                                                                                                                                    </select>
                                                        </span>


                                                        <input type="submit" name="Submit" value="Search" class="btn btn-success">
                                                    </form>

                                                    <!-- /.direct-chat-pane -->
                                                </div>
												

        <!-- Bootstrap 3.3.6 -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>												
												
	</body>
	</html>