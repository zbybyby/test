//事件绑定函数，兼容浏览器差异
function addEvent(element, event, listener) {
    if (element.addEventListener) {
        element.addEventListener(event, listener, false);
    }
    else if (element.attachEvent) {
        element.attachEvent("on" + event, listener);
    }
    else {
        element["on" + event] = listener;
    }
}

//遍历数组的方法，针对数组中每一个元素执行fn函数，并将数组索引和元素作为参数传递，后面用
function each(arr, fn) {
    for (var cur = 0; cur < arr.length; cur++) {
        fn(arr[cur]);
    }
}

window.onload = function() {
    var container = document.getElementById("container");
    var buttonList = document.getElementsByTagName("input");
    var Clock;
    //定义队列的对象
    var queue = {
        str: [],
        
        leftPush: function(num) {
            if (!this.isFull()) {
                this.str.unshift(num);
                this.paint();
            }
            else {
                alert("Maximum number of intergers that could show simutaneously is 60!");
            }
        },
        
        rightPush: function(num) {
            if (!this.isFull()) {
                this.str.push(num);
                this.paint();
            }
            else {
                alert("Maximum number of intergers that could show simutaneously is 60!");
            }
        },
        
        isEmpty: function() {
            return (this.str.length == 0);
        },
        
        isFull: function() {
            return (this.str.length > 60);
        },
        
        leftPop: function() {
            if (!this.isEmpty()) {
                alert(this.str.shift());
                this.paint();
            }
            else {
                alert("The queue is already empty!");
            }
        },
        
        rightPop: function() {
            if (!this.isEmpty()) {
                alert(this.str.pop());
                this.paint();
            }
            else {
                alert("The queue is already empty!");
            }
        },
        
        paint: function() {
            var str = "";
			//item传参数的第一个参数（貌似）      parseInt将字符串转换为值 '1'->1
            each(this.str, function(item){str += ("<div style=\'height:" + parseInt(item) + "px\'></div>")});
            container.innerHTML = str;
            addDivDelEvent();
        },
        
        deleteID: function(id) {
            console.log(id);
            this.str.splice(id, 1);//splice 从第一个参数处开始 删除第二个参数长度的字符串 若增加 则增加第三个字符串的内容
            this.paint();
        }
        
    }
    
    //为container中的每个div绑定删除函数
    function addDivDelEvent() {
        for (var cur = 0; cur < container.childNodes.length; cur++) {
            
            //这里要使用闭包，否则永远绑定到指定div上的delete函数的参数永远等于跳出时的cur值(length);
            addEvent(container.childNodes[cur], "click", function(cur) {
                return function(){return queue.deleteID(cur)};
            }(cur));
        }
    }
    

    //turn to bubblesort
    function BubbleSort() {
        var Clock;
        var count = 0, i = 0;
        console.log(queue.str.length)
        Clock = setInterval(function() {//定时执行函数
            if (count >= queue.str.length) {
                clearInterval(Clock);
            }
            if (i == queue.str.length - 1 - count) {
                i = 0;
                count++;
            }
            if (queue.str[i] > queue.str[i + 1]) {
                var temp = queue.str[i];
                queue.str[i] = queue.str[i + 1];
                queue.str[i + 1] = temp;
                queue.paint();
            }
            i++;
        }, 100);
    }
    
    //为4个按钮绑定函数
    addEvent(buttonList[1], "click", function() {
        var input = buttonList[0].value;
        if ((/^[0-9]+$/).test(input)) {//test正则用法
            if (parseInt(input) < 10 || parseInt(input) > 100) {
                alert("The interger you input must between 10 and 100!");
            }
            else queue.leftPush(input);
        }
        else {
            alert("Please enter an interger!");
        }
    });
    addEvent(buttonList[2], "click", function() {
        var input = buttonList[0].value;
        if ((/^[0-9]+$/).test(input)) {
            if (parseInt(input) < 10 || parseInt(input) > 100) {
                alert("The interger you input must between 10 and 100!");
            }
            else queue.rightPush(input);
        }
        else {
            alert("Please enter an interger!");
        }
    });
    
    addEvent(buttonList[3], "click", function(){queue.leftPop()});
    addEvent(buttonList[4], "click", function(){queue.rightPop()});
    addEvent(buttonList[5], "click", function() {
        BubbleSort();
    })
}