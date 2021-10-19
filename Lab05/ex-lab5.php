<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Document</title>
        
        <style>
            .header {
                width: 100%;
                height: 50px;
                font-size: 30px;
                text-align:center;
                margin-top: 10px;
                margin-bottom: 10px;
            }
            
            .body {
                min-height: 600px;
                width: 100%;
                margin: 0;
                padding: 10px;
                display: flex;
            }
            
            .footer {
                width: 100%;
                font-size: 20px;
                color: gray;
                text-align: center;
            }
            
            textarea {
                display: block;
                padding: 0.375rem 0.75rem;
                font-weight: 400;
                line-height: 1.5;
                border: 1px solid #ced4da;
                appearance: none;
                border-radius: 0.25rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                margin-bottom: 20px;
                min-height: 300px;
            }

            input {
                display: block;
                padding: 0.375rem 0.75rem;
                font-weight: 400;
                line-height: 1.5;
                border: 1px solid #ced4da;
                appearance: none;
                border-radius: 0.25rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                margin-bottom: 20px;
            }

            label {
                margin-bottom: 8px;
                display: block;
                background-color: pink;
                border-radius: 0.45rem;
                line-height: 1.5;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
            class Page {
                private $page;
                private $title;
                private $year;
                private $copyright;

                function __construct($title, $year, $copyright){
                    $this->title = $title;
                    $this->year = $year;
                    $this->copyright = $copyright;
                }

                private function addHeader() {
                    $header = '<div class="header"> '.$this->title.' </div><hr><hr>';
                    $this->page .= $header ;
                }

                public function addContent($content) {
                    $this->addHeader();
                    $bodyContent = '<div class="body"> '.$content.' </div>';
                    $this->page .= $bodyContent;
                    $this->addFooter();
                }

                private function addFooter() {
                    $footer = '<hr><hr><div class="footer" style="height: 30px; display: flex; align-items: center; justify-content:center;">
                    <div> Copyright: '.$this->copyright.' - '.$this->year.'</div>
                    </div>
                    ';
                    $this->page .= $footer;
                }

                public function get() {
                    return ($this->page);
                }
            }
        ?>

        <div style="display: flex; align-items: flex-start;">
            <?php
                if (array_key_exists("start", $_GET)){
                    $title = $_GET["title"];
                    $copyright = $_GET["copyright"];
                    $year = $_GET["year"];
                    $content = $_GET["content"];
                } else { 
                    $title = '';
                    $copyright = '';
                    $year = '';
                    $content = '';
                }
            ?>
            <form action="" method="GET">
                <div>
                    <div style="margin-bottom: 20px;">
                        <label label>Page's title</label>

                        <?php  
                            print('<input type="text" name="title" required value="'. $title .'"></input>');
                        ?>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label label>Copyright information:</label>
                        
                        <?php  
                            print('<input type="text" name="copyright" required value="'. $copyright .'"></input>');
                        ?>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label label>Publicized year</label>

                        <?php  
                            print('<input type="number" name="year" required value="'. $year .'"></input>');
                        ?>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label label>Page's content</label>

                        <?php  
                            print('<textarea type="text" name="content" required>'. $content .'</textarea>');
                        ?>
                    </div>

                    <div>
                        <input type="submit" name="start" value="Submit" style="width: 100%; background-color: #91d98b;"></input>
                        
                        <input type="reset" value="Clear" style="width: 100%;background-color: #cc838a"></input>
                    </div>
                </div>
            </form>
            
            <div style="flex: 1; margin-left: 30px; border: 1px solid #333;">
                <?php
                    $page = new Page($title, $year, $content);
                    $page->addContent($content);
                    echo $page->get();
                ?>
            </div>
        </div>
    </body>
</html>