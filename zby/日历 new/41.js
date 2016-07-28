/*
* 此控件便捷函数
* */

pub={
    $:function(arg,context){
        var tagAll,
            n,
            eles=[],
            i,
            sub=arg.substring(1);//除去第一个字符
            context=context||document;//若没有上下文 则换成document
            if(typeof arg=='string'){
                switch (arg.charAt(0)){
                    case '#':
                        return document.getElementById(sub);
                        break;
                    case '.':
                        if(context.getElementsByClassName(sub)){
                            return context.getElementsByClassName(sub);
                        }
                        tagAll=pub.$('*',context);//获取所有元素
                        n=tagAll.length;
                        for (var i=0;i<n;i++){//若不支持 getElementByClassName 检查所有的classname
                            if(tagAll[i].className.indexOf(sub)>-1)
                            {
                                eles.push(tagAll[i]);
                            }
                        }
                        return eles;
                        break;
                    default:
                        return context.getElementsByTagName(arg);
                        break;
                }
            }
    },

    //绑定事件
    bind: function(node,type,handler){
        if(node.addEventListener){
            node.addEventListener(type,handler,false);
        }else if(node.attachEvent){//ie
            node.attachEvent('on'+type,handler);
        }else{
            node['on'+ type]=handler;
        }
    },
    // 获取元素位置
    getPos: function (node) {
        var scrollx = document.documentElement.scrollLeft || document.body.scrollLeft,
            scrollt = document.documentElement.scrollTop || document.body.scrollTop;
        pos = node.getBoundingClientRect();
        return {
            top: pos.top + scrollt,
            right: pos.right + scrollx,
            bottom: pos.bottom + scrollt,
            left: pos.left + scrollx
        };
    },
    //添加样式名
    addClass: function(c,node){
        node.className=node.className+' '+c;
    },
    //移除样式名
    removeClass: function(c,node){
        var reg = new RegExp('(^|\\s+)' + c + '(\\s+|$)','g');
        node.className=node.className.replace(reg,'');
    },
    //阻止冒泡
    stopPropagation: function (event){
        event=event||window.event;
        event.stopPropagation?event.stopPropagation():event.cancelBubble=true;//后者ie
    }
};
/*
* 日历控件
* */
function Calender(){
    this.initialize.apply(this,arguments);
}
Calender.prototype={
    constructor: Calender,
    // 模板数组
    _template: [
        '<dl>',
        '<dt class="title-date">',
        '<span class="prevyear">prevyear</span><span class="prevmonth">prevmonth</span>',
        '<span class="nextyear">nextyear</span><span class="nextmonth">nextmonth</span>',
        '</dt>',
        '<dt><strong>日</strong></dt>',
        '<dt>一</dt>',
        '<dt>二</dt>',
        '<dt>三</dt>',
        '<dt>四</dt>',
        '<dt>五</dt>',
        '<dt><strong>六</strong></dt>',
        '<dd></dd>',
        '</dl>'
    ],
    //初始化函数
    initialize: function(options){
        this.id=options.id;//input id
        this.input=pub.$('#'+this.id);
        this.isSelect=options.isSelect;//是否支持下拉显示日期
        this.callBack=options.callBack;
        this.inputEvent();//input事件绑定
    },
    //表单事件
    inputEvent: function(){
        var that=this;
        pub.bind(this.input,'focus',function(){
            that.createContainer();//创建日历盒子
            that.drawDate(new Date());//渲染
        });
    },
    //创建日期外面的盒子，设置位置
    createContainer: function(){
        var odiv=pub.$('#'+this.id+'-date');
        if(!!odiv){
            odiv.parentNode.removeChild(odiv);
        }
        var container=this.container=document.createElement('div');
        container.id=this.id+'-date';
        container.style.position='absolute';
        container.zIndex=999;
        //获取input位置
        var inputPos=pub.getPos(this.input);
        container.style.left=inputPos.left+'px';
        container.style.top=inputPos.bottom-1+'px';
        //阻止冒泡 方便在日期外单机关闭
        pub.bind(container,'click',pub.stopPropagation);
        document.body.appendChild(container);
    },
    //渲染
    drawDate: function(odate){
        var dateWarp, textNode,
             titleDate,
            dd,
            year,
            month,
            date,
            days,
            weekStart,
            i
            ddHtml=[],

                    //date用于后面比较
                    nowDate = new Date(),
                    nowyear = nowDate.getFullYear(),
                    nowmonth = nowDate.getMonth(),
                    nowdate = nowDate.getDate();
        this.dateWarp=dateWarp=document.createElement('div');
        dateWarp.className='calendar';
        dateWarp.innerHTML=this._template.join('');//模板写入
        this.year=year=odate.getFullYear();
        this.month=month=odate.getMonth()+1;
        this.date=date=odate.getDate();
        this.titleDate=titleDate=pub.$('.title-date',dateWarp)[0];
        //是否添加select下拉框
        if(this.isSelect){
            var selectHtmls=[];
            //年份下拉
            selectHtmls.push('<select>');
            for(i=2020;i>1970;i--){
                if(i!=this.year){
                    selectHtmls.push('<option value ="'+ i +'">'+ i +'</option>');
                } else {
                    selectHtmls.push('<option value ="'+ i +'" selected>'+ i +'</option>'); // 自动选中当前年份
                }
            }
            selectHtmls.push('</select>');
            selectHtmls.push('年');
            // 添加月份下拉框
            selectHtmls.push('<select>');
            for (i = 1; i <= 12; i++) {
                if (i != this.month) {
                    selectHtmls.push('<option value ="'+ i +'">'+ i +'</option>');
                } else {
                    selectHtmls.push('<option value ="'+ i +'" selected>'+ i +'</option>'); // 自动选中当前月份
                }
            }
            selectHtmls.push('</select>');
            selectHtmls.push('月');
            titleDate.innerHTML = selectHtmls.join('');
            // 绑定change事件
            this.selectChange();
        }else {
            textNode = document.createTextNode(year + '年' + month + '月');
            titleDate.appendChild(textNode);
            this.btnEvent();
        }
        //获取dd
        this.dd=dd=pub.$('dd',dateWarp)[0];
        //获取本月一共多少天
        days=new Date(year,month,0).getDate();
        //获取本月第一天是星期几
        weekStart=new Date(year,month-1,1).getDay();
        //开头显示不在本月的几天 做成空白格
        for(i=0;i<weekStart;i++)
        {
            ddHtml.push('<a>&nbsp;</a>');
        }
        //循环渲染日期
        for (i = 1; i <= days; i++) {
            if (year < nowyear) {
                ddHtml.push('<a class="live disabled">' + i + '</a>'); // 传入的时间对象的年份小于当前年份
            } else if (year == nowyear) {
                if (month < nowmonth + 1) {
                    ddHtml.push('<a class="live disabled">' + i + '</a>'); // 传入的时间对象的月份小于当前月份
                } else if (month == nowmonth + 1) {
                    if (i < nowdate) ddHtml.push('<a class="live disabled">' + i + '</a>'); // 传入的时间对象的日期小于当前日期
                    if (i == nowdate) ddHtml.push('<a class="live tody">' + i + '</a>'); // 传入的时间对象的日期等于当前日期
                    if (i > nowdate) ddHtml.push('<a class="live">' + i + '</a>');  // 传入的时间对象的日期大于当前日期
                } else if (month > nowmonth + 1) {
                    ddHtml.push('<a class="live">' + i + '</a>'); // 传入的时间对象的月份大于当前月份
                }
            } else if (year > nowyear) {
                ddHtml.push('<a class="live">' + i + '</a>'); // 传入的时间对象的年份大于当前年份
            }
        }
        dd.innerHTML=ddHtml.join('');
        // 如果存在，则先移除
        this.removeDate();
        // 添加
        this.container.appendChild(dateWarp);

        //IE6select遮罩
        var ie6  = !!window.ActiveXObject && !window.XMLHttpRequest;
        if (ie6) dateWarp.appendChild(this.createIframe());

        // A link事件绑定
        this.linkOn();
        // 区域外事件绑定
        this.outClick();
        },
       
        // 下拉框选择事件
        selectChange: function () {
            var selects,
                yearSelect,
                monthSelect,
                that = this;
            selects =pub.$('select', this.titleDate);
            yearSelect = selects[0];
            monthSelect = selects[1];
           pub.bind(yearSelect, 'change', function () {
                var year = yearSelect.value;
                var month = monthSelect.value;
                that.drawDate(new Date(year, month - 1, that.date));
            });
           pub.bind(monthSelect, 'change', function () {
                var year = yearSelect.value;
                var month = monthSelect.value;
                that.drawDate(new Date(year, month - 1, that.date));
            });
        },
        // 移除日期DIV.calendar
        removeDate: function () {
            var odiv =pub.$('.calendar', this.container)[0];
            if (!!odiv) {
                this.container.removeChild(odiv);
            }
        },
        // 上一月、下一月、上一年和下一年按钮事件
        btnEvent: function () {
            var prevyear =pub.$('.prevyear', this.dateWarp)[0],
                prevmonth =pub.$('.prevmonth', this.dateWarp)[0],
                nextyear =pub.$('.nextyear', this.dateWarp)[0],
                nextmonth =pub.$('.nextmonth', this.dateWarp)[0],
                that = this;
           pub.bind(prevyear, 'click', function () {
                var idate = new Date(that.year - 1, that.month - 1, that.date);
                that.drawDate(idate);
            });
           pub.bind(prevmonth, 'click', function () {
                var idate = new Date(that.year, that.month - 2, that.date);
                that.drawDate(idate);
            });
           pub.bind(nextyear, 'click', function () {
                var idate = new Date(that.year + 1,that.month - 1, that.date);
                that.drawDate(idate);
            });
           pub.bind(nextmonth, 'click', function () {
                var idate = new Date(that.year , that.month, that.date);
                that.drawDate(idate);
            });
        },
        // A 的事件
        linkOn: function () {
            var links =pub.$('.live', this.dd),
                i,
                l = links.length,
                that = this;
            for (i = 0; i < l; i++) {
                links[i].index = i;
               pub.bind(links[i], 'click', function () {
                    that.date = this.innerHTML;
                    that.input.value = that.year + '-' + that.month + '-' + that.date;
                    that.removeDate();
                    that.callBack();
                });
            }
        },
        // 鼠标在对象区域外点击，移除日期层
        outClick: function () {
            var that = this;
           pub.bind(document, 'click', function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement;
                if (target == that.input) {
                    return;
                }
                that.removeDate();
            });
        }
    };





