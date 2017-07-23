<!-- モーダルウィンドウを呼び出すボタン -->
<button id="modal-open" type="button" style="display: none;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">クリックするとモーダルウィンドウが開きます。</button>

<!-- モーダルウィンドウの中身 -->
<div class="modal fade show" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">ご登録ありがとうございます！</h4>
            </div>
            <div class="modal-body">
                <p>あなたは映画・テレビ関係者ですか？</p>
                <p>投稿ユーザーへの励みになるため、ご協力をよろしくお願いいたします！</p>
            </div>
            <div class="modal-footer">
                <form class="form-group col-md-6" action="/mypage/film_related" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary form-control">はい</button>
                </form>
                <form class="form-group col-md-6" action="" method="post">
                    <button type="button" class="btn btn-danger form-control" data-dismiss="modal">いいえ</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
setTimeout(function(){
    $("#modal-open").trigger('click');
}, 100);
</script>
