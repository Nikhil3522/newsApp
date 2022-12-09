<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #allnews{
            display: flex;
            flex-wrap: wrap;
            /* flex-direction: row;
            background-color: black; */
            justify-content: space-between;
        }
        .card{
            border: 1px solid grey;
            width: 380px;
            margin-top: 20px;
            padding: 10px;
            border-radius: 10px;
            background-color: whitesmoke;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            
        }
    </style>
</head>
    <body>
        <h1>Welcome <?php echo $_GET['name'] ?>!</h1>
        <a href='index.php'>
            <input 
                type="submit" 
                class="Signup"
                value="Logout"
            >
        </a>

        <div id="allnews">
            <?php
                $topic = 'Delhi';
                $api = "https://newsapi.org/v2/everything?q=$topic&from=2022-11-09&sortBy=publishedAt&apiKey=2f963f3877834b5ab0e8dd118df5a875";

                $ch = curl_init();
                

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36'
                ));
                
                curl_setopt($ch, CURLOPT_URL, $api);
                
                $result = curl_exec($ch);
                $news = json_decode($result, true);
                

                // exit();
                foreach($news['articles'] as $value) {?> 
                    <div class="card">
                        <img src="<?=$value['urlToImage'] ?>" width="350px"/>
                        <p><b><?=$value['title'] ?></b></p>
                        <a href="<?=$value['url'] ?>">
                            Read more...
                        </a>
                    </div>
            <?php } ?>
        </div>
    </body>
</html>