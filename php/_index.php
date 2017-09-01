<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        require_once('phpQuery-onefile.php');
        $url = 'http://www.camarapf.rs.gov.br/alexnecker';
        $html = file_get_contents($url);
        phpQuery::newDocumentHTML($html);
        $resultData = pq('img.team-member-image');

        echo $resultData;
    ?>
</body>
</html>