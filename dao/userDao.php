<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-3-13
 * Time: 下午1:20
 * To change this template use File | Settings | File Templates.
 */
include_once(dirname(__FILE__) . "/../interfaces/status.php");
include_once(dirname(__FILE__) . "/connect.php");
include_once(dirname(__FILE__) . "/../model/user.php");
include_once(dirname(__FILE__) . "/../model/result.php");
class userDao
{

    public function  login($user)
    {
        $query = ("select id,userName,signDate,lastLoginDate,identity from user_info where loginName ='" .
                  $user->getLoginName() . "' and passWord = '" . $user->getPassword() . "'");

       // echo $query;
        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query($query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        if ($result->getStatus() == status::success) {
            if ($row = mysql_fetch_array($resultSet)) {

                $user->setId($row[0]);
                $user->setUserName($row[1]);
                $user->setSignDate($row[2]);
                $user->setLastLoginDate($row[3]);
                $user->setIdentity($row[4]);

                $result->setDatas($user);

                mysql_query("update user_info set lastLoginDate = '" . date("Y-m-d H:i:s") . "' where id = " . $user->getId());

            }
        }
        mysql_close();
        return $result;

    }

    public function update($user)
    {
        $query = "update user_info set " .
                 "loginName = '" . $user->getLoginName() . "' ,userName = '" . $user->getUserName() . "',identity = " . $user->getIdentity() .
                 " where id = " . $user->getId();

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query($query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        mysql_close();
        return $result;
    }

    public function add($user)
    {

        $query = "insert into user_info(loginName,userName,identity,passWord) " .
                 "values ('" . $user->getLoginName() . "','" . $user->getUserName() . "'," . $user->getIdentity() . ",'" . $user->getPassWord() . "')";

        $conn = new connect();
        $conn->getConnect();

        // echo $query;
        $resultSet = mysql_query($query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        mysql_close();
        return $result;
    }

    /**
     * @param $user
     * @return result
     * 查询用户的密码
     */
    public function findPwdByUser($user)
    {
        $query = "select passWord from user_info where id=" . $user->getId();
        $conn = new connect();
        $conn->getConnect();
        $resultSet = mysql_query($query);
        $result = new result();

        if ($resultSet) {
            $result->setStatus(status::success);
        } else {
            $result->setStatus(status::failed);
        }
        if ($result->getStatus() == status::success) {
            $userArray = array();
            if ($row = mysql_fetch_row($resultSet)) {
                $user->setPassword($row[0]);
            }
            $result->setDatas($user);
        }
        mysql_close();
        return $result;
    }

    /**
     * @param $user
     * @return result
     * 修改用户密码
     */
    public function  updatePwd($user)
    {
        $query = "update user_info set
                    passWord = '" . $user->getPassWord() . "' where id=" . $user->getId();

        //连接数据库
        $conn = new connect();
        $conn->getConnect();

        //执行sql语句
        $resultSet = mysql_query($query);

        //对执行结果进行判断并返回
        $result = new result();
        if ($resultSet) {
            $result->setStatus(status::success);
        }
        else {
            $result->setStatus(status::failed);
        }
        mysql_close();
        return $result;
    }

}
