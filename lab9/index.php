<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб 9</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
    	body {
			font-family: Arial, Helvetica, sans-serif;
			background-image: url('bgr.jpg');
		}

        h1 {
            font-size: 32px;
            text-align: center;
        }

        hr {
            margin: 20px 5px;
        }

        #submit {
			margin-top: 10px;
			width: 150px;
		}	

        .result_hint {
            font-size: 20px;
            margin: 0;
        }

        .result_line {
            font-size: 26px;
            margin: 0;
        }

        .container {                    
			max-width: 1900px;
			margin-top: 15px;
			padding: 40px;
			border-radius: 25px;
			background-color: #F4F6F6;
			box-shadow: 0 0 10px rgba(0,0,0,0.3);
		}

        .form_container {            
            max-width: 400px;
            margin: auto;
        }
    </style>    
</head>
<body>

<div class="container">   
    <div class="main">
        <h1>Графік y=sin(x)</h1>
        <hr>

        <div class="form_container">   
            <form id="form">
                <label for="img_padding">Внутрішній відступ</label>
                <input id="img_padding" type="range" min="0" max="100" value="10" class="form-control"/>

                <label for="img_width">Ширина зображення</label>
                <input id="img_width" type="range" min="200" max="1920" value="1800" class="form-control"/>            

                <label for="img_height">Висота зображення</label>
                <input id="img_height" type="range" min="100" max="1080" value="900" class="form-control"/>    

                <label for="x_visible_divisions">Кількість поділок по X</label>
                <input id="x_visible_divisions" type="range" min="2" max="100" value="40" class="form-control"/>      

                <label for="y_visible_divisions">Кількість поділок по Y</label>
                <input id="y_visible_divisions" type="range" min="2" max="100" value="20" class="form-control"/> 

                <label for="division_size">Розмір поділок</label>
                <input id="division_size" type="range" min="1" max="100" value="10" class="form-control"/>                                                      

                <label for="division_weight_x">Ціна поділки X</label>
                <input id="division_weight_x" type="range" min="5" max="1000" value="100" class="form-control"/>     

                <label for="division_weight_y">Ціна поділки Y</label>
                <input id="division_weight_y" type="range" min="5" max="1000" value="50" class="form-control"/>                                                                                   

                <input type="button" id="submit" class="btn btn-primary" value="Показати"/>   
            </form>                 
        </div>        

        <div id="result_container" style="display: none;">
            <hr>
            <img id="result_image" src="gen_sin_image.php"/>
        </div>
    </div> 
</div>

<script>
    serializeToUrl = function(obj) {
        var str = [];
        for (var p in obj) {
            if (obj.hasOwnProperty(p)) {
                str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
            }
        }
        return str.join("&");
    }

    $("#submit").click(function() {        
        let params = {
            img_padding: $("#img_padding").val(),
            img_width: $("#img_width").val(),
            img_height: $("#img_height").val(),
            x_visible_divisions: $("#x_visible_divisions").val(),
            y_visible_divisions: $("#y_visible_divisions").val(),
            division_size: $("#division_size").val(),
            division_weight_x: $("#division_weight_x").val() / 100,
            division_weight_y: $("#division_weight_y").val() / 100,
        };
        $("#result_image").attr("src", `gen_sin_image.php?${serializeToUrl(params)}`);
        $("#result_container").show();
    });    
</script>

</body>
</html>