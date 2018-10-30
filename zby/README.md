1.阿波罗质量审核平台
    对接内容生产方的一个数据过滤处理平台。主要功能是对接来自各种业务方的文章，视频，图片数据，并提供一个审核，监控所有数据的平台。质量审核平台每天1000+名外包人员24小时轮流审核30w+数据，质量平台技术栈使用React+ant-design+webpack作为基础技术栈，puppteer用于自动化部署，并且根据需求开发了react版本的视频播放器。
2.阿波罗安全审核平台
    先于阿波罗质量平台处理数据，用于过滤存在安全隐患的文章。安全审核平台审核接入多个业务方数据，每天送审量在100w+，对各类文章视频进行分类，分配，审核，监控。安全审核技术栈和质量审核技术栈基本相同，使用了redux管理状态，加入了jest单元测试，优化并拓展了webpack和react代码，保证项目稳定运行。封装自动化脚本和播放器用于其他业务使用。
3.播单后台
    网易新闻播单后台整合多个业务方数据作为数据输入，提供一个可以添加修改播单/视频，对播单/视频进行推送，监控，上下线等操作的后台系统。技术栈为React+webpack。


# Redux
1.为什么设计dispatch 因为数据可能被任意修改导致不可预料的结果，debug很困难，也就是老生常谈的避免全局变量，所以要提高修改数据的门槛，所以约定只能执行我允许的某些修改，而且必须大张旗鼓的告诉我。

# 图片懒加载
function _isShow(el){//判断img是否出现在可视窗口
        let coords = el.getBoundingClientRect();
        return (coords.left >= 0 && coords.left >= 0 && coords.top) <= (document.documentElement.clientHeight || window.innerHeight) + parseInt(offset);
    };
function imgLoad(selector){//获取所有需要实现懒加载图片对象引用并设置   window监听事件scroll
        _selector = selector || '.imgLazyLoad';
        let nodes = document.querySelectorAll(selector);
        imgList = Array.apply(null,nodes);
        window.addEventListener('scroll',_delay,false)
    };
0. 利用getBoundingClientRect()

# 直播 播放器相关
0. 容器MP4（封装格式），编码格式MEPG-4，其中H264是MEPG-4中最高级的编码技术
1. 容器FLV（封装格式），编码格式H263,H264
2. FLV.js fetch视频信息，手动将flv流重新提取封装成MP4片段，利用MediaSource喂给H5 video进行播放（也可以利用Emscript编译一串ffmpeg c++代码，转换flv-->mp4 ），不支持手机端直播
3. 流媒体协议：
    1.RTMP:封装格式为FLV，基于TCP长链接（有3次握手和防重传机制），一般拉流推流都采用RTMP协议，H264解码过程需要IBP三种帧，I是关键帧，必须要有I才能解码BP，I帧需要一段间隔(GOP)才有一个，不是常有，秒开技术：其实是在cache服务器上，它会去预先解一下这个帧，然后去看它到底是个I帧，还是个B帧，还是个P帧，当它发现是I帧的时候，它会放在它的程序的内存里头，当你每一次打开这个视频流的时候，cache服务器会把内存中的I帧发送给客户端比如当前播放到了P帧，那我把P帧前面的I帧和P帧全波放到cache的内存里，然后当客户端接入之后先把内存里的数据发送给客户端解码器，然后再从这个B帧往后给。对于这个解码器来讲，它很舒服，它接到第一个数据流的第一个包肯定是I帧，那么它就可以直接播放了。RTMP变种：RTMPT: RTMP + HTTP。使用 HTTP 的方式来包裹 RTMP 流，这样能直接通过防火墙等等 RTMPT,RTMFP....

    2.HTTP-FLV：封装格式为FLV，基于HTTP长链接，HTTP-FLV 就是长连接，简而言之只需要加上一个 Connection:keep-alive,延迟原理同RTMP，与RTMP比可以使用HTTPS做加密通道

    区别：
    用HTTP方式：先通过IIS 将FLV下载到本地缓存，然后再通过NetConnection的本地连接来播放这个FLV，这种方法是播放本地的视频，并不是播放服务器的视频。因此在本地缓存里可以找到这个FLV。其优点就是服务器下载完这个FLV，服务器就没有消耗了，节省服务器消耗。其缺点就是FLV会缓存在客户端，对FLV的保密性不好。

    用RTMP方式：通过NetConnection连接到FMS/Red5服务器，并实时播放服务器的FLV文件，这种方式可以任意选择视频播放点（SEEK()），并不象HTTP方式需要缓存完整个FLV文件到本地才可以任意选择播放点，其优点就是在本地缓存里是找不到这个FLV文件的。不会缓存在客户端，保密性好，其缺点就是消耗服务器资源，连接始终是实时的。

    3.HLS http live Streaming，http短连接！！！HLS主要两块内容是.M3U8文件和 .ts播放文件。使用一个 URL去下载m3u8文件然后，开始下载ts文件。.M3U8文件相当于.ts的索引文件，有ts文件相关信息。延迟体现在下载m3u8,ts文件上，tcp握手，切片小可以减小延迟同时增加服务器负担。优点为高兼容性！

    4.存在问题，延迟累计，音视频丢包不同步，码率，CPU问题

# axios 源码解析
0. 取消请求 https://juejin.im/post/5b27682f6fb9a00e733f121e
   利用promise 
   function CancelToken(){
       //---------TODO
        var resolvePromise;
        this.promise = new Promise(function(resolve){
            //将resolve（promise成功回调函数）赋值给resolvePromise
            //若调用resolvePromise则能触发promise的success
            //用户都是在函数外使用 cancel函数 现在还需要两部
            // 1.将resolvePromise暴露给外部 
            // 2.使用cancel函数封装resolvePromise,并暴露给外部
            resolvePrimise = resolve 
        })
   }
1. 发送请求之前 
    // 在发送请求之前，验证了cancelToken，看来此处就是用来取消请求的；
    if(config.cancelToken){
        // 具体是如何取消的，是在这个判断内定义的；
        config.cancelToken.promise.then(function(cancel){
            request.abort();
            reject(cancel);
            request = null;
        })
    }
    // 发送请求
    request.send(requestData);

# React 高阶组件：
0. 更改props
1. 渲染劫持 super.render()
2. 把WrappendCompent 和其他elements包装到一起

# 类型判断：
0. {}.toString.call(xxx) == '[object Array/Object/Number/Function]' 

# 简单请求和复杂请求：
0. 简单请求：method=》GET/HEAD/POST 复杂请求：非简单请求，会预请求一下 核对请求头和相应头的 Acesss-contral-allow/request-header Acess-contral-request-method 是否一致再决定是否进行下一次请求（CORS）

# ES6 Set Map
0. Map对象就是简单的键值对映射。其中的键和值可以使任意值。（ps : 对象的键只能是字符串 ）
1. set中不能有重复的值 可以传入一个数组生成 set结构

# webpack 和gulp的区别
0. gulp强调的是前端开发的工作流程，我们可以通过配置task定义task处理的事务，然后定义执行顺序，从而构建项目的整个前端开发流程
1. webpack 是一个前端模块化方案，更侧重模块打包

#webpack 构建流程
0. 解析webpack配置参数，合并从shell传入和config中的参数，生成最后的配置结果
1. 注册所有配置好的插件，让插件监听webpack构建生命周期的事件节点，做出对应的反应
2. 从entry入口开始解析文件，构建ast语法树，递归找出每个文件所依赖的文件
3. 在解析文件的过程中根据文件类型和loader配置找出合适的loader进行文件转化
4. 递归完得到结果，根绝entry配置生成代码块chunk
5. 输出所有chunk到文件系统
（需要注意的是，在构建生命周期中有一系列插件在合适的时机做了合适的事情，比如UglifyJsPlugin会在loader转换递归完后对结果再使用UglifyJs压缩覆盖之前的结果）

# 排序稳定性
0. 当n较小时，插入，选择排序
1. 当n较大时，用nlogn的比如堆排序，快速排序，和归并排序

# Promise原生实现
function Promise(fn) {
    var promise = this;
        promise._value;
        promise._reason;
        promise._resolves = [];
        promise._rejects = [];
        promise._status = 'PENDING';

    this.then = function (onFulfilled, onRejected) {
        return new Promise(function(resolve, reject) {
            function handle(value) {
                var ret = typeof onFulfilled === 'function' && onFulfilled(value) || value;
                if(ret && typeof ret ['then'] == 'function'){
                    ret.then(function(value){
                       resolve(value);
                    },function(reason){
                       reject(reason);
                    });
                } else {
                    resolve(ret);
                }
            }
            function errback(reason){
                reason = typeof onRejected === 'function' && onRejected(reason) || reason;
                reject(reason);
            }
            if (promise._status === 'PENDING') {
                promise._resolves.push(handle);
                promise._rejects.push(errback);
            } else if(promise._status === 'FULFILLED'){
                handle(promise._value);
            } else if(promise._status === 'REJECTED') {
            errback(promise._reason);
        }
        })
        
    };


    function resolve(value) {
        setTimeout(function(){
            promise._status = "FULFILLED";
            promise._resolves.forEach(function (callback) {
                promise._value = callback( value);
            })
        },0);
    }

    function reject(value) {
        setTimeout(function(){
            promise._status = "REJECTED";
            promise._rejects.forEach(function (callback) {
                promise._reason = callback(value);
            })
        },0);
    }

    fn(resolve, reject);
}

#webpack 优化
0. 缩小文件搜索范围 
1. 使用DLLPlugin加速构建过程，包含大量复用模块的动态链接库只需要编译一次，之后构建过程中动态链接库包含的模块不会被编译，
而是直接使用动态链接库中的代码，如react，react-dom
2. HappyPack可以發揮多核cpu的威力，实现多进程，因为js是单线程模型，无法通过多线程实现。在整个 Webpack 构建流程中，最耗时的流程可能就是 Loader 对文件的转换操作了，因为要转换的文件数据巨多，而且这些转换操作都只能一个个挨着处理。 HappyPack 的核心原理就是把这部分任务分解到多个进程去并行处理，从而减少了总的构建时间。
3. 启用tree-shaking 剔除无用代码，只可以识别ES6的模块化代码，不能识别module.export={},require()语法，配置过程中需要在,.bablelrc 的 “modules":false,关闭babel的模块转化功能，保留原本的ES6模块化语法
4. 分离公共模块
5. 代码按需加载 react-router提供getComponent函数，然后利用require.ensure加载（https://blog.csdn.net/qq_24581629/article/details/75048860?utm_source=blogxgwz2）
6. 作用域提升 1.减少函数声明语句，缩小代码体积 2.创建的函数作用域减少了，内存开销也小了
    原理：分析模块依赖关系，把散的模块合成一个模块，但是不能造成代码冗余，因此只有那些被引用了一次的模块才能被合并
    (webpack4 中只需设置 mode == production)

# React生命周期
    setState =》shouldComponentUpdate=>componentWillUpdate=>render=>componentDidUpdate
    props => componentWillReceiveProps=>showComponentUpdate=>willUpdate=>render=>didUpdate
    
    初始化挂载组件=》mountComponent=》初始化props，state，公共类(constructComponent)，挂载（willMount，是否有didMount，有的话didMount入队，合并state，根据组件Type调用不同函数生成ReactComponent，递归渲染子组件，渲染完成后，再调用每个didMount

    updateComponent=》willReceiveProps=》合并stateState=》shouldComponent判断是否需要渲染=》需要=》
    willUpdate=》render（得到reactElement，判断是否做dom Diff，更新，不然就卸载再mountComponent得到HTML，插入dom）=》DidUpdate

    willDidMount =》不会调用setState 会合并state

    render过程 =》 createClass（得到ReactElement） =》是否有prevComponent=》UpdateComponent=》不然根据type创建不同ReactComponent，开启事务传入ReactComponent调用mountComponent返回html=》插入dom

# react SetState
    render，render之后会调用batchedUpdates()函数，开启一个事务，然后走到生命周期函数，触发setState然后调用调用事务处理机制perform一个enqueueUpdate和component，第一次会触发isBatchingUpdate=true，以后的setState都会将新的state和component各子存到一个队列中，等待批量更新。事务的两个Wrapper，一个是设置isBatchUpdates标志位的（更新状态），避免多次render，另一个是更新组件的，他会把batchUpdate标志位置为false，调用updateComponent，同时将setState的回调函数存起来。updateComponent（依次调用willReceiveProps（setstate进入的不调用），和shouldUpdate），将多个更新合并，然后componentShouldUpdate，然后wiilUpdate，更新函数(比较算法是：如果prevElement类型为string或者number，那么nextElement类型为string或number时为true；如果prevElement和nextElement为object，并且key和type属性相同，则prevElement._owner == nextElement._owner相等时为true，否则为false。)，DidUpdate

#webpack hash


#webpack HMR 热替换
0. webpack watch模式下，监听文件变化重新打包存入内存
1. 在启动 devserver的时候，sockjs在服务端和浏览器建立了websocket链接（可以将webpack编译和打包的各个阶段告知浏览器），webpack-dev-server调用webpack api compile的done事件，当编译完成后，将新模块的hash值发送到浏览器端，开发者工具里可以看到（websocket信息）
2. webpack-dev-server修改了entery在里面添加了webpack-dev-client，并且暂存了hash
3. 如果有hot webpack-dev-server 发送json请求获得新的hash和对应chunk ID模块数字，然后根据id和最新的hash将文件作为script插入页面head头中，获得修改的模块代码
4. 一次次向上冒泡，看看子模块父模块是否接受更新，如果接受，accept的话删除原来依赖，建立新的依赖

# curry函数
0.   add(){
        //建立args,利用闭包特性，不断保存arguments
        var args = [].slice.call(arguments);
           //方法一，新建_add函数实现柯里化
        var _add = function(){
            if(arguments.length === 0){
                //参数为空，对args执行加法
                return args.reduce(function(a,b){return a+b});
            }else {
                //否则，保存参数到args，返回一个函数
                [].push.apply(args,arguments);
                return _add;
            }
        }
        return _add;
    }
    1. 利用柯里化的思想，可以自己写一个bind函数
    2. 参数复用
    3. 延迟执行函数（节流函数----利用闭包存储了当前和上一次执行的时间戳）

# 网络分层 七层
0. 物理层 数据链路层 网络层 传输层 会话层 表示层 应用层


##======================================================CSS===================================================

# margin重叠
0. 两个毗邻的普通流中块级元素会有垂直方向的 margin重叠
1. 发生重叠的肯定是同一个BFC（块级格式上下文）内的块级元素，不是块级元素不会发生重叠
    重叠可以分为以下几种情况：
    1.当一个元素出现在另一个元素上面
    2.当一个元素包含另一个元素，第一个子元素上边距和父元素上边距合并

    合并的时候，margin为正值时取最大值，负时取绝对值的最大值，

    如何避免marign重叠？将其中一个构建成BFC==》
        1.float属性不为none
        2.position为absolute或fixed
        3.display为inline-block, table-cell, table-caption, flex, inline-flex
        4.overflow不为visible( hidden,scroll,auto, )

# 标准的CSS的盒子模型？低版本IE的盒子模型有什么不同
0. IE的content部分把border和padding算了进去

# css创建三角形原理
0. 宽高设置为0 接近一个点 使得边框很粗，然后隐藏三条边，border颜色设置为transparent

# box-sizing
0. box-sizing:content-box;//默认的W3C盒模型元素效果
1. box-sizing:border-box;//触发IE盒模型效果

# rgba 和 opacity
0. rgba只会作用于自身，子元素不会继承
1. opacity会作用于自身和自身内所有内容

# li直接有看不见的空白间隔
0. 需要在ul设置 font-size=0，li上设置文字大小

# 清除浮动
0. 在伪元素上 clear：both
