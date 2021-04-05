$(function(){
            //地域を選択
            $('.area_btn').click(function(){
                $('.area_overlay').show();
                $('.pref_area').show();
                var area = $(this).data('area');
                $('[data-list]').hide();
                $('[data-list="' + area + '"]').show();
            });
            
            //レイヤーをタップ
            $('.area_overlay').click(function(){
                prefReset();
            });
            
            //都道府県をクリック
            $('.pref_list [data-id]').click(function(){
                if($(this).data('id')){
                    var id = $(this).data('id');
                    //このidを使用して行いたい操作をしてください
                    //都道府県IDに応じて別ページに飛ばしたい場合はこんな風に書く↓
                    //window.location.href = 'https://kinocolog.com/pref/' + id;
                    $.ajax({
                        type: "get", //HTTP通信の種類
                        url:'/pref/' + id, //通信したいURL
                        dataType: 'json'
                      })
                      //通信が成功したとき
                      .done((res)=>{
                          $(".pref_result").html('');
                          console.log(res)
                        $.each(res,function(index,value){
                           html = `<div class="result-item">
                                        <div></div>
                                        <div class="result-content">
                                            <h1 class="result-title"><a href="/${id}">${value.title}</a></h1>
                                            <p class="result-body">${value.body}</p>
                                        </div>
                                    </div>`; 
                           $(".pref_result").append(html);
                        });
                      })
                      //通信が失敗したとき
                      .fail((error)=>{
                        console.log(error.statusText)
                      })
                    prefReset();
                }
            });
            
            //表示リセット
            function prefReset(){
                $('[data-list]').hide();
                $('.pref_area').hide();
                $('.area_overlay').hide();
            }
        });