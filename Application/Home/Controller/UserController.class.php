<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

    /*
    *管理员登录
    */
    public function signIn(){

      // 非空验证
      if(!$_POST['username']) {

        $return_data = array();
        $return_data['error_code'] = 1;
        $return_data['msg'] = '请输入用户名';

        $this->ajaxReturn($return_data);
      }
      if(!$_POST['password']) {

        $return_data = array();
        $return_data['error_code'] = 1;
        $return_data['msg'] = '请输入密码';

        $this->ajaxReturn($return_data);
      }

      // 用户查询
      $User = M('t_user');

      $where = array();
      $where['username'] = $_POST['username'];

      
      $user = $User->where($where)->find();

      if($user){
        
        // 密码验证
        // dump($user);
        if(md5($_POST['password']) != $user['password']){

          $return_data = array();
          $return_data['error_code'] = 3;
          $return_data['msg'] = '密码错误';

          $this->ajaxReturn($return_data);
        }
        else{
          
          $return_data = array();
          $return_data['error_code'] = 0;
          $return_data['msg'] = '登录成功';

          $return_data['data']['id'] = $user['id'];
          $return_data['data']['nickname'] = $user['nickname'];
          $return_data['data']['email'] = $user['email'];
          $return_data['data']['avatar'] = $user['avatar'];

          $this->ajaxReturn($return_data);
        }
      }
      else{
        $return_data = array();
        $return_data['error_code'] = 2;
        $return_data['msg'] = '用户名错误';

        $this->ajaxReturn($return_data);
      }
    }


    /*
    *管理员初始化
    */
    public function insert_user(){
      
      $User = M('t_user');

      $data = array();
      $data['id'] = 1;
      $data['username'] = 'deng';
      $data['password'] = 'b0baee9d279d34fa1dfd71aadb908c3f';
      $data['nickname'] = '邓渝蓥';
      $data['mail'] = '18208214305@163.com';
      
      // $result = $User->add($data);
      // var_dump($result);
      var_dump($User->getLastSql());
    }
}