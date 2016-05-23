/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-21
 * Time: 下午3:50
 * To change this template use File | Settings | File Templates.
 */

//function getPage(count, startNum,pageNum ) {
//
//    var pageSum = $("<a>");
//    pageSum.attr("href", "#");
//    pageSum.append("共 ", $("<Strong>").text(count), " 条");
//
//    var liNums = $("<li>");
//    liNums.addClass("disabled");
//    liNums.html(pageSum);
//
//    var ulNums = $("<ul>").html(liNums);
//
//    var pages = count % pageNum == 0 ? count / pageNum : Math.floor(count / pageNum) + 1;
//    var activeNum = startNum;
//
//    var countPage;
//    if ((pages - startNum) >= 5) {
//        countPage = startNum + 5;
//    } else {
//        countPage = pages + 1;
//        startNum = (countPage - 5) <= 0 ? 1 : countPage - 5;
//    }
//
//    var aBefore = $("<a>");
//    if ((activeNum - 1) > 0) {
//        aBefore.attr("href", "sss");//toPages(activeNum - 1));
//    }
//
//    aBefore.append($("<i>").addClass("icon-chevron-left"), $("<Strong>").text("上一页"))
//    var liBefore = $("<li>");
//    if ((activeNum - 1) <= 0) {
//        liBefore.addClass("disabled");
//    }
//    liBefore.html(aBefore);
//
//    var ulPages = $("<ul>").html(liBefore);
//
//    for (var i = startNum; i < countPage; i++) {
//        var liPages = $("<li>");
//        if (activeNum == i) {
//            liPages.attr("active");
//        }
//
//        var a = $("<a>").text(i);
//        a.attr("href","sss");
//
//        ulPages.append(liPages.html(a));//toPages(i)).html(i)));
//    }
//    var aNext = $("<a>");
//    if (activeNum != pages) {
//        aNext.attr("href","sss");//toPages(activeNum+1));
//    }
//    aNext.html($("<Strong>").text("下一页"), $("<i>").addClass("icon-chevron-right"));
//
//    var liNext = $("<li>");
//    if (activeNum == pages) {
//        liNext.addClass("disabled");
//    }
//    liNext.html(aNext);
//
//    ulPages.append(liNext);
//
//    var divPage = $("<div>").append(ulNums, ulPages);
//    divPage.addClass("pagination pull-right");
//
//    return divPage;
//
//}

function getPagination(count, startNum, pageNum) {

    //pages sum's view start
    var pageSum = $("<a>");
    pageSum.attr("href", "#");
    pageSum.append("共 ", $("<Strong>").text(count), " 条");

    var liSum = $("<li>");
    liSum.addClass("disabled");
    liSum.html(pageSum);

    var ulSum = $("<ul>").html(liSum);

    //pages sum's view end

    var pages = count % pageNum == 0 ? count / pageNum : Math.floor(count / pageNum) + 1;
    var activeNum = startNum;

    var countPage;
    if ((pages - startNum) >= 5) {
        countPage = startNum + 5;
    } else {
        countPage = pages + 1;
        startNum = (countPage - 5) <= 0 ? 1 : countPage - 5;
    }

    var aBefore = $("<a>");
    if ((activeNum - 1) > 0) {
        aBefore.attr("href", "javascript:gotoPage(" + (activeNum - 1) + ")");//toPages(activeNum - 1));
    }

    aBefore.append($("<i>").addClass("icon-chevron-left"), $("<Strong>").text("上一页"))
    var liBefore = $("<li>");
    if ((activeNum - 1) <= 0) {
        liBefore.addClass("disabled");
    }
    liBefore.html(aBefore);

    var ulPages = $("<ul>").html(liBefore);

    for (var i = startNum; i < countPage; i++) {
        var liPages = $("<li>");
        if (activeNum == i) {
            liPages.addClass("active");
        }

        var a = $("<a>").text(i);
        a.attr("href", "javascript:gotoPage(" + i + ")");

        ulPages.append(liPages.html(a));//toPages(i)).html(i)));
    }
    var aNext = $("<a>");
    if (activeNum != pages) {
        aNext.attr("href", "javascript:gotoPage(" + (activeNum + 1) + ")");//toPages(activeNum+1));
    }
    aNext.append($("<Strong>").text("下一页"), $("<i>").addClass("icon-chevron-right"));

    var liNext = $("<li>");
    if (activeNum == pages) {
        liNext.addClass("disabled");
    }
    liNext.html(aNext);

    ulPages.append(liNext);

    var divPage = $("<div>").append(ulSum, ulPages);
    divPage.addClass("pagination pull-right");

    $("#pages").html(divPage);

}
