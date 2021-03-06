<?php
// require_once './include/student.function.php';
require_once './include/c.function.php';
    if(isset($_GET['action_type']))
    {
        $action_type = $_GET['action_type'];
    }
    else {
        Result::error('wrong action_type');
    }
    // var_dump('token');
    // var_dump($_GET['token']);
    $page_num = isset($_GET['page_num'])?$_GET['page_num']:10;
    $page = isset($_GET['page'])?$_GET['page']:1;
    switch($action_type)
    {

        case 'get_c':
            $Cpno = isset($_GET['Cpno'])?$_GET['Cpno']:'';
            $Cname = isset($_GET['Cname'])?$_GET['Cname']:'';
            $result = get_c($page,$page_num,$Cpno,$Cname);
            break;

        case 'search_c':
            if(isset($_GET['word']))
            {
                $word = $_GET['word'];
                $result = search_c($word);
            }else {
                Result::error('missing parameter');
            }
            break;
        case 'insert_c':
            if(isset($_GET['Cno'],$_GET['Cname'],$_GET['Cpno'],$_GET['Ccredit']))
            {
                $Cno = $_GET['Cno'];
                $Cname = $_GET['Cname'];
                $Cpno = $_GET['Cpno'];
                $Ccredit = $_GET['Ccredit'];

                $result = insert_c($Cno,$Cname,$Cpno,$Ccredit);
            } else {
                Result::error('missing parameter');
            }
            break;
        case 'update_c':
            if(isset($_GET['Cno'],$_GET['Cname'],$_GET['Cpno'],$_GET['Ccredit']))
            {
                $Cno = $_GET['Cno'];
                $Cname = $_GET['Cname'];
                $Cpno = $_GET['Cpno'];
                $Ccredit = $_GET['Ccredit'];
                $result = update_c($Cno,$Cname,$Cpno,$Ccredit);
            } else {
                Result::error('missing parameter');
            }
            break;
        case 'delete_c':
            if(isset($_GET['Cno']))
            {
                $Cno = $_GET['Cno'];
                $result = delete_c($Cno);
            } else {
                Result::error('missing parameter');
            }
            break;
        case 'get_cpno':
            $result = get_cpno();
            break;
    }
    Result::success($result);