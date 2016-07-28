//�¼��󶨺������������������
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

//��������ķ��������������ÿһ��Ԫ��ִ��fn��������������������Ԫ����Ϊ�������ݣ�������
function each(arr, fn) {
    for (var cur = 0; cur < arr.length; cur++) {
        fn(arr[cur]);
    }
}

window.onload = function() {
    var container = document.getElementById("container");
    var buttonList = document.getElementsByTagName("input");
    var Clock;
    //������еĶ���
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
			//item�������ĵ�һ��������ò�ƣ�      parseInt���ַ���ת��Ϊֵ '1'->1
            each(this.str, function(item){str += ("<div style=\'height:" + parseInt(item) + "px\'></div>")});
            container.innerHTML = str;
            addDivDelEvent();
        },
        
        deleteID: function(id) {
            console.log(id);
            this.str.splice(id, 1);//splice �ӵ�һ����������ʼ ɾ���ڶ����������ȵ��ַ��� ������ �����ӵ������ַ���������
            this.paint();
        }
        
    }
    
    //Ϊcontainer�е�ÿ��div��ɾ������
    function addDivDelEvent() {
        for (var cur = 0; cur < container.childNodes.length; cur++) {
            
            //����Ҫʹ�ñհ���������Զ�󶨵�ָ��div�ϵ�delete�����Ĳ�����Զ��������ʱ��curֵ(length);
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
        Clock = setInterval(function() {//��ʱִ�к���
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
    
    //Ϊ4����ť�󶨺���
    addEvent(buttonList[1], "click", function() {
        var input = buttonList[0].value;
        if ((/^[0-9]+$/).test(input)) {//test�����÷�
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