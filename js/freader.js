/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-6-14
 * Time: 下午8:36
 * To change this template use File | Settings | File Templates.
 */
/*!
 FileReader.js - a lightweight wrapper for common FileReader usage.
 Copyright 2012 Brian Grinstead - MIT License.
 See http://github.com/bgrins/filereader.js for documentation.
 Built: 2012-05-26 01:05:36 PM
 */

(function(a, b) {
    function j(a, b) {
        function d(a) {
            var b = [],d = a.clipboardData || {},e = d.items || [];
            for (var f = 0; f < e.length; f++) {
                var g = e[f].getAsFile();
                if (g) {
                    var h = (new RegExp("/(.*)")).exec(g.type);
                    if (!g.name && h) {
                        var i = h[1];
                        g.name = "clipboard" + f + "." + i
                    }
                    b.push(g)
                }
            }
            b.length && (o(b, c),a.preventDefault(),a.stopPropagation())
        }

        if (!h.enabled)return;
        var c = r(r({}, h.opts), b);
        a.addEventListener("paste", d, !1)
    }

    function k(a, b) {
        function d(b) {
            o(a.files, c)
        }

        function e(a) {
            a.stopPropagation(),a.preventDefault(),o(a.dataTransfer.files, c)
        }

        if (!h.enabled)return;
        var c = r(r({}, h.opts), b);
        a.addEventListener("change", d, !1),a.addEventListener("drop", e, !1)
    }

    function l(a, c) {
        function g(a) {
            f = !1
        }

        function i(a) {
            f = !0
        }

        function j(a) {
            a.dataTransfer.files && a.dataTransfer.files.length && (a.stopPropagation(),a.preventDefault())
        }

        function k(a) {
            return function() {
                f || a.apply(this, arguments)
            }
        }

        function l(b) {
            b.stopPropagation(),b.preventDefault(),e && u(a, e),o(b.dataTransfer.files, d)
        }

        function m(b) {
            b.stopPropagation(),b.preventDefault(),e && t(a, e)
        }

        function n(b) {
            e && u(a, e)
        }

        function p(b) {
            b.stopPropagation(),b.preventDefault(),e && t(a, e)
        }

        if (!h.enabled)return;
        var d = r(r({}, h.opts), c),e = d.dragClass,f = !1;
        a.addEventListener("dragenter", k(m), !1),a.addEventListener("dragleave", k(n), !1),a.addEventListener("dragover", k(p), !1),a.addEventListener("drop", k(l), !1),b.body.addEventListener("dragstart", i, !0),b.body.addEventListener("dragend", g, !0),b.body.addEventListener("drop", j, !1)
    }

    function m(a, b) {
        for (var c = 0; c < a.length; c++) {
            var d = a[c];
            d.extra = {nameNoExtension:d.name.substring(0, d.name.lastIndexOf(".")),extension:d.name.substring(d.name.lastIndexOf(".") + 1),fileID:c,uniqueID:x(),groupID:b,prettySize:v(d.size)}
        }
    }

    function n(a, b, c) {
        for (var d in b)if (a.match(new RegExp(d)))return"readAs" + b[d];
        return"readAs" + c
    }

    function o(a, b) {
        function k() {
            j.ended = new Date,b.on.groupend(j)
        }

        function l() {
            --f == 0 && k()
        }

        var f = a.length,j = {groupID:w(),files:a,started:new Date};
        h.output.push(j),m(a, j.groupID),b.on.groupstart(j);
        if (!a.length) {
            k();
            return
        }
        var o = h.sync && d,p;
        o && (p = i.getWorker(e, function(a) {
            var c = a.data.file,d = a.data.result;
            c.extra || (c.extra = a.data.extra),b.on[d === "error" ? "error" : "load"]({target:{result:d}}, c),l()
        })),Array.prototype.forEach.call(a, function(a) {
            if (b.accept && !a.type.match(new RegExp(b.accept))) {
                b.on.skip(a),l();
                return
            }
            if (b.on.beforestart(a) === !1) {
                b.on.skip(a),l();
                return
            }
            var d = n(a.type, b.readAsMap, b.readAsDefault);
            if (o && p)p.postMessage({file:a,extra:a.extra,readAs:d}); else {
                var e = new c;
                g.forEach(function(c) {
                    e["on" + c] = function(d) {
                        b.on[c](d, a),c == "loadend" && l()
                    }
                }),e[d](a)
            }
        })
    }

    function p() {
        var a = i.getWorker(f, function(a) {
            d = a.data
        });
        a && a.postMessage()
    }

    function q() {
    }

    function r(a, b) {
        for (var c in b)b[c] && b[c].constructor && b[c].constructor === Object ? (a[c] = a[c] || {},arguments.callee(a[c], b[c])) : a[c] = b[c];
        return a
    }

    function s(a, b) {
        return(new RegExp("(?:^|\\s+)" + b + "(?:\\s+|$)")).test(a.className)
    }

    function t(a, b) {
        s(a, b) || (a.className = a.className ? [a.className,b].join(" ") : b)
    }

    function u(a, b) {
        if (s(a, b)) {
            var c = a.className;
            a.className = c.replace(new RegExp("(?:^|\\s+)" + b + "(?:\\s+|$)", "g"), " ").replace(/^\s\s*/, "").replace(/\s\s*$/, "")
        }
    }

    function v(a) {
        var b = ["bytes","kb","MB","GB","TB","PB"],c = Math.floor(Math.log(a) / Math.log(1024));
        return(a / Math.pow(1024, Math.floor(c))).toFixed(2) + " " + b[c]
    }

    var c = a.FileReader,d = !1,e = "self.addEventListener('message', function(e) { var data=e.data; try { var reader = new FileReaderSync; postMessage({ result: reader[data.readAs](data.file), extra: data.extra, file: data.file})} catch(e){ postMessage({ result:'error', extra:data.extra, file:data.file}); } }, false);",f = "self.addEventListener('message', function(e) { postMessage(!!FileReaderSync); }, false);",g = ["loadstart","progress","load","abort","error","loadend"],h = a.FileReaderJS = {enabled:!1,setupInput:k,setupDrop:l,setupClipboard:j,sync:!1,output:[],opts:{dragClass:"drag",accept:!1,readAsDefault:"BinaryString",readAsMap:{"image/*":"DataURL","text/*":"Text"},on:{loadstart:q,progress:q,load:q,abort:q,error:q,loadend:q,skip:q,groupstart:q,groupend:q,beforestart:q}}};
    typeof jQuery != "undefined" && (jQuery.fn.fileReaderJS = function(a) {
        return this.each(function() {
            $(this).is("input") ? k(this, a) : l(this, a)
        })
    },jQuery.fn.fileClipboard = function(a) {
        return this.each(function() {
            j(this, a)
        })
    });
    if (!c)return;
    var i = function() {
        function d(d) {
            if (a.Worker && c && b) {
                var e = new c;
                return e.append(d),b.createObjectURL(e.getBlob())
            }
            return null
        }

        function e(a, b) {
            var c = d(a);
            if (c) {
                var e = new Worker(c);
                return e.onmessage = b,e
            }
            return null
        }

        var b = a.URL || a.webkitURL,c = a.BlobBuilder || a.WebKitBlobBuilder || a.MozBlobBuilder;
        return{getURL:d,getWorker:e}
    }(),w = function(a) {
        return function() {
            return a++
        }
    }(0),x = function(a) {
        return function() {
            return a++
        }
    }(0);
    h.enabled = !0,p()
})(this, document);