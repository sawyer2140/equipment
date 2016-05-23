/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-25
 * Time: 上午11:36
 * To change this template use File | Settings | File Templates.
 */

function getCookie(name) {

    var varCookie = document.cookie;

    var cookieStart = varCookie.indexOf("{\"" + name + "");
    var cookieEnd = varCookie.indexOf("};");
    var objCookie;

    if (cookieStart >= 0 && cookieEnd >= 0) {

        objCookie = JSON.parse(varCookie.substring(cookieStart, cookieEnd + 1));

    }

    return objCookie;

}