<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-17
 * Time: 下午3:10
 * To change this template use File | Settings | File Templates.
 */
include_once(dirname(__FILE__) . "/../interfaces/status.php");
include_once(dirname(__FILE__) . "/connect.php");
include_once(dirname(__FILE__) . "/../model/user.php");
include_once(dirname(__FILE__) . "/../model/users.php");
include_once(dirname(__FILE__) . "/../model/result.php");
class usersDao
{
    public function findUsers($users)
    {

        $query = " where 1=1";

        if ($users->getLoginName()) {
            $query .= " and loginName like '%" . $users->getLoginName() . "%'";
        }
        if ($users->getUserName()) {
            $query .= " and userName like '%" . $users->getUserName() . "%'";
        }

        $limitStr = " limit " . ($users->getStartNum() - 1) * ($users->getLimitNum()) . "," . $users->getLimitNum();

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query(" select id,loginName,userName,signDate,lastLoginDate,identity " .
                                 " from user_info" . $query . $limitStr);

        $result = new result();
        if ($resultSet) {
            $result->setStatus(status::success);
        } else {
            $result->setStatus(status::failed);
        }

        if ($result->getStatus() == status::success) {

            $userArray = array();
            $i = 0;
            while ($row = mysql_fetch_row($resultSet)) {

                $user = new user();
                $user->setId($row[0]);
                $user->setLoginName($row[1]);
                $user->setUserName($row[2]);
                $user->setSignDate($row[3]);
                $user->setLastLoginDate($row[4]);
                $user->setIdentity($row[5]);

                $userArray[$i] = $user;

                $i++;
            }
            $users->setUser($userArray);
            $result->setDatas($users);
        }
        mysql_close();

        return $result;
    }

    public function findUsersCount($users)
    {

        $query = " where 1=1";

        if ($users) {
            if ($users->getLoginName()) {
                $query .= " and loginName like '%" . $users->getLoginName() . "%'";
            }
            if ($users->getUserName()) {
                $query .= " and userName like '%" . $users->getUserName() . "%'";
            }
        }

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query(" select count(id) from user_info" . $query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        if ($result->getStatus() == status::success) {

            if ($row = mysql_fetch_row($resultSet)) {

                $users->setCount($row[0]);

            }

            $result->setDatas($users);

        }
        mysql_close();

        return $result;
    }

}
