<?php

include 'soldier.php';

header("content-type:text/html;charset=utf-8");

/*echo "获取页面传来的参数";
$id=$_GET['id'];
$cvc=$_GET['cvc'];
$rarity=$_GET['rarity'];
$quality=$_GET['quality'];
*/


class Main{

    /**
     * 解析json文件并整理格式且只保留有用的数据，生成新的json文件
     */
public static function setNewJsonArray(){
    // 从文件中读取数据到PHP变量
    $json_string = file_get_contents('json/config.army.model.json');
    // 用参数true把JSON字符串强制转成PHP数组
    $data = json_decode($json_string, true);
    $myarray=array();
    foreach ($data as $x=>$x_values){
        $soldier=new soldierClass($data[$x]['id'],$data[$x]['Rarity'],$data[$x]['CombatPoints'],$data[$x]['Quality'],$data[$x]['Cvc']);
        array_push($myarray,$soldier);
    }
    //print_r($myarray);
    try {
        file_put_contents('json/newconfig.army.model.json',json_encode($myarray));
    }catch (Exception $e){
        echo $e->getMessage();
    }

}

    /**
     * 解析新的json文件返回数组
     * @return mixed
     */
function getJsonArray(){
    // 从文件中读取数据到PHP变量
    $json_string = file_get_contents('json/newconfig.army.model.json');
    // 用参数true把JSON字符串强制转成PHP数组
    $data = json_decode($json_string, true);
    return $data;
}


}



?>
