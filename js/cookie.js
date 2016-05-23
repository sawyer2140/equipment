/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-25
 * Time: 上午11:36
 * To change this template use File | Settings | File Templates.
 */

function getCookie(name) {

    var varCookie = document.cookie;

    var cookieStart = -1;
    var cookieEnd = -1;

    if (varCookie.indexOf("PHPSESSID") == 0) {

        cookieStart = varCookie.indexOf(";") + 1;
        cookieEnd = varCookie.length;

    } else {

        cookieStart = 0;
        cookieEnd = varCookie.indexOf("PHPSESSID") - 2;

    }

    var objCookie;

    if (cookieStart >= 0 && cookieEnd >= 0) {

        objCookie = JSON.parse(varCookie.substr(cookieStart,cookieEnd));

    }

    return objCookie;

}