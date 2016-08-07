(function (window, undefined) {
    var util = {};
    /**
     * ����¼�
     * @param element
     * @param event
     * @param listener
     */
    util.addEvent = function (element, event, listener) {
        if (element.addEventListener) { //��׼
            element.addEventListener(event, listener, false);
        } else if (element.attachEvent) { //�Ͱ汾ie
            element.attachEvent("on" + event, listener);
        } else { //�����е����
            element["on" + event] = listener;
        }
    };
    /**
     * �¼�����
     * @param element
     * @param tag
     * @param eventName
     * @param listener
     */
    util.delegateEvent = function (element, tag, eventName, listener) {
        util.addEvent(element, eventName, function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement;
            if (target && target.tagName === tag.toUpperCase()) {
                listener.call(target, event);
            }
        });
    };
    /**
     * �Ƴ��¼�
     * @param element
     * @param event
     * @param listener
     */
    util.removeEvent = function (element, event, listener) {
        if (element.removeEventListener) { //��׼
            element.removeEventListener(event, listener, false);
        } else if (element.detachEvent) { //�Ͱ汾ie
            element.detachEvent("on" + event, listener);
        } else { //�����е����
            element["on" + event] = null;
        }
    };
    /**
     * ��ȡ�¼�����
     * @param event
     * @returns {*|Event}
     */
    util.getEvent = function (event) {
        return event || window.event;
    };
    /**
     * ��ֹĬ����Ϊ
     * @param event
     */
    util.preventDefault = function (event) {
        var event = util.getEvent(event);
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }
    };
    /**
     * ��ȡ����ֵ
     * @param obj
     * @param attribute
     * @returns {*}
     */
    util.getCss = function (obj, attribute) {
        if (obj.currentStyle) {//ֻ��IE֧��currentStyle�����ж��Ƿ���IE�������IE8�����²���opacity��IE9�����ϡ�FF��Chrome����ʹ��opacity��filter: alpha(opacity=30)����IE10�����ϡ�FF��Chrome������ʶ��IE9������֧��
            return obj.currentStyle[attribute];//��IE������򷵻ص�ǰԪ�صĶ�Ӧ���Ե�ֵ
        } else {
            return getComputedStyle(obj, false)[attribute];//IE9�����ϻ��߷�IE���������FF��Chrome֧��getComputedStyle
        }
    };
    util.Gsc = {
        getid: function (id) {
            return /#/.test(id) ? document.querySelector(id) : document.getElementById(id);
        },
        getclass: function (classname) {
            return /./.test(classname) ? document.querySelector(classname) : document.getElementsByClassName(classname)[0];
        },
        newElement: function (tag) {
            return document.createElement(tag);
        },
        addAttr: function (dom, attr, value) {
            dom[attr] = value;
        },
        addChild: function (dom, child) {
            dom.appendChild(child);
        },
        html: function (dom, value) {
            dom.innerHTML = value;
        }
    };
    window.util = util;
})(window, undefined);