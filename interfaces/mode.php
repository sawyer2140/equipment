<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-28
 * Time: 下午6:08
 * To change this template use File | Settings | File Templates.
 */

interface mode
{
    const login = "login";

    const getMenu = "getMenu";

    const getEquipments = "getEquipments";

    const getUsers = "getUsers";

    const updateUser = "updateUser";

    const addUser = "addUser";

    const updatePassword = "updatePassword";

    const updateEquipment = "updateEquipment";

    const deleteEquipment = "deleteEquipment";

    const addEquipment = "addEquipment";

    const getCompany = "getCompany";

    const getLogs = "getLogs";

    const expLog = "expLog";
}
