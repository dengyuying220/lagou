<?php
namespace Home\Controller;
use Think\Controller;
class PositionController extends Controller {


    /*
    *发布职位
    */
    public function publish_position(){

        // 非空验证
        if(!$_POST['position_name']) {

            $return_data = array();
            $return_data['error_code'] = 1;
            $return_data['msg'] = '请输入职位名称';

            $this->ajaxReturn($return_data);
        }
        if(!$_POST['company_name']) {

            $return_data = array();
            $return_data['error_code'] = 1;
            $return_data['msg'] = '请输入职位名称';

            $this->ajaxReturn($return_data);
        }
        if(!$_POST['salary']) {

            $return_data = array();
            $return_data['error_code'] = 1;
            $return_data['msg'] = '请输入薪资';

            $this->ajaxReturn($return_data);
        }
        if(!$_POST['content']) {

            $return_data = array();
            $return_data['error_code'] = 1;
            $return_data['msg'] = '请输入职位信息';

            $this->ajaxReturn($return_data);
        }
        if(!$_POST['city']) {

            $return_data = array();
            $return_data['error_code'] = 1;
            $return_data['msg'] = '请输入城市';

            $this->ajaxReturn($return_data);
        }
      
    }
}