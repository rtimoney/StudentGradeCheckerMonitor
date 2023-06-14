<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

//if (($_SERVER['REQUEST_METHOD']==='GET') && isset(($_GET['input_text']))) {

//$requrl= "http://localhost:120?input_text=module,400";
//$requrl= "http://localhost:120";

//$requrl = urlencode($requrl);




 // http://classification.40103299.qpc.hal.davecutting.uk/

$totalURL = "http://totalfivek.40103299.qpc.hal.davecutting.uk/";
$maxminURL = "http://maxmin-40103299.40103299.qpc.hal.davecutting.uk/";
$sortedModulesURL = "http://sort.40103299.qpc.hal.davecutting.uk/";

$this_directory = dirname(__FILE__);

$filename = $this_directory . "/log.txt";

monitoringClassification1();
//monitoringMaxMin1();
//monitoringTotal1();
//monitoringSort1();



function monitoringClassification1(){

echo "Monitoring Classification : \n";
echo "\n";
$classificationURL = 'http://classification.40103299.qpc.hal.davecutting.uk/?input_text=databases,500newlineprogramming=99newlinecloudcomputing,100newlinesoftwareengineering,99';
echo "URL : ".$classificationURL."\n";

echo "\nCan we contact this service at all? \n";
echo "\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $classificationURL);
curl_setopt($ch, CURLOPT_HEADER, true);	
curl_setopt($ch, CURLOPT_NOBODY, true);   
if ($ch === false){
    throw new Exception('failed to initialize');
}
$content = curl_exec($ch);
$info = curl_getinfo($ch);
echo "Request took ".$info['total_time']." seconds";
echo "\n";
echo "\nHTTP code ".$info['http_code'];
//if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
if ($content === false) {echo curl_error($ch).curl_errno($ch);}
curl_close($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $classificationURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$content = curl_exec($ch);
$expected = '{"error":false,"string":"databases,500newlineprogramming=99newlinecloudcomputing,100newlinesoftwareengineering,99=Distinction","answer":"Distinction"}';
if ($ch === false){throw new Exception('failed to initialize');}
$content = curl_exec($ch);


file_put_contents($filename, $content);


if($content == $expected){

    

    echo "\n YES - SERVICE IS WORKING AS EXPECTED \n";
    

}else{

    echo "\nUNEXPECTED RESPONSE\nWe expected     : ".$expected."\nActual response: ".$content."\n";

}

//echo $content;

$info = curl_getinfo($ch);
if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
curl_close($ch);

echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
    
}


function monitoringMaxMin1(){

    echo "Monitoring Highest & Lowest Modules (Max-Min) : \n";
    echo "\n";
    echo "\n";
    $URL = 'http://maxmin-40103299.40103299.qpc.hal.davecutting.uk/?input_text=databases,500newlineprogramming,99newlinecloudcomputing,100newlinesoftwareengineering,99';
    echo "URL : ".$URL."\n";

    echo "\nCan we contact this service at all? \n";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_HEADER, true);	
    curl_setopt($ch, CURLOPT_NOBODY, true);   
    if ($ch === false){
        throw new Exception('failed to initialize');
    }
    $content = curl_exec($ch);
    $info = curl_getinfo($ch);
    echo "Request took ".$info['total_time']." seconds";
    echo "\n";
    echo "\nHTTP code ".$info['http_code'];
    if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    $expected = '{"error":false,"string":"databases,500newlineprogramming,99newlinecloudcomputing,100newlinesoftwareengineering,99=databases, 500newlinesoftwareengineering, 99","answer":"databases, 500newlinesoftwareengineering, 99"}';
    if ($ch === false){throw new Exception('failed to initialize');}
    $content = curl_exec($ch);
    

    echo "\nIs this service working as we expected ? \n";

    if($content == $expected){
    
        echo "\n YES - SERVICE IS WORKING AS EXPECTED \n";
    
    }else{
    
        echo "\nUNEXPECTED RESPONSE\nWe expected     : ".$expected."\nActual response: ".$content."\n";
    
    }
    
    //echo $content;
    
    $info = curl_getinfo($ch);
    if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
    curl_close($ch);
    
    echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
    echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
    
    }

    function monitoringTotal1(){

        echo "Monitoring Total Marks : \n";
        echo "\n";
        echo "\n";
        $URL = 'http://totalfivek.40103299.qpc.hal.davecutting.uk/?input_text=databases,500newlineprogramming,99newlinecloudcomputing,100newlinesoftwareengineering,99';
        echo "URL : ".$URL."\n";
    
        echo "\nCan we contact this service at all? \n";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_HEADER, true);	
        curl_setopt($ch, CURLOPT_NOBODY, true);   
        if ($ch === false){
            throw new Exception('failed to initialize');
        }
        $content = curl_exec($ch);
        $info = curl_getinfo($ch);
        echo "Request took ".$info['total_time']." seconds";
        echo "\n";
        echo "\nHTTP code ".$info['http_code'];
        if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
        curl_close($ch);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        $expected = '{"answer":798,"error":"false","string":""}';
        if ($ch === false){throw new Exception('failed to initialize');}
        $content = curl_exec($ch);

        $similarity = similar_text($expected,$content, $percentage);
        echo "\nIs this service working as we expected ? \n";
    
        if($percentage > 95){
        
            echo "\n YES - SERVICE IS WORKING AS EXPECTED \n";
        
        }else{
        
            echo "\nUNEXPECTED RESPONSE\nWe expected     : ".$expected."\nActual response: ".$content."\n";
        
        }
        
        
        $info = curl_getinfo($ch);
        if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
        curl_close($ch);
        
        echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
        echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
    
        }



        
function monitoringSort1(){

    echo "Monitoring Classification : \n";
    echo "\n";
    $URL = 'http://sort.40103299.qpc.hal.davecutting.uk/?input_text=databases,500newlineprogramming=99newlinecloudcomputing,100newlinesoftwareengineering,99';
    echo "URL : ".$URL."\n";
    
    echo "\nCan we contact this service at all? \n";
    echo "\n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_HEADER, true);	
    curl_setopt($ch, CURLOPT_NOBODY, true);   
    if ($ch === false){
        throw new Exception('failed to initialize');
    }
    $content = curl_exec($ch);
    $info = curl_getinfo($ch);
    echo "Request took ".$info['total_time']." seconds";
    echo "\n";
    echo "\nHTTP code ".$info['http_code'];
    if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    $expected = '{"error":false,"string":"databases,500newlineprogramming=99newlinecloudcomputing,100newlinesoftwareengineering,99=databases, 500newlinecloudcomputing, 100newlinesoftwareengineering, 99newlineprogramming=99, newline","answer":"databases, 500newlinecloudcomputing, 100newlinesoftwareengineering, 99newlineprogramming=99, newline"}';
    if ($ch === false){throw new Exception('failed to initialize');}
    $content = curl_exec($ch);
    
    
    
    if($content == $expected){
    
        
    
        echo "\n YES - SERVICE IS WORKING AS EXPECTED \n";
        
    
    }else{
    
        echo "\nUNEXPECTED RESPONSE\nWe expected     : ".$expected."\nActual response: ".$content."\n";
    
    }
    
    
    $info = curl_getinfo($ch);
    if ($content === false) {throw new Exception(curl_error($ch), curl_errno($ch));}
    curl_close($ch);
    
    echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
    echo"\n--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
    
    }
    




?>