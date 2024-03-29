<?= $this->render('_head') ?><!--引入公共头部-->
<script type="text/javascript">
    //iOS Web APP中点击链接跳转到Safari 浏览器新标签页的问题 devework.com
    //stanislav.it/how-to-prevent-ios-standalone-mode-web-apps-from-opening-links-in-safari
    if(("standalone" in window.navigator) && window.navigator.standalone){
        var noddy, remotes = false;
        document.addEventListener('click', function(event) {
            noddy = event.target;
            while(noddy.nodeName !== "A" && noddy.nodeName !== "HTML") {
                noddy = noddy.parentNode;
            }
            if('href' in noddy && noddy.href.indexOf('http') !== -1 && (noddy.href.indexOf(document.location.host) !== -1 || remotes))
            {
                event.preventDefault();
                document.location.href = noddy.href;
            }
        },false);
    }
</script>
   <body>
        <!--    买入头部        -->
        <ul class="index-head flex col-w <?=session('sim_type')=='sim'?'moni':''?>">
                    <li class="le"><a onclick="JavaScript:history.back(-1);" class="col-w"><i class="iconfont"></i></a></li>
                    <li id="title" class="mid"><em></em><em id="name"></em></li>
                    <li class="ri"></li>
        </ul>
        <div style="height: .45rem; width: 100%;"></div>

        <!--      买入        -->
        <ul class="buy-choose col-1">
            <li class="num">交易数量<span id="num" class="fr">

			<em class="active" data-num="1">1手</em><em data-num="2">2手</em><em data-num="3">3手</em><em data-num="5">5手</em><em data-num="10">10手</em>



			</span></li>
            <li>触发止盈(%)
                <span class="win fr pr">
                    <button data-profix="reduce" class="red-btn">-</button>
                    <input id="profix" class="col-1" readonly="readonly" maxlength="4" type="number">
                    <button data-profix="plus" class="add-btn">+</button>
                </span>
            </li>
            <li>触发止损(%)
                <span class="lost fr pr">
                    <button data-ost="reduce" class="red-btn">-</button>
                    <input id="ost" type="text" class="col-1" readonly="readonly" maxlength="4">
                    <button data-ost="plus" class="add-btn">+</button>
                </span>
            </li>
        </ul>

        <ul class="buy-choose2 col-1">
            <!--li>金券: <em id="bondNum" class="col-up">0</em> 张<div class="fr bg-btn"-->
                        <span class="yuan-btn"></span></div></li>
            <li id="bond" style="height:auto" class="none money-card">
                    <label style="margin-right:.03rem"><input style="margin-left: .05rem" type="radio" name="bond"><em>100</em></label>
            </li>
            <li class="num">保证金<span id="margin" class="fr">
			<?php if($product->code == 'coal' ||  $product->code == 'MAF' || $product->code == 'lls' ){ ?>
			<em class="active" data-num="1">500</em><em data-num="2">1000</em><em data-num="3">5000</em><em data-num="4">10000</em>
			<?php }elseif($product->code == 'ltc'){ ?>
			<em class="active" data-num="1">500</em><em data-num="2">1000</em><em data-num="3">3000</em><em data-num="4">5000</em>
			<?php }elseif($product->code == 'hf_HSI'){ ?>
			<em class="active" data-num="1">500</em><em data-num="2">1000</em><em data-num="3">3000</em><em data-num="4">5000</em>
            <?php }elseif($product->code == 'eth'){ ?>
            <em class="active" data-num="1">100</em><em data-num="2">500</em><em data-num="3">1000</em><em data-num="4">5000</em>
            <?php }elseif($product->code == 'hf_CL'){ ?>
                <em class="active" data-num="1">500</em><em data-num="2">1000</em><em data-num="3">5000</em><em data-num="4">10000</em>
            <?php }elseif($product->code == 'hf_GC'){ ?>
                <em class="active" data-num="1">1000</em><em data-num="2">5000</em><em data-num="3">10000</em><em data-num="4">50000</em>
			<?php }elseif($product->code == 'sz399300'){ ?>
			<em class="active" data-num="1">1000</em><em data-num="2">2000</em><em data-num="3">5000</em><em data-num="4">20000</em>
            <?php }elseif($product->code == 'hf_CHA50CFD'){ ?>
                <em class="active" data-num="1">500</em><em data-num="2">1000</em><em data-num="3">2000</em><em data-num="4">5000</em>
            <?php }elseif($product->code == 'btc_btcusdtusd'){ ?>
                <em class="active" data-num="1">100</em><em data-num="2">500</em><em data-num="3">1000</em><em data-num="4">5000</em>
            <?php }elseif($product->code == 'bch'){ ?>
                <em class="active" data-num="1">3000</em><em data-num="2">5000</em><em data-num="3">10000</em><em data-num="4">30000</em>
            <?php }elseif($product->code == 'hf_CAD'){ ?>
                <em class="active" data-num="1">100</em><em data-num="2">500</em><em data-num="3">1000</em><em data-num="4">5000</em>
            <?php }elseif($product->code == 'nf_NI0'){ ?>
                <em class="active" data-num="1">100</em><em data-num="2">500</em><em data-num="3">5000</em><em data-num="4">10000</em>
			<?php }else{ ?>
			<em class="active" data-num="1">200</em><em data-num="2">500</em><em data-num="3">1000</em><em data-num="4">2000</em>
			<?php } ?>



			</span></li>
            <div id="bondHide">
                <li>交易&gt;交易综合费(元)<span id="handingMoney" class="fr"></span></li>
                <li>合计履约金(元)<span id="totalMoney" class="fr"></span></li>
            </div>
            <li>点位价<span id="unit" class="fr"></span></li>
        </ul>
        <div class="buy-choose3 col-1">
            <input type="radio" checked="">
            即时买入(买入当前行情点位：<em id="new" class=""><?=number_format($product->dataAll->price,2,".","")?></em>)
        </div>
        <p class="tip">投资有风险，入市须谨慎</p>
        <div style="height: .4rem;width: 100%;"></div>
        <button class="confirm" id="buy"></button>

        <script>
            $(function(){
                var type = '<?=$data['state'] ?>';
                var id = '<?=$data['pid'] ?>';
                var buyClass="";
                if(type == 'up'){
                    $('#title').find('em').eq(0).text('买涨');
                    $('#buy').text('确定买涨');
                    buyClass = "buyR"
                }else{
                    $('#title').find('em').eq(0).text('买跌');
                    $('#buy').text('确定买跌');
                    buyClass = "buyG";
                }
                $('#buy').addClass('btn-' + type);
                $('#new').addClass('col-' + type);
                $('#handingMoney').addClass('col-' + type);
                $('#totalMoney').addClass('col-' + type);
                $('#unit').addClass('col-' + type);



                //购买商品数据
                var buyData = {};
                //根据手数更新保证金选项
                function changeMargin(){
                    /*$("#margin em").each(function(index){

                        $(this).text(buyData.singleMargin * Number($("#num em.active").data('num')) * (index + 1));
                    })*/
                }
                //根据保证金倍数更新止损
                function changeOst(){
                    /*$('#ost').val(parseFloat((buyData.ostMaxPrice * Number($("#margin em.active").data('num'))).toFixed(num)));
					$('#profix').val(parseFloat((buyData.profixMaxPrice * Number($("#margin em.active").data('num'))).toFixed(num)));*/
					$('#ost').val(100);
					$('#profix').val(100);
                }
                //更新保证金
                function changeHandingMoney(){
					//console.log(Number($("#margin em.active").text()));
					//console.log(buyData.singleHandlingMoney);
                    $('#handingMoney').text(Number($("#margin em.active").text()) *buyData.singleHandlingMoney*$("#num em.active").data('num') /100);
                }
                //更新总金额
                function changeTotalMoney(){
					changeHandingMoney();
                    $('#totalMoney').text(Number($('#handingMoney').text()) + Number($("#margin em.active").text()*$("#num em.active").data('num')));


					$('#unit').text('每波动' + buyData.unit + '点价格为：' + ((buyData.pointMoney)*$("#num em.active").data('num')*(Number($("#margin em.active").text())/buyData.singleMargin)).toFixed(3) + '元');


                }
                //更新代金券选中和禁用
                function changeBond(){

                    $('[name="bond"]').each(function(){
                        $(this).removeAttr('disabled');
                        if(Number($(this).next().text()) < Number($("#margin em.active").text())){
                            $(this).removeAttr('checked');
                            $(this).attr('disabled', 'disabled');
                        }
                    })
                }
                //获取代金券
                $.ajax({
                    url: '/member/bond',
                    data: {
                        productId: id
                    },
                    success: function(data){
                        if(data != null && data.length > 0){
                            //代金券数量
                            $('#bondNum').text(data.length);
                            var bondContainer = $('#bond');
                            var bondNode = bondContainer.find('label').clone();
                            bondContainer.html('');
                            $.each(data, function(){
                                var bondClone = bondNode.clone();
                                bondClone.find('input').eq(0).data('id', this.bondId);
                                bondClone.find('em').eq(0).text(this.bondMoney);
                                bondContainer.append(bondClone);
                            })

                            changeBond();
                            //注册金券按钮点击事件
                            $(".bg-btn").on("click",function(){
                                $(this).toggleClass("active2");
                                $(".bg-btn").find("span").toggleClass("active1");
                                $(".money-card").toggle(300);
                                $('#bondHide').toggle(300);
                                $('[name="bond"]:checked').removeAttr('checked');
                            });
                        }
                    }
                })
                //每秒刷新买入或卖出价
                setInterval(function(){
                    if(buyData.proNo != undefined){
                        $.ajax({
                            url: '/site/stock-info',
                            data: {
                                pid: id,
                                //panType: 1
                            },
                            success: function(data){
                                var obj = data.data.product;
                                $('#new').text(type == 'up' ? obj.buyprice.toFixed(2) : obj.sellprice.toFixed(2));
                            }
                        })
                    }
                },1000)

                var num = 0;
                //获取商品数据
                $.ajax({
                    url: '/site/stock-info',
                    data: {
                        pid: id,
                        //state: type == 'up' ? 1 : 2
                    },
                    success: function(data){
                        buyData = data.data.product;

						//console.log(buyData);

                        if(buyData.unit.toString().split('.').length > 1){
                            num = buyData.unit.toString().split('.')[1].length;
                        }
                        //商品名称
                        $('#name').text('-' + buyData.productName);
                        $('#profix').val(buyData.profixMaxPrice);
                        $('#unit').text('每波动' + buyData.unit + '点价格为：' + buyData.pointMoney.toFixed(3) + '元');
                        changeOst();
                        changeMargin();
                        changeHandingMoney()
                        changeTotalMoney()
                        //手数点击
                        $("#num em").on("click",function(){
                            var me = $(this);
                            $("#num em").removeClass("active");
                            me.addClass("active");
                            changeMargin();
                            changeHandingMoney()
                            changeTotalMoney()
                            changeBond()
                        });
                        //保证金点击
                        $("#margin em").on("click",function(){
                            $("#margin em").removeClass("active");
                            $(this).addClass("active");
                            //changeOst();
                            changeTotalMoney()
                            changeBond()
                        });
                        //止盈加减
                        $('[data-profix]').on('click', function(){
                            var profix = $('#profix');
                            var type = $(this).data('profix');
                            if(type == 'plus'){
                                //profix.val(parseFloat(((Number(profix.val()) + buyData.step) > buyData.profixMaxPrice ? buyData.profixMaxPrice : (Number(profix.val()) + buyData.step)).toFixed(num)));
								profix.val(parseFloat(((Number(profix.val()) + 5) > 100 ? 100 : (Number(profix.val()) + 5)).toFixed(num)));
                            }else{
                                //profix.val(parseFloat(((Number(profix.val()) - buyData.step) < buyData.profixMinPrice ? buyData.profixMinPrice : (Number(profix.val()) - buyData.step)).toFixed(num)));
								profix.val(parseFloat(((Number(profix.val()) - 5) < 10 ? 10 : (Number(profix.val()) - 5)).toFixed(num)));
                            }
                        })
                        //止损加减
                        $('[data-ost]').on('click', function(){
                            var ost = $('#ost');
                            var type = $(this).data('ost');
                            if(type == 'plus'){

                                //ost.val(parseFloat(((Number(ost.val()) + buyData.step) > (buyData.ostMaxPrice * Number($("#margin em.active").data('num'))) ? (buyData.ostMaxPrice * Number($("#margin em.active").data('num'))) : (Number(ost.val()) + buyData.step)).toFixed(num)));
								ost.val(parseFloat(((Number(ost.val()) + 5) > 100 ? 100 : (Number(ost.val()) + 5)).toFixed(num)));
                            }else{
								//ost.val(Number((Number(ost.val()) - obj.unit) < obj.unit ? obj.unit : (Number(ost.val()) - obj.unit)).toFixed(num));
                                ost.val(parseFloat(((Number(ost.val()) - 5) < 10 ? 10 : (Number(ost.val()) - 5)).toFixed(num)));
                            }
                        })

                    }
                })





                //确定按钮点击
                $("#buy").on("click",function(){
                    var margin = $("#margin em.active").text();
                    var handlingMoney = $('#handingMoney').text();
                    var profit = $('#profix').val();
                    var volHand = $("#num em.active").data('num');
                    var ost = $('#ost').val();
                    var state = type == 'up' ? 1 : 2;
                    var bondId = $('[name="bond"]:checked').data('id');
                    var isBond = bondId == null ? 1 : 2;
                    var _csrf='<?= Yii::$app->request->csrfToken ?>';
                    var state='';
                    if(type=='up')
                    {
                        state="1";
                    }
                    else
                    {
                        state="2";
                    }
                    layer.open({
                        style: 'width:2rem;',
                        className:buyClass,
                        content: '您是否确定买入？',
                        btn: ['确认', '取消'],
                        shadeClose:false,
                        yes: function(index){
                            $.ajax({
                                type: 'post',
                                url: '/order/save-order',
                                data: {
                                    _csrf: _csrf,
                                    productId: id,
                                    totalMargin: margin,//保证金
                                    totalHandlingMoney: handlingMoney,//手续费
                                    profit: profit,//止盈点位
                                    volHand: volHand,//交易手数
                                    ost: ost,//止损点位
                                    state: state,//买涨买跌
                                    isBond: isBond,//是否使用代金券
                                    bondId: bondId,//代金券id
                                    state:state//涨跌状态
                                },
                                success: function(data){
                                    layer.open({
                                        className:"layerCom",
                                        content: data.info,
                                        btn: '确定',
                                        shadeClose:false,
                                        yes: function(index){
                                            if(data.state){
                                                history.back(-1);
                                            }
                                            layer.close(index)
                                        }
                                    })
                                }
                            })
                            layer.close(index);
                        }
                    });
                })

            })
        </script>

</body></html>
<script>
document.addEventListener('plusready', function() {
    var webview = plus.webview.currentWebview();
    plus.key.addEventListener('backbutton', function() {
        webview.canBack(function(e) {
            if(e.canBack) {
                webview.back();
            } else {
                webview.close(); //hide,quit
                //plus.runtime.quit();
            }
        })
    });
});
</script>
