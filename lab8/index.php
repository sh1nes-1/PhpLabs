<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб 8</title>
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

        #calc_minutes {
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
			max-width: 1200px;
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
        <h1>Дізнатись скільки ви прожили хвилин</h1>
        <hr>

        <div class="form_container">        
            <label for="birthday">Введіть вашу дату народження</label>
            <input type="datetime-local" id="birthday" name="birthday" class="form-control"/>
            <div id="birthday_error" class="invalid-feedback"></div> 

            <input type="button" id="calc_minutes" class="btn btn-primary" value="Порахувати"/>            
            
            <div id="result_container" style="display: none;">
                <hr>
                <p class="result_hint">Всього ви прожили: </p>
                <p class="result_line"><span id="result"></span> хвилин</p>
            </div>
        </div>
    </div> 
</div>

<script>
    $("#birthday").change(() => $("#result_container").hide());

    $("#calc_minutes").click(        
        function() {
            $.getJSON("get_minutes.php", {
                    'birthday': $("#birthday").val()
                })
                .done(
                    function(data) {
                        if (data.error) {
                            $("#result_container").hide();
                            $("#birthday").addClass("is-invalid");
                            $("#birthday_error").text(data.error_msg);
                        } else {
                            $("#birthday").removeClass("is-invalid");
                            $("#result").text(data.minutes);
                            $("#result_container").show();
                        }
                    }
                )
                .fail(() => console.error("Failed to load get_minutes.php"));            
        }
    );
</script>
</body>
</html>